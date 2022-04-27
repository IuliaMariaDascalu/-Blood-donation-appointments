<?php
$banci = preiaDateBanci();
?>

<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Solicita Sange</h1>
        <form class="main-form" method="post">
            <div class="row mt-5 ">
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="text" class="form-control" placeholder="Numele tau" name="nume" required>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="text" class="form-control" placeholder="Prenumele tau" name="prenume" required>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="text" class="form-control" placeholder="Condiția ta medicala" name="conditie" required>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <input type="tel" class="form-control" placeholder="Numarul tau de telefon" name="telefon" required>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <select name="grupa_sange" id="grupa-sange" class="form-control">
                        <option selected>Grupa de Sange</option>
                        <option value="0(I)">0(I)</option>
                        <option value="A(II)">A(II)</option>
                        <option value="B(III)">B(III)</option>
                        <option value="AB(IV)">AB(IV)</option>
                    </select>
                </div>
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                    <select name="banca" class="form-control">
                        <?php foreach($banci as $banca){ ?>
                            <option value="<?php echo $banca['idBanca'];?>"><?php echo $banca['numeBanca'];     ?></option>
                        <?php } ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-outline-danger" name="trimite" value="Solicita" style="width: 150px; margin-top:10px; margin-left: 300px;">Trimite solicitare</button>
            </div>

        </form>
    </div>
</div>


<?php
if (isset($_POST['trimite'])) {
    $erori=[];
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $conditie = $_POST['conditie'];
    $telefon = $_POST['telefon'];
    $grupaSange= $_POST['grupa_sange'];
    $banca= $_POST['banca'];


    if (strlen(trim($telefon))!=10) {
        $erori[] = 'Verifica numarul de cifre al numarului tau de telefon!';
    }

    if (!is_numeric($telefon)) {
        $erori[] = 'Numarul de telefon nu poate fi un text';
    }

    //verific daca am erori, daca au aparut nu
    if (!empty($erori)) {
        print 'Au aparut niste erori: ';
        print '<ul>';
        foreach ($erori as $eroare) {
            print "<li> $eroare </li>";
        }
        print '</ul>';
        return; //opreste executia
    } else {
        $rezultatSolicitare = solicitare($nume, $prenume, $conditie, $telefon, $grupaSange, $banca);
    }

    if ($rezultatSolicitare) {
        print "Solicitarea a fost trimisa cu succes!";
    }


}
