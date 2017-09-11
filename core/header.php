<?php
//Create your menu here
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light mb-2">
    <div class="container">
        <a class="navbar-brand" href="#">Huiswerk portaal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
        <div>
            <?php if($_SESSION['role'] == "user") { ?>
                <ul class="left">
                    <a href="?page=home">
                        <li>
                            home
                        </li>
                    </a>
                </ul>
            <?php } ?>
            <ul class="right">
                <?php if($_SESSION['role'] == "guest") { ?>
                    <a href="?page=login">
                        <li>
                            login
                        </li>
                    </a>
                    <a href="?page=register">
                        <li>
                            register
                        </li>
                    </a>
                <?php } else { ?>
                    <a href="?page=account">
                        <li>
                            account
                        </li>
                    </a>
                    <a href="?page=logout">
                        <li>
                            logout
                        </li>
                    </a>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>