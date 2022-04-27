
<?php
     $user = preiaUtilizatorDupaEmail($_SESSION['user']);

 ?>
<img src="imagini/img.png" class="rounded mx-auto d-block img-thumbnail" width="400px"/>

<br><br>
<form method="post">
    <div class="box">
        <h3 style="text-align: center; color: #b30606;">Profilul tau</h3><br>
        <h6 style="text-align: center; color: #808080">Adresa de email: <?php print $user['emailDonator']; ?></h6>
        <h1>Schimba parola</h1>

        <input type="password" name="actuala" placeholder="Parola actuala" onFocus="field_focus(this, 'parola');" class="email" required/>
        <input type="password" name="noua" placeholder="Parola noua" onFocus="field_focus(this, 'parola');" class="email" required/>
        <div><button type="submit" class="btn btn-outline-danger" name="schimba" value="schimba" style="margin-left: 120px;">Schimba</button></div>

    </div>

</form>



<?php
if (isset($_POST['schimba'])) {
    $oldPass = $_POST['actuala'];
    $newPass = $_POST['noua'];
    if (md5($oldPass) == $user['parolaDonator']) {
        $rezultatActualizare = actualizeazaParola($_SESSION['user'], $newPass);
        print $rezultatActualizare ? '<div style="color: green;">Parola actualizata cu succes</div>' : '<div style="color: #CA0916;">Eroare la actualizare</div>';
    } else{
        print '<div style="color: #CA0916;">Parola actuala nu este corecta!</div>';
    }

}
