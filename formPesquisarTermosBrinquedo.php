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
                    <li><a href="formIncluirBrinquedo.php">Incluir</a>
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
        <li><a href="formIncluirBrinquedo.php"><i class="material-icons left">assignment_turned_in</i>Incluir</a>
        <li><a href="formExcluirBrinquedo.php"><i class="material-icons left">delete</i>Excluir</a>
        <li><a href="menuPesquisarBrinquedo.php"><i class="material-icons left">search</i>Pesquisar</a>
        <li class="divider" tabindex="-1"></li>
        <li><a href="menuGerBrinquedo.php"><i class="material-icons left">person_pin</i>Gerenciamento de Brinquedo</a></li>       
    </ul>
    <div>
        <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <td height="60"><div align="center"><font face="Arial" size="4"><b>Pesquisar por Código, Nome e Classificacao de Brinquedo - Toy_shop</b></font></div></td>
            </tr>
        </table>      
        <form method="POST" action="resultadoPesquisarTermosBrinquedo.php">                
            <div class = "container" style="margin-top: 100px">
            <b>Selecione Código, Nome ou Classificacao brinquedo:<br>
            <select name="briItemPesquisa">
                <option value="briID"><b>Código</option>    
                <option value="briNome"><b>Nome</option>
                <option value="briClassificacao"><b>Classificacao</option>
                </select><br/><br/>
                <div class = "col s12">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">keyboard</i>
                        <input type="text" name="briTermoPesquisa" required>
                        <label for="briTermoPesquisa">Digite um Termo Conforme Item Escolhido Acima</label>
                    </div>
                <b></br>
                <button type="submit" class="waves-effect waves-light btn-large purple lighten-1" name="pesqBrinquedo" value="Pesquisar"><i class="material-icons left">toys</i>Pesquisar brinquedo</button>
            </div>               
        </form>
    <div class = "col s12 center">
        <br><a href="sair.php" class="waves-effect waves-light btn-large purple lighten-1"><i class="material-icons left">exit_to_app</i>Sair do Sistema Toy_shop</a>
    </div>
    <?php
        include_once 'includes/rodape.php';
    ?>
