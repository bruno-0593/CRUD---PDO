<!-- HEARDER -->
<?php include_once './includ/header.inc.php' ?>
<?php require './banco_de_dados/crud.php' ?>

<!-- MENU -->
<?php include_once './includ/menu.inc.php' ?>

<!-- FORM -->
<div class="row container">
    <br>
    <form action="./banco_de_dados/crud.php" method="POST" class="col s12">
        <fieldset class="formulario">
            <legend><img src="./img/avatar1.png" alt="img" width="100"></legend>
            <h5 class="light center">Cadastro de Clientes</h5>

            <!-- NAME FIELD -->
            <div class="input-field col s12">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" name="nome" id="nome" maxlength="40" require autofocus
                <?php
                // INCLUD THE NAME AT NAME FIELD WITH A "VALUE"
                if (isset($nome) && $nome != null || $nome != ""){
                    echo "value=\"{$nome}\"";
                 }?> >
                <label for="nome">Nome do Cliente</label>
            </div>

            <!-- EMAIL FIELD -->
            <div class="input-field col s12">
                <i class="material-icons prefix">email</i>
                <input type="text" name="email" id="email" maxlength="50" require autofocus 
                <?php
                // INCLUD THE EMAIL AT EMAIL FIELD WITH A "VALUE"
                if (isset($email) && $email != null || $email != ""){
                    echo "value=\"{$email}\"";
                } ?> >
                <label for="nome">E-mail do Cliente</label>
            </div>

            <!-- PHONE FIELD -->
            <div class="input-field col s12">
                <i class="material-icons prefix">phone</i>
                <input type="tel" name="telefone" id="telefone" maxlength="15" require autofocus 
                <?php
                // INCLUD THE PHONE AT TELEFONE FIELD WITH A "VALUE"
                if (isset($telefone) && $telefone != null || $telefone != ""){
                    echo "value=\"{$telefone}\"";
                } ?> >
                <label for="nome">Telefone do Cliente</label>
            </div>

            <!-- BUTTON -->
            <div class="input-field col s12">
                <input type="submit" value="cadastrar" class="btn yellow">
                <input type="reset" value="limpar" class="btn red">
            </div>

        </fieldset>
    </form>
</div>

<!-- FOOTER -->
<?php include_once './includ/footer.inc.php' ?>

