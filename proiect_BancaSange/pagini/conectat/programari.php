<?php
$user = preiaUtilizatorDupaEmail($_SESSION['user']);
$programari = preiaProgramari($user['idDonator']);
if (empty($programari)) {
    print "<h3 style='text-align: center' color: #b30606;>Nu exista programari!!</h3>";
    return;
}

?>
<div class="container">
        <form method="post">
            <h2 class="text-center wow fadeInUp" style="padding-bottom: 20px; color: #b30606;">Programarile tale</h2>
                <table class="table">
                    <tr>
                        <th>Ora Programare</th>
                        <th>Data Programare</th>
                        <th>Loc Programare</th>
                        <th></th>
                    </tr>
                    <?php foreach ($programari as $programare) { ?>
                        <tr>
                            <td><?php print $programare['oraProgramare']; ?></td>
                            <td><?php print $programare['dataProgramare']; ?></td>
                            <td><?php print $programare['numeBanca']; ?></td>
                            <td><a href="index.php?page=2&anuleaza=<?php print $programare['idDoneaza'];?>"><i class="fa fa-trash"></i></a></td>
                        </tr>
                    <?php } ?>
                </table>
            </form>
</div>


<?php

if (isset($_GET['anuleaza'])) {
    $id = $_GET['anuleaza'];
    $anulare = anuleazaProgramare($id);
    if (!$anulare) {
        print "Programarea nu se poate anula!";
    } else {
        ?>
        <script>location.replace("index.php?page=2"); </script>
        <?php
    }

}
