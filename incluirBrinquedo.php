<?php
    require_once("includes/conectarBD.php");
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
                    <li><a href="menuGerBrinquedo.php"><i class="material-icons left">toys</i>Gerenciamento de Brinquedo</a></li>
                </ul>
            </div> 
        </nav>
    </div> 
    <ul id="mobile-navbar" class="sidenav">
        <li><a href="menuGerBrinquedo.php"><i class="material-icons left">person_pin</i>Gerenciamento de Brinquedo</a></li>
        <li><a href="menuOpcoesGeral.php"><i class="material-icons left">computer</i>Menu Opções Geral</a></li>
    </ul>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "<br>Bem vindo " .$_SESSION['sessaoNome']." !!!!<br><br> Data de entrada:  <b>".$data."<b>";
    ?></b><br/><br/>
    <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td height="60"><div align="center"><font face="Arial" size="4"><b>Cadastro de Brinquedos - Toy_shop</b></font></div></td>
        </tr>
    </table><br/>
    <?php
        //Recebe os dados digitados no formulário de cadastro de Brinquedos via método POST
        $briNome = $_POST["briNome"];
        $briClassificacao = $_POST["briClassificacao"];
        //O comando SQL que gravará os dados dos Brinquedos na tabela Brinquedos. Observem que estamos utilizando o comando str_to_date no campo $dtInclusao para que o usuário possa digitar a data no formato dd/mm/aaaa
        $sql = mysqli_query($conexao,"INSERT INTO brinquedo (briNome, briClassificacao) VALUES ('$briNome', '$briClassificacao')") or die("Erro no comando SQL!!!<br/> <b><a href='formIncluirBrinquedo.php'><b>Voltar Para a Inclusão de Brinquedos</a><br/>".mysqli_error($conexao));
        echo "<div align=center>Os dados do Brinquedo $briNome foram cadastrados com sucesso!!! Veja abaixo os dados cadastrados.<br/><br/>";
        echo "<table class='striped'>";
        echo "<tr>";
        echo "<th><div>Brinquedo></div></th>";
        echo "<th><div>Classificação</div></th>";
        echo "</tr>";
        echo "<tr>";
        
        echo "<td>$briNome</font></td>";
        echo "<td>$briClassificacao</font></td>";
        echo "</tr>";
        echo "</table><br/>";
        echo "<div align='center'><font face='Arial' size='2'>";
    ?> 
    <div align="center">
        </br></br>
        <a href="menuOpcoesGeral.php" class="waves-effect waves-light btn-large purple lighten-1"><i class="material-icons left">home</i>Tela Inicial</a>
        <a href="formIncluirBrinquedo.php" class="waves-effect waves-light btn-large purple lighten-1"><i class="material-icons left">save</i>Cadastrar outro Brinquedo</a>
        <a href="sair.php" class="waves-effect waves-light btn-large purple lighten-1"><i class="material-icons left">exit_to_app</i>Sair do Sistema Toy_shop</a>
    </div>
<?php
    include_once 'includes/rodape.php';
?>