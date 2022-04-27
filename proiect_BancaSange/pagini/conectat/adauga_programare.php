<?php
$user = preiaUtilizatorDupaEmail($_SESSION['user']);
$banci = preiaDateBanci();

?>
    <div class="container">
        <form method="post">
            <h2 class="text-center wow fadeInUp" style="padding-bottom: 20px; color: #b30606;">Adauga Programare</h2>
                <table class="table">
                    <th>Nume Banca</th>
                    <th>Adresa Banca</th>
                    <th>Numar Telefon</th>
                    <?php
                    foreach ($banci as $banca){ ?>
                        <tr>
                            <td><?php print $banca['numeBanca']; ?></td>
                            <td><?php print $banca['adresaBanca']; ?></td>
                            <td><?php print $banca['nrTelefonBanca']; ?></td>
                        </tr>
                    <?php } ?>
                </table>
                <br>
                <div class="row">
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="date" class="form-control" name="data_programare" required>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="time" class="form-control" name="ora_programare" required>
                    </div>
                    <div class="col-12 col-sm-6 py-2 wow fadeInRight box">
                        <select name="banca" class="form-select">
                            <?php foreach($banci as $banca){ ?>
                                <option value="<?php echo $banca['idBanca'];?>"><?php echo $banca['numeBanca'];     ?></option>
                            <?php } ?>
                        </select>
                    <div><button type="submit" class="btn btn-outline-danger col-12 col-sm-4 py-2" style="margin-left:200px;" name="adauga" value="adauga">Adauga Programare</button></div>
                </div>
            </div>
        </form>


<?php

if (isset($_POST['adauga']))
{
    $dataProgramare = $_POST['data_programare'];
    $oraProgramare = $_POST['ora_programare'];
    $codBanca = $_POST['banca'];
    $codDonator = $user['idDonator'];

        $programare = adaugaProgramare($oraProgramare, $dataProgramare, $codBanca, $codDonator);
        if ($programare) {
            print "Programarea a fost inregistrata la data de " . $dataProgramare;
        } else {
            print "Programarea nu s-a putut efectua.";
        }

}
?>
</div>
