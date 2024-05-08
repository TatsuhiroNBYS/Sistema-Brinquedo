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
                <li><a href="formIncluirBrinquedo.php">Incluir</a>
                <li><a href="formAlterarBrinquedo.php">Alterar</a>
                <li><a href="formExcluirBrinquedo.php">Excluir</a>
                <li><a href="menuPesquisarBrinquedo.php">Pesquisar</a>
                <li><a href="relatorioBrinquedo.php">Relatorio de Brinquedo PDF</a>
                <li><a class="dropdown-trigger" data-target="dropdown">Voltar<i class="material-icons">arrow_drop_down</i></a></li>
            </ul>
        </div> 
    </nav>
</div>
<ul id="dropdown" class="dropdown-content">
        <li><a href="menuGerBrinquedo.php"><i class="material-icons left">person_pin</i>Gerenciamento de Brinquedo</a></li>
        <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li>
</ul>    
<ul id="mobile-navbar" class="sidenav">
    <li><a href="formIncluirBrinquedo.php"><i class="material-icons left">assignment_turned_in</i>Incluir</a>
    <li><a href="formAlterarBrinquedo.php"><i class="material-icons left">done</i>Alterar</a>
    <li><a href="formExcluirBrinquedo.php"><i class="material-icons left">delete</i>Excluir</a>
    <li><a href="menuPesquisarBrinquedo.php"><i class="material-icons left">search</i>Pesquisar</a>
    <li><a href="relatorioBrinquedo.php"><i class="material-icons left">print</i>Relatorio de Brinquedos PDF</a>
    <li class="divider" tabindex="-1"></li>
    <li><a href="menuGerBrinquedo.php"><i class="material-icons left">person_pin</i>Gerenciamento de Brinquedos</a></li>
    <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li>        
</ul>
<div>
    </b><br/><br/>
    <?php include_once 'includes/imagem.php'; ?>
<?php
    include_once 'includes/rodape.php';
?>