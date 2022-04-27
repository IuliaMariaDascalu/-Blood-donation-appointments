<form method="post">
    <div class="box">
        <h1>Conectare Donator</h1>

        <input type="email" name="email" placeholder="Emailul tau" onFocus="field_focus(this, 'email');" class="email" required/>

        <input type="password" name="parola" placeholder="Parola ta" onFocus="field_focus(this, 'parola');" class="email" required/>

        <div><button type="submit" class="btn btn-outline-danger" name="conectare" value="Conectare" style="margin-left: 120px;">Conectare</button></div>
    </div>
</form>


<?php

if (isset($_SESSION['fail_login'])) {
    print $_SESSION['fail_login'];
}
?>
