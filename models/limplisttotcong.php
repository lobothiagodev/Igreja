<?php
if ($_GET['limpeza']=='4') {
	//$dadoscong vem do script controller/limpeza.php
	$todacongr 	 = 'SELECT rol,razao FROM igreja WHERE rol="'.$dadoscong->rol().'" ORDER BY razao';
}elseif ($_GET['limpeza']=='1') {
	//$dadoscong vem do script controller/limpeza.php
	$todacongr 	 = 'SELECT rol,razao FROM igreja WHERE matlimpeza="1" ORDER BY razao';
}else {
	$todacongr 	 = 'SELECT rol,razao FROM igreja ORDER BY razao';
}
	
	$todacongrLimp = mysql_query($todacongr);
	$incrrc=0; //indece p/ zebrar tabela
	$todacongrtbody = ''; //Limpa vari�vel para receber os dados da tabela
	
	if ($_GET['limpeza'] !='4' && $_GET['limpeza'] !='1') {
		$tabtodas = '<div style="page-break-before: always;"> </div>';
	}else{
		$tabtodas = '';
	}
		
	while($roligreja = mysql_fetch_array($todacongrLimp)){
	
	$tabtodas .= '<table id="listTable" >
					<caption>Rela��o do Material de Limpeza para: '.$roligreja['razao'].' - '.$mesref.'</caption>
					
						<colgroup>
							<col id="item">
							<col id="Unidade">
							<col id="Discrimina��o">
							<col id="Solicitado">
							<col id="albumCol"/>
						</colgroup>
					<thead>
						<tr>
							<th scope="col">item</th>
							<th scope="col">Unidade</th>
							<th scope="col">Discrimina��o</th>
							<th scope="col">Solicitado</th>
							<th scope="col">Entregue</th>
						</tr>
					</thead>
					<tbody>';
		$tabtodas .= $tbodytab->tabelaLimp ($roligreja['rol']);//$tbodytab->tabelaLimp($roligreja['rol']) -> vem do script que o chama /views/limpezatot.php

		$tabtodas .= '</tbody></table>';
		$tabtodas .= '<fieldset><legend>Obs.:</legend> As congrega��es que n�o enviarem a lista de material de limpeza
		no pr�ximo bimestre n�o ser�o relacionadas para entrega!</fieldset>';
		$tabtodas .= '<div style="page-break-before: always;"> </div>';
	}
	
	echo  $tabtodas;
?>