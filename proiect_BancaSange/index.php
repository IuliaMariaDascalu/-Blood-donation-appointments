<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
require_once 'functii/sql_functions.php';
    session_start();
    if (isset($_POST['conectare'])) {
        $email = $_POST['email'];
        $parola = $_POST['parola'];
        
        $rezultatConectare = conectare($email, $parola);
        if ($rezultatConectare) {
            if (isset($_SESSION['fail_login'])) {
                unset($_SESSION['fail_login']);
            }
            $_SESSION['user'] = $email;
        } else {
            $_SESSION['fail_login'] = "Eroare la conectare";
        }
    }
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/style.css"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <header>
            <p class="container">
                <span style="margin-left: 5px; margin-right: 5px" > Salvează o viață...</span>
                <span class="callout">Donează acum! </span>
            </p><br>
            <div class="wrap menu with-alert"  style="top: 156px;">
                <div class="cols">
                    <div class="left clearfix">
                        <div class="wrap" id="logo">
                            <div class="cols">
                                <div class="col-12">
                                    <div class="header-logo-wrapper">
                                        <a href="/">
                                            <img src="imagini/LifeBankLogo.jpg" style="max-height: 65px; padding-top: 20px;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>


        <?php
        if (isset($_SESSION['user'])) {
            require_once 'templates/template_conectat.php';
        } else {
            require_once 'templates/template_neconectat.php';
        }
        ?>
        
 
    </body>
</html>
