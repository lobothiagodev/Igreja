<?php
$dia = $_GET['dia'];
$mes = $_GET['mes'];
$ano = $_GET['ano'];
$apagarEntrada	= '?escolha=models/tes/excluir.php&tabela=dizimooferta&id='.$idDizOf;
if ((($ano>2000 && $ano<2050) || $_GET['ano']=='0') && ($_GET['rec']=='9' || $_GET['rec']=='0')) {
	$statusLancamento = 'Lan&ccedil;amento Confirmado';
}else {
	$statusLancamento = 'Aguardando confima&ccedil;&atilde;o!';
}
if ($_GET['idDizOf']>'0' && $_GET['rec']=='9') {
?>
<table>
	<tbody>
		<tr>
			<td><label>Igreja: </label>
				<select name="igreja" id="igreja" onchange="MM_jumpMenu('parent',this,0)" tabindex="<?PHP echo ++$ind; ?>" ><?php						 
				$listaIgreja = $bsccredor->List_Selec_pop($linkAcesso,$_GET['igreja']);
				//echo $listaIgreja;
				?></select>
			</td>
			<td>
				Ou <a href="<?php echo $apagarEntrada;?>" ><button>Apagar</button></a> esta entrada!
			</td>
		</tr>
	</tbody>

</table>
<?PHP	
}

	//require_once 'forms/concluirdiz.php';
	
	if ($_GET['idDizOf']>0) {
	//Incluir form para alterar ou excluir pre-lan�amento de D�zimos e Ofertas
	require_once 'forms/tes/editDizOferta.php';
		}
?>
<table  style="width: 95%;">
		<caption>
			<?php
			$dirigenteIgreja = $igrejaSelecionada->pastor();
			
			if ($idIgreja>'1') {
				$dirCong = new DBRecord('membro',$igrejaSelecionada->pastor(),'rol');
				$dirigenteIgreja = $dirCong->nome();
			}
				echo $statusLancamento.'<h2>Igreja: '.$igrejaSelecionada->razao().' - Dirigente: '.$dirigenteIgreja.',
			 1&ordm; Tesoureiro: N&atilde;o informado! </h2>';			
			
			printf("<h2>Lan&ccedil;amentos de outros respons&aacute;veis: R$: %'.45s 
			 </h2>",number_format($dizmista->outrosdizimos($_GET['rolIgreja']),2,',','.'));?>
			<?php printf(' Resp. pelo lan&ccedil;amento: %s',$_SESSION {'nome'});?></caption>
			<colgroup>
				<col id="Data">
				<col id="Rol/Nome">
				<col id="Tipo">
				<col id="Valor">
				<col id="albumCol"/>
			</colgroup>
		<thead>
			<tr>
				<th scope="col">Data Lan&ccedil;.</th>
				<th scope="col">Rol/Nome</th>
				<th scope="col">Tipo</th>
				<th scope="col">Valor &agrave; lan&ccedil;ar (R$)</th>
				<th scope="col"><?php echo $tituloColuna5;?></th>
			</tr>
		</thead>
			<?php 
				if ($_POST['concluir']=='1') {
					$dizmista->concluir($idIgreja);
					//echo '<h1>Teste1</h1>';
				} else {
					//tabela com a lista p confirmar lan�amento
					$roligreja = (empty($_GET['igreja'])) ? '':$_GET['igreja'];
					$dizmista->dizimistas($roligreja,$apagarEntrada,$dia,$mes,$ano,$_GET['rec']);
					//echo '<h1>Teste2</h1>';
				}
				$linkResumo = 'rec='.$_GET['rec'].'&igreja='.$_GET['igreja'].'&ano='.$_GET['ano'].'&mes='.$_GET['mes'].'&dia='.$_GET['dia'];
			?>
</table>
<?php 
	if (!empty($_GET['escolha'])) {
		echo '<a href="controller/modeloPrint.php/?tipo=1&'.$linkResumo.' " target="_blank" ><button>Imprimir ...</button> </a>';
	}
?>
