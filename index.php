<?php 
    include_once 'includes/cabecalho.php';
    include_once 'includes/imagem.php';
?>
<div class="row">
    <div class="col s12 m8 push-m4">
        <form name="formAutentica" method="post" action="autenticar.php">
            <div class="input-field col s6">
                <i class="material-icons prefix">account_circle</i>
                <input type="text" class="validade" name="indexUsuario" required>
                <label for="indexSenha">Usuário</label>
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">password</i>
                        <input type="password" class="validade" name="indexSenha" required>
                        <label for="indexSenha">Senha</label>
                    </div>
                </div>
                <div class="row" align="center">
                    <div class="input-field col s12">
                        <button class="btn waves-effect purple waves-light" type="submit" name="btnEntrar">Entrar no Sistema Toy_shop<i class="material-icons right">send</i></button>
                    </div>
                </div>             
            </div>
        </form>
    </div>
</div>
<?php
    include_once 'includes/rodape.php';
?>
