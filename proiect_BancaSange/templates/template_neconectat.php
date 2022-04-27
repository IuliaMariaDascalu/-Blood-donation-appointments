<div class="wrap menu with-alert"  style="top: 156px;">
    <nav class="cols">
        <div class="left clearfix">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Conectare</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=1">Acasa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=2">Inregistrare</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=3">Solicita</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</nav>
<br><br><br>

<!--<nav id="sidebar">-->
<!--    <div class="d-flex" id="wrapper">-->
<!--        <div class="border-end border-bottom bg-white" id="sidebar-wrapper">-->
<!--            <div class="list-group list-group-flush">-->
<!--                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php">Conectare</a>-->
<!--                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php?page=1">Acasa</a>-->
<!--                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php?page=2">Inregistrare</a>-->
<!--                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="index.php?page=3">Solicita</a>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</nav>-->

<?php
if (isset ($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 1:
            require_once 'pagini/neconectat/home.php';
            break;
        case 2:
            require_once 'pagini/neconectat/inregistrare.php';
            break;
        case 3:
            require_once 'pagini/neconectat/solicita.php';
            break;
        default:
            require_once 'pagini/eroare.php';
            break;
    }
} else {
    require_once 'pagini/neconectat/conectare.php';
}

