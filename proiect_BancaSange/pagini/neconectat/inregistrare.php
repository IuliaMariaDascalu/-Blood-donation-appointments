<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Inregistrare Donator</h1>
        <form class="main-form" method="post">
            <div class="row mt-5 ">
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                    <input type="text" class="form-control" placeholder="Numele tau" name="nume" required>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                    <input type="text" class="form-control" placeholder="Prenumele tau" name="prenume" required>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="date" class="form-control" name="data_nastere" required>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <select name="grupa_sange" id="grupa-sange" class="form-control">
                        <option selected>Grupa de Sange</option>
                        <option value="0(I)">0(I)</option>
                        <option value="A(II)">A(II)</option>
                        <option value="B(III)">B(III)</option>
                        <option value="AB(IV)">AB(IV)</option>
                    </select>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="number" class="form-control" id="input-greutate" name="greutate" placeholder="Greutate" required>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <input type="tel" class="form-control" id="input-nrtelefon" name="nr_telefon" placeholder="Numar telefon" required>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                    <input type="email" class="form-control" id="input-email" placeholder="Emailul tau" name="email" required>
                </div>
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">
                    <input type="password" class="form-control" id="input-pass" placeholder="Parola ta" name="parola" required>
                </div>
            </div>
            <button type="submit" class="btn btn-outline-danger" name="trimite" value="Inregistrare" style="margin-left: 270px;">Inregistrare</button>
        </form>
    <br><br><br>


<?php
if (isset($_POST['trimite'])) {
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $dataNastere = $_POST['data_nastere'];
    $nrTelefon = $_POST['nr_telefon'];
    $grupaSange = $_POST['grupa_sange'];
    $email = $_POST['email'];
    $parola = $_POST['parola'];
    $greutate = $_POST['greutate'];
    $erori = [];
    if (!is_numeric($greutate)) {
        $erori[] = "Greautatea nu poate fi text";
    }

    $currentDate = date("d-m-Y");
    $age = date_diff(date_create($dataNastere), date_create($currentDate));

    if($age->format("%y") < 18) {
        $erori[] = "Varsta minima necesara este de 18 ani.";
    }

    if (!empty($erori)) {
        print '<div style="color:red">Au aparut niste erori: </div>';
        print '<ul>';
        foreach ($erori as $eroare) {
            print "<li style='margin-left: 450px; color: red;'> $eroare </li>";
        }
        print '</ul>';
        return; 
    } else {
        $rezultatInregistrare = inregistrare($nume, $prenume, $dataNastere, $nrTelefon, $grupaSange, $greutate, $email, $parola);
    }


    if ($rezultatInregistrare) {
        $_SESSION['user'] = $email; //autologin
        $_SESSION['welcome'] = "<div style='color:green; text-align: center'>$email te-ai inregistrat cu succes!!!</div><br>";
       // header("location: index.php");
        ?>
        <script>location.replace("index.php"); </script>
        <?php
   } else {
        print "Eroare la inregistrare!";
    }
}
?>

</div>
</div>
