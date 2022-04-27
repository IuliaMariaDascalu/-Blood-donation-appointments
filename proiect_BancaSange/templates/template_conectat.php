<div class="wrap menu with-alert"  style="top: 156px;">
    <nav class="cols">
        <div class="left clearfix">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Profil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=1">Adauga Programare</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?page=2">Programari</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?logout">Deconectare</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
</div>
<?php
if (isset($_GET['logout'])) {
    session_destroy();
    header("location: index.php");
}

if (isset($_SESSION['welcome'])) {
    print $_SESSION['welcome']; 
    unset ($_SESSION['welcome']);
}

if (isset($_GET['page'])) {
    $page = $_GET['page'];
    switch ($page) {
        case 1:
            require_once 'pagini/conectat/adauga_programare.php';
            break;
        case 2:
           require_once 'pagini/conectat/programari.php';
           break;
        default:
            require_once 'pagini/eroare.php';
            break;
    }
} else {
    require_once 'pagini/conectat/profil.php';
}
