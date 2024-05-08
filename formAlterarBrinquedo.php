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
        <li><a href="formIncluirBrinquedo.php"><i class="material-icons left">assignment_turned_in</i>Incluir</a>
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
        <td height="60"><div align="center"><font face="Arial" size="4"><b>Alterar Dados do Brinquedo - Toy_shop</b></font></div></td>
        </tr>
    </table>
    <?php
        if (!isset($_POST["briID"])&& !isset($_POST["enviar"]))
        {
    ?>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"];?>">
            <div class = "container" style="margin-top: 100px">
                <div class="row">
                    <div class = "col s12">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">event_note</i>
                            <input type="text" name="briID" size="10" required>
                            <label for="briID">Código do brinquedo</label>
                        </div>
                    </div>                    
                </div>
                <div class="row center">
                    <div class = "col s12">
                        <button type="submit" class="waves-effect waves-light btn-large purple lighten-1" name="alterar" value="Alterar Dados do brinquedo"><i class="material-icons left">assignment_ind</i>Alterar Dados do brinquedo</button>
                    <div><br>
                    <div class = "col s12">
                        <button class="waves-effect waves-light btn-large purple lighten-1">Não Lembra o Código?<a href='pesqTodosBrinquedo.php'>Clique Aqui </button>
                    </div>
                </div>
            </div>
        </form>
    <?php
        }
        //Buscará os dados do brinquedo
        else if(!isset($_POST["enviar"]))
        {
            $briID = $_POST["briID"];
            $consulta = mysqli_query($conexao, "SELECT * FROM brinquedo WHERE briID = '$briID'");
            //obtém a resposta do Select executado acima
            $linha = mysqli_num_rows($consulta);
            echo "$linha";
            if ($linha == 0) //verifica quantas linhas teve a query executada e se for igual a zero, o brinquedo não foi encontrado
        {
            echo "brinquedo não encontrado $briID";

        }
        else
        {
            echo "<div><font face=Arial size=4><b>brinquedo Encontrado:</b></font></div>";
            //seta a linha de campobrinquedo da tabela Brinquedo e depois, coloca cada campo em uma variável.
            $campoBrinquedo = mysqli_fetch_row($consulta);
            $briNome = $campoBrinquedo[1];
            $briClassificacao = $campoBrinquedo[2];
    ?>
        <form name="formBrinquedo" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="striped">
            <tr>
                <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#FFFFFF">Brinquedo Cadastrados</font></b></font></div></td>
            </tr>
            <tr><td width="5%"><div align="center"><b><font face="Arial" size="2">Código do brinquedo</font></b></div></td>
                <td width="5%"><div align="center"><b><font face="Arial" size="2">nome</font></b></div></td>
                <td width="5%"><div align="center"><b><font face="Arial" size="2">Classificação</font></b></div></td>
            </tr>
            <tr>
                <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $briID;?></font></td>
                <td width="20%" height="25"><b><font face="Arial" size="2"><input type="text" name="briNome" size="42" required value="<?php echo $briNome;?>"></font></td>
                <td width="10%" height="25"><b><font face="Arial" size="2"><input type="text" name="briClassificacao" size="42" required value="<?php echo $briClassificacao;?>"></font></td>
            </tr>
        </table>
        <input type ="hidden" name="briID" value="<?php echo $briID;?>">
        <input type ="hidden" name="enviar" value="S"><br>
        <div class = "col s12 center">
            <button type="submit" class="waves-effect waves-light btn-large purple lighten-1" name="alterar" value="Alterar Dados do brinquedo"><i class="material-icons left">toys</i>Alterar Dados do brinquedo</button>
        </div>
        </form>
    <?php
            mysqli_close($conexao);
        }
        }
        else // alterar brinquedo
        {
            $briID=$_POST["briID"];
            $briNome=$_POST["briNome"];
            $briClassificacao=$_POST["briClassificacao"];
            $altera = mysqli_query($conexao, "UPDATE brinquedo SET briNome='$briNome', briClassificacao='$briClassificacao'  WHERE briID='$briID'");
            //O comando mysqli_affected_rows( ) retornará a quantidade de linhas alteradas com o comando UPDATE
            if (mysqli_affected_rows($conexao) > 0)
            {
                echo "<p align='center'>Dados do brinquedo $briNome alterados com sucesso!!! Verifique abaixo a alteração feita.</p>";
                echo "<table width='100%' border='0' cellspacing='1' cellpadding='0' align='center' class='striped'>";
                echo "<tr>";
                echo "</tr>";
                    echo "<tr>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial'csize='2'>Código do brinquedo</font></b></div></td>";
                        echo "<td width='20%'><div align='center'><b><font face='Arial' size='2'>Brinquedo</font></b></div></td>";
                        echo "<td width='10%'><div align='center'><b><font face='Arial' size='2'>Classificacao</font></b></div></td>";
                    echo "</tr>";
                    echo "<tr>";
                        echo "<td width='10%' height='25'> <div align='center'><font face='Arial' size='2'>$briID</font></div></td>";
                        echo "<td width='20%' height='25'> <div align='center'><font face='Arial' size='2'>$briNome</font></div></td>";
                        echo "<td width='10%' height='25'> <div align='center'><font face='Arial' size='2'>$briClassificacao</font></div></td>";
                    echo "</tr>";
                echo "</table>";
            }
            else
            {
                $erro=mysqli_error($conexao );
                echo "<p align='center'>Erro:$erro</p>";
            }
        mysqli_close($conexao);
    }
    ?>
    <div class = "col s12 center">
        <br><a href="sair.php" class="waves-effect waves-light btn-large purple lighten-1"><i class="material-icons left">exit_to_app</i>Sair do Sistema Toy_shop</a>
    </div>
<?php
    include_once 'includes/rodape.php';
?>