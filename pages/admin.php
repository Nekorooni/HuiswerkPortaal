<?php
    $leerlingen = User::findBy('role', 'student');
?>
<h3>List of students</h3>
<table class="table">
    <thead>
    <tr>
        <th>Id #</th>
        <th>Username</th>
        <th>Role</th>
    </tr>
    </thead>
    <tbody>
<?php foreach($leerlingen as $leerling){ ?>
        <tr>
            <th scope="row"><?=$leerling->getId()?></th>
            <td><?=$leerling->getUsername()?></td>
            <td><?=$leerling->getRole()?></td>
        </tr>
<?php } ?>
    </tbody>
</table>