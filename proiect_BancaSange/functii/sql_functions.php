<?php
function conectareBd (
        $host = 'localhost',
        $user = 'root',
        $password = '',
        $database = 'bancaSangeDb'
) {
    return mysqli_connect($host, $user, $password, $database);
}

function clearData($input, $link)
{
    $input = trim($input);
    $input = htmlspecialchars($input);
    $input = stripslashes($input);
    $input = mysqli_real_escape_string($link, $input);
    
    return $input;
}

function preiaUtilizatorDupaEmail($email)
{
    $link = conectareBd();
    $email = clearData($email, $link);
    $query = "SELECT * FROM tblDonator WHERE emailDonator = '$email'";
    $result = mysqli_query($link, $query);
    
    $utilizator = mysqli_fetch_array($result, MYSQLI_ASSOC);
    return $utilizator;
}

function inregistrare($nume, $prenume, $dataNastere, $nrTelefon, $grupaSange, $greutate, $email, $parola)
{
    $link = conectareBd();
    $nume = clearData($nume, $link);
    $prenume = clearData($prenume, $link);
    $email = clearData($email, $link);
    $parola = clearData($parola, $link);
    $parola = md5($parola);
    $dataNastere = clearData($dataNastere, $link);
    $nrTelefon = clearData($nrTelefon, $link);
    $greutate = clearData($greutate, $link);
    $grupaSange = clearData($grupaSange, $link);
    
    $user = preiaUtilizatorDupaEmail($email);
    if ($user) {
        return false;
    }
    $query = "INSERT INTO tblDonator(idDonator, numeDonator, prenumeDonator, dataNastere, nrTelefonDonator,"
            . " grupaSangeDonator, greutateDonator, emailDonator, parolaDonator )"
            . " VALUES(NULL,'$nume', '$prenume', $dataNastere, $nrTelefon, '$grupaSange', '$greutate', '$email', '$parola')";

    return mysqli_query($link, $query);
}

function conectare($email, $parola)
{
    $link = conectareBd();
    $email = clearData($email, $link);
    $parola = clearData($parola, $link);
    
    $user = preiaUtilizatorDupaEmail($email);
    if ($user) {
        return (md5($parola) == $user['parolaDonator']);
    }
    return false;
}
function solicitare($nume, $prenume, $conditie, $telefon, $grupaSange, $banca)
{
    $link = conectareBd();
    $nume = clearData($nume, $link);
    $prenume = clearData($prenume, $link);
    $conditie = clearData($conditie, $link);
    $telefon = clearData($telefon, $link);
    $grupaSange = clearData($grupaSange, $link);
    
    $query = "INSERT INTO tblpacient(numePacient, prenumePacient, conditieMedicala, nrTelefonPacient,"
        . " grupaSangePacient )"
        . " VALUES('$nume', '$prenume','$conditie', $telefon, '$grupaSange')";
    mysqli_query($link, $query);

    $query3 = mysqli_query($link, "SELECT idPacient FROM tblpacient WHERE numePacient = '$nume' AND prenumePacient = '$prenume'");
    $idPacient = mysqli_fetch_array($query3, MYSQLI_ASSOC)['idPacient'];

    $query2 = "INSERT INTO solicita(codPacient, codBanca) VALUES('$idPacient', '$banca') ";
    mysqli_query($link, $query2);
}
 function actualizeazaParola ($email, $newPass)
  {
     $link = conectareBd();
     $newPass = clearData ($newPass, $link);
     $newPass = md5($newPass);
     
     $query = "UPDATE tblDonator SET parolaDonator = '$newPass' WHERE emailDonator='$email'";
  
     return mysqli_query ($link, $query); //true sau false
     
  }
  function adaugaProgramare($oraProgramare, $dataProgramare, $codBanca, $codDonator)
  {
      $link = conectareBd();
      $query = "INSERT INTO doneaza(oraProgramare, dataProgramare, codBanca, codDonator) VALUES('$oraProgramare', '$dataProgramare', $codBanca, $codDonator)";
      return mysqli_query($link, $query);

  }

function preiaDateBanci()
{
    $link = conectareBd();
    $query = "SELECT  idBanca, numeBanca, adresaBanca, nrTelefonBanca FROM tblbancaSange";
    $rezultat = mysqli_query($link, $query);
    $banci = mysqli_fetch_all($rezultat, MYSQLI_ASSOC);

    return $banci;
}


  function preiaProgramari($id)
  {
      $link = conectareBd();
      $query = "SELECT oraProgramare, dataProgramare, numeBanca, idDoneaza FROM doneaza, tblbancasange WHERE codBanca = idBanca AND codDonator = $id";
      $rezultat = mysqli_query($link, $query);
      $programari = mysqli_fetch_all($rezultat, MYSQLI_ASSOC);

      return $programari;
  }

  function anuleazaProgramare($id)
  {
      $link = conectareBd();
      $query = "DELETE FROM doneaza WHERE idDoneaza = $id";
      return mysqli_query($link, $query);
  }