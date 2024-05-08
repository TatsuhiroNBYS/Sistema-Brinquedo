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
                    <li><a href="formAlterarBrinquedo.php">Alterar</a>
                    <li><a href="formExcluirBrinquedo.php">Excluir</a>
                    <li><a href="menuPesquisarBrinquedo.php">Pesquisar</a>
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
        <li><a href="formAlterarBrinquedo.php"><i class="material-icons left">done</i>Alterar</a>
        <li><a href="formExcluirBrinquedo.php"><i class="material-icons left">delete</i>Excluir</a>
        <li><a href="menuPesquisarBrinquedo.php"><i class="material-icons left">search</i>Pesquisar</a>
        <li class="divider" tabindex="-1"></li>
        <li><a href="menuGerBrinquedo.php"><i class="material-icons left">person_pin</i>Gerenciamento de Brinquedo</a></li>      
    </ul>
    <div>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "<br>Bem vindo " .$_SESSION['sessaoNome']." !!!!<br><br> Data de entrada:  <b>".$data."<b>";
    ?></b><br/><br/>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td height="60"><div align="center"><font face="Arial" size="4"><b>Cadastro de Brinquedo - Toy_shop</b></font></div></td>
        </tr>
    </table>
    <form name="formBrinquedo" id="formBrinquedo" method="POST" action="incluirBrinquedo.php">
    <div class = "container" style="margin-top: 100px">
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">keyboard</i>
                    <input type="text" name="briNome" required>
                    <label for="briNome">Nome:</label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class = "col s12">
                <div class="input-field col s12">
                    <i class="material-icons prefix">public</i>
                    <input type="text" name="briClassificacao" required>
                    <label for="briClassificacao">Classificação:</label>
                </div>
            </div>
        </div>
    </div><br/><br/>
    <div align="center">
        <button type="submit" class="waves-effect waves-light btn-large purple lighten-1" name="cadBrinquedo" value="Cadastrar Brinquedo"><i class="material-icons left">save</i>Cadastrar Brinquedo</button>
        </br></br>
        <a href="sair.php" class="waves-effect waves-light btn-large purple lighten-1"><i class="material-icons left">exit_to_app</i>Sair do Sistema Toy_shop</a>
    </div>
    </form>
<?php
    include_once 'includes/rodape.php';
?>