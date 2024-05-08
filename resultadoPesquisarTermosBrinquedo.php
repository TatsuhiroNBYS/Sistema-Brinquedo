<?php
    require_once("includes/conectarBD.php");
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
<div>
    <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "O usuário " .$_SESSION['sessaoNome']." está logado no sistema neste momento !!!! Hoje é ".$data;
    ?></b><br/><br/>
      <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
      <tr>
          <td height="60"><div align="center"><font face="Arial" size="4"><b>Pesquisar Brinquedo por Termos de Pesquisa - Toy_shop</b></font></div></td>
      </tr>
      </table><br>
<?php
    //Recebe os dados digitados no formulário de cadastro de Brinquedo via método POST
    $briItemPesquisa = $_POST["briItemPesquisa"];
    $briTermoPesquisa = $_POST["briTermoPesquisa"];
      
    //Elimina os espaços em branco digitados pelo usuário através do comando trim
    $briItemPesquisa = trim($briItemPesquisa);
      
    $sqlBrinquedo = mysqli_query($conexao,"SELECT * FROM brinquedo WHERE ".$briItemPesquisa." LIKE '%".$briTermoPesquisa."%'"
    //Ordena pelo número do código do Brinquedo
    ." ORDER BY briID") or die ("Não foi possível realizar a consulta !!!!");      
?>
<?php
    //Se encontrar algum registro na tabela
    if(mysqli_num_rows($sqlBrinquedo) > 0)
    {
?>
       <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="striped">
       <tr>
           <td colspan="15"><div align="center"><font face="Arial" size="2"><b>Brinquedo Pesquisados</font></b></font></div>
           </td>
       <tr>
           <td><b><font face="Arial" size="2">Código do Brinquedo</font></b></div></td>
           <td><b><font face="Arial" size="2">Nome do Brinquedo</font></b></div></td>
           <td><b><font face="Arial" size="2">Classificação</font></b></div></td>
       </tr>
<?php
       //Lista os dados da tabela enquanto existir
       while($arrayBrinquedo = mysqli_fetch_array($sqlBrinquedo))
       {
?>
        <tr>
           <td><b><font face="Arial" size="2"><?php echo $arrayBrinquedo['briID'];?></font></td>
           <td><b><font face="Arial" size="2"><?php echo $arrayBrinquedo['briNome'];?></font></td>
           <td><b><font face="Arial" size="2"><?php echo $arrayBrinquedo['briClassificacao'];?></font></td>
        </tr>
<?php
        //Fecha a execução do comando mysqli_fetch_array 
        }
?>
        </table>
<?php
     }//Fecha a execução do comando mysqli_num_rows > 0
     else
     {
         echo "<br><br><div align=center><font face=Arial size=2>Desculpe, mais não foram encontrados nenhum Brinquedo !!!!<br><br></font></div>";
     }
?>
<div align="center">
    </br></br>
    <a href="sair.php" class="waves-effect waves-light btn-large purple lighten-1"><i class="material-icons left">exit_to_app</i>Sair do Sistema BIL</a>
</div>
<?php
    include_once 'includes/rodape.php';
?>