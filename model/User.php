<?php

class User extends Model {

    //protected $id;
    protected $username;
    protected $email;
    protected $password;
    protected $salt;
    protected $role;
    protected $group_id;

    private function __construct($username = "") {
        if($username != "") {
            $this->username = $username;
        }
    }

    public function getUsername() {
        return $this->username;
    }

    public function setRole($role) {

        $possible = ['user', 'admin', 'customer'];
        if (array_search($role, $possible)) {
            $this->role = $role;
            return true;
        }
        return false;
    }

    public function getRole() {
        return $this->role;
    }

    public static function login($username, $password) {
        $res = User::findBy('username', $username);

        if (count($res) > 0) {
            $user = $res[0];

            if ($user->checkPassword($password)) {
                App::setLoggedInUser($user);
                return $user;
            }
        }
        return false;
    }

    // Change encryption method if you experience problems. Don't forget to alter 'checkPassword()' as well.
    private function setPassword($password) {
        $this->salt = self::generateSalt();
        $this->password = hash( 'sha256', $password . $this->salt );
    }

    private function checkPassword($password) {
        $hash = hash( 'sha256', $password . $this->salt );
        return ($hash == $this->password);
    }

    public static function generateSalt() {
        return uniqid();
    }

    public static function register($username, $email, $password, $role) {
        $user = new User($username);
        $user->email = $email;
        $user->role = $role;
        $user->setPassword($password);
        $user->save();
        if($user->getId()) {
            return $user;
        } else {
            return false;
        }
    }

    protected static function newModel($obj)
    {

        $email = $obj->email;

        $existing = User::findBy('email', $email);
        if(count($existing) > 0) return false;

        //Check if user is valid
        return true;
    }

    public function getHomework(){
        if ($this->role=='student'){
            return Homework::findBy('group_id',$this->group_id);
        }
        return null;
    }
}
