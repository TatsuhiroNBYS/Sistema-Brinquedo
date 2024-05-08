<?php
     //Vai verificar se a nossa sessão esta ativa
     require_once("verificar.php");
     //Vai fazer a conexão com o nosso banco de dados imaginária
     require_once("includes/conectarBD.php");
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
                    <li><a href="formAlterarBrinquedo.php">Alterar</a>
                    <li><a href="formIncluirBrinquedo.php">Incluir</a>
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
        <li><a href="menuPesquisarBrinquedo.php"><i class="material-icons left">search</i>Pesquisar</a>
        <li class="divider" tabindex="-1"></li>
        <li><a href="menuGerBrinquedo.php"><i class="material-icons left">person_pin</i>Gerenciamento de Brinquedo</a></li>       
    </ul>
    <div>
     <?php
        //Exibirá o nome do usuário que está logado e a data corrente
        echo "<br>Bem vindo " .$_SESSION['sessaoNome']." !!!!<br><br> Data de entrada:  <b>".$data."<b>";
    ?><br/><br/>
     <table width="60%" border="0" cellspacing="0" cellpadding="0" align="center">
     <tr>
     <td height="60"><div align="center"><font face="Arial" size="4"><b>Excluir Dados de Brinquedo - Toy_shop</b></font></div></td>
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
                              <label for="briID">Código do Brinquedo</label>
                         </div>
                    </div>                    
               </div>
               <div class="row center">
                    <div class = "col s12">
                         <button type="submit" class="waves-effect waves-light btn-large purple lighten-1" name="excluir" value="Excluir Dados do Brinquedo"><i class="material-icons left">delete</i>Excluir Dados do Brinquedo</button>
                    </div>
                    <div class = "col s12">
                         <br><button class="waves-effect waves-light btn-large purple lighten-1">Não Lembra o Código?<a href='pesqTodosBrinquedo.php'>brique Aqui </button>
                    </div>
               </div>
          </div>
     </form>
<?php
     }
     //Vai buscar dados do Brinquedo
     else if(!isset($_POST["enviar"])) 
     {
          $briID = $_POST["briID"];
          $consulta = mysqli_query($conexao, "SELECT briID, briNome, briClassificacao FROM brinquedo WHERE briId = '$briID'");          
          //obtem a resposta do Select executado acima
          $linha = mysqli_num_rows($consulta);
     if ($linha == 0) //verifica quantas linhas teve a query executada, se for igual a zero o Brinquedo nao foi encontrado
     {
          echo "Brinquedo não encontrado $briID";
     }
     else
     {
          echo "<div><font face=Arial size=4><b>Brinquedo Encontrado:</b></font></div>";
          //seta a linha de campoBrinquedo da tabela Brinquedo e depois coloca cada campo em uma variavel
          $campoBrinquedo = mysqli_fetch_row($consulta);
          $briNome = $campoBrinquedo[1];
          $briClassificacao = $campoBrinquedo[2];
?>
     <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
          <table width="100%" border="0" cellspacing="1" cellpadding="0" align="center" class="striped">
             <tr bgcolor="#6699CC">
                 <td colspan="15"><div align="center"><font face="Arial" size="2"><b><font color="#FFFFFF">Brinquedo Cadastrados</font></b></font></div></td>
             </tr>
             <tr><td width="5%"><div align="center"><b><font face="Arial" size="2">Código do Brinquedo</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Nome do Brinquedo</font></b></div></td>
                 <td width="5%"><div align="center"><b><font face="Arial" size="2">Classificação</font></b></div></td>
             </tr>
             <tr>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $briID;?></font></td>
                 <td width="20%" height="25"><b><font face="Arial" size="2"><?php echo $briNome;?></font></td>
                 <td width="10%" height="25"><b><font face="Arial" size="2"><?php echo $briClassificacao;?></font></td>
             </tr>
          </table>
          <input type ="hidden" name="briID" value="<?php echo $briID;?>">
          <input type ="hidden" name="enviar" value="S">
          <div class = "col s12 center">
            <br><button type="submit" class="waves-effect waves-light btn-large purple lighten-1" name="alterar" value="Deseja Realmente Excluir o Brinquedo?"><i class="material-icons left">delete</i>Deseja Realmente Excluir o Brinquedo?</button>
          </div>
     </form>
<?php
          mysqli_close($conexao);
     }
     }
     else
     // Excluir Brinquedo
     {
          $briID = $_POST["briID"];
          $deleta = mysqli_query($conexao, "DELETE FROM brinquedo WHERE briID = '$briID'");
          //O comando mysqli_affected_rows(), vai retornar a quantidade de linhas alteradas com o comando DELETE
          if (mysqli_affected_rows($conexao)>0)
          {
             echo "<p align='center'>Dados do Brinquedo foram excluídos com sucesso!!!</p>";              
          }
          else
          {
              $erro=mysqli_error($conexao);
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