<?php
    //Vai verificar se a nossa sessão esta ativa
    require_once("verificar.php");
    //Função que vai exibir a data completa, dia e ano corrente
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
        <li class="divider" tabindex="-1"></li>
        <li><a href="menuGerBrinquedo.php"><i class="material-icons left">person_pin</i>Gerenciamento de Brinquedo</a></li>
        <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li>        
    </ul>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "<br>Bem vindo " .$_SESSION['sessaoNome']." !!!!<br><br> Data de entrada:  <b>".$data."<b>";
    ?></b><br/><br/>
    <table width="55%" cellspacing="0" cellpadding="0" border="0" >
            <tr>
                <td>
                <tr>                  
                    <td><b>Menu Pesquisar Brinquedo</font></td>                  
                </tr>
                </td>
            </tr>             
    </table>
    <div class="row">
        <div class = "col s12">            
            <a href="pesqTodosBrinquedo.php"><i class="material-icons left">search</i>Todos</a>
        </div>
        <div class = "col s12">
            <a href="formPesquisarTermosBrinquedo.php"><i class="material-icons left">search</i>Escolher Termo de Pesquisa</a>
        </div>
    </div>
    <div align="center">
        </br></br>
        <a href="sair.php" class="waves-effect waves-light btn-large purple lighten-1"><i class="material-icons left">exit_to_app</i>Sair do Sistema Toy_shop</a>
    </div>
<?php
    include_once 'includes/rodape.php';
?>