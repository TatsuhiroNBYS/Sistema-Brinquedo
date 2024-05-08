<?php
    //Verificará se a nossa sessão está ativa
    require_once("verificar.php");
    //Fará a conexão com o nosso banco de dados imaginaria
    require_once("includes/conectarBD.php");
?>
<?php
    define('fpdf186/FPDF_FONTPATH', 'font/');
    require('fpdf186/fpdf.php');
    //Irá instanciar a classe. P=Retrato, mm =tipo de medida utilizada, no caso milímetros, tipo de folha = A4
    $pdfBrinquedo = new FPDF("P","mm","A4");
    $pdfBrinquedo->AddPage();
    //Aqui, estamos definindo a fonte a ser utilizada
    $pdfBrinquedo->SetFont('Arial', 'B', 10);
    //Aqui, estamos definindo o cabeçalho do nosso relatório
    //SetY: Move a abscissa atual de volta para margem esquerda e define a ordenada.
    //Se o valor passado for negativo, ele será relativo à margem inferior da página. sintaxe: SetY(float y)
    $pdfBrinquedo->SetY("13");
    $pdfBrinquedo->Image('imagens/toy_shop.png',3,3,15,15);
    $pdfBrinquedo->Cell(0,5,utf8_decode('Loja de Brinquedo - Toy_shop'),0,1,'R');
    $pdfBrinquedo->Cell(0,0,'',1,1,'L');
    //Ln: Faz uma quebra de linha. A abscissa corrente volta para a margem 
    //esquerda e a ordenada é somada ao valor passado como parâmetro.
    //sintaxe: Ln([float h])
    $pdfBrinquedo->Ln(8);
    //Aqui, estamos definindo os Labels de Título do formulário
    $pdfBrinquedo->Cell(20, 5, 'ID');
    $pdfBrinquedo->SetX(85);
    $pdfBrinquedo->Cell(20, 5, 'Nome');
    $pdfBrinquedo->SetX(175);
    //iconv é uma função nativa do PHP para converter os CharSet e permitir acentuação
    $pdfBrinquedo->Cell(20, 5, iconv("UTF-8", "ISO-8859-1//TRANSLIT", 'Classificação')); 
    $pdfBrinquedo->SetX(50);
    // Busca os dados no banco de dados
    $busca = mysqli_query($conexao, "SELECT briID, briNome, briClassificacao FROM brinquedo");
    $cont = 0;

    while ($resultado = mysqli_fetch_array($busca))
    {   //Usando o iconv para tornar legível qualquer caracter especial salvo na base de dados
        $resultado['briID'] = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $resultado['briID']);
        $resultado['briNome'] = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $resultado['briNome']);
        $resultado['briClassificacao'] = iconv("UTF-8", "ISO-8859-1//TRANSLIT", $resultado['briClassificacao']);
        $pdfBrinquedo->ln(8);
        $pdfBrinquedo->Cell(20, 5, $resultado['briID']);
        $pdfBrinquedo->SetX(85);
        $pdfBrinquedo->Cell(20, 5, $resultado['briNome']);
        $pdfBrinquedo->SetX(175);
        $pdfBrinquedo->Cell(20, 5, $resultado['briClassificacao']);
        $pdfBrinquedo->SetX(50);
        
        $cont += 1;
    }
    // Aqui, estamos definindo o rodapé posicionado verticalmente com 270 mm 
    //e seus respectivos largura, altura e alinhamento
    $pdfBrinquedo->SetY("270");
    //Aqui, buscaremos a data atual do sistema
    $data = date("d/m/Y");
    $rodape = "impresso em: ".$data;
    $logo = "Toy_shop";
    $pdfBrinquedo->Cell(0,0,'',1,1,'L');
    $pdfBrinquedo->Cell(0,5, $logo ,0,0,'L');
    $pdfBrinquedo->Cell(0,5, $rodape ,0,1,'R');
    //Aqui, é a saída do arquivo PDF
    $pdfBrinquedo->Output( );
?>