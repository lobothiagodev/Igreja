<table>
		<caption>Balancete - Saldo em: <?php echo date('d/m/Y');?></caption>
		<colgroup>
				<col id="Conta">
				<col id="Acesso">
				<col id="Descri��o">
				<col id="Saldo Atual">
			</colgroup>
		<thead>
			<tr>
				<th scope="col">Conta</th>
				<th scope="col">Acesso</th>
				<th scope="col">Descri&ccedil;&atilde;o</th>
				<th scope="col" colspan="2" style="text-align: center;"> Saldo atual em Real </th>
			</tr>
		</thead>
		<tbody>
			<?php
			if ($_GET['tipo']==1) {
				echo $nivel1;//Valor veio do script /models/saldos.php
			}else {
				echo $nivel2;//Valor veio do script /models/saldos.php
			}				
			?>
		</tbody>
		<tfoot>
			<?php 
				printf("<tr class='total'>"); 
				printf("<td colspan='2' id='moeda' >Total de D�bitos: ..... R$ %s D</td>",number_format($debito,2,',','.'));
				printf("<td colspan='2' id='moeda'>Total de Cr�dito: ..... R$ %s C</td><td></td></tr>",number_format($credito,2,',','.'));
			?>
		</tfoot>
	</table>
	