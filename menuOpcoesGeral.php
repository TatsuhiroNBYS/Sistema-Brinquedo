<?php
    //Verificará se a nossa sessão está ativa
    require_once("verificar.php");
    //A função que exibirá a data completa, dia e ano corrente
    include 'includes/exibirDia.fcn';
    include 'includes/cabecalho.php';
?>
<div class="nav-bar-fixed">
        <nav>
            <div class="nav-wrapper purple lighten-1">
                <a href="#!" class="brand-logo">Menu de Opções</a>
                <a href="#" data-target="mobile-navbar" class="sidenav-trigger"><i class="material-icons">menu</i></a>
                <ul id="navbar-itens" class="right hide-on-med-and-down">
                    <li><a href="menuGerBrinquedo.php">Gerenciamento de Brinquedos</a></li>
                </ul>
            </div>
        </nav>
    </div>
    <ul id="mobile-navbar" class="sidenav">
        <li><a href="menuGerBrinquedo.php"><i class="material-icons left">person_pin</i>Gerenciamento de Brinquedos</a></li>
    </ul>
    <div>
        <?php
            //Exibirá o nome do usuário que está logado e a data corrente
            echo "<br>Bem vindo " .$_SESSION['sessaoNome']." !!!!<br><br> Data de entrada:  <b>".$data."<b>";
        ?>
    </div>
    </b><br/><br/>
    <?php include_once 'includes/imagem.php'; ?>
    <div align="center">
        <br><br><a href="sair.php" class="waves-effect waves-light btn-large purple lighten-1"><i class="material-icons left">exit_to_app</i>Sair do Sistema Toy_shop</a>
    </div>

<?php
    include_once 'includes/rodape.php';
?>