<link rel="stylesheet" type="text/css" media="screen, projection" href="tabs.css" />

<fieldset><legend>Altera��o e Inicializa&ccedil;&atilde;o de Senhas</legend>
<table id="Tabela de usuarios" summary="Lista de todos os usuarios com acesso ao sistema." style="text-align: left; width: 100%;">
    <caption>
      Usu�rios com Acesso
    </caption>
    <colgroup>
		<col id="Usu�rios">
		<col id="Inicializar/Excluir!">
	</colgroup>
    <thead>
      <tr>
        <th scope="col">Usu&aacute;rios</th>
        <th scope="col">Inicializar/Excluir</th>
      </tr>
      
    </thead>

    <tbody>
    <?php
  
    $options = new usuarios();
	$lista = $options->Arrayusuario();
		
	for ($item=0;$item<count($lista);$item++){
		foreach ($lista[$item] as $key => $result):
	         $usuario->$key = $result;
		endforeach;
		
		++$contar;
			
		$zebrar = ($contar % 2) == 0 ? "class='odd'" : "";
		?>
		<tr <?php echo $zebrar;?>>
			<td><?php
				echo "CPF: ".$usuario->cpf." - Cargo:".$usuario->cargo;
					$alterar = new formusuario();
					$alterar->alt_nome($usuario->nome, $usuario->id, ++$ind);
				?>
			</td>
			<td>
				<a href="./?escolha=sistema/excluir.php&campo=id&tabela=usuario&id=<?php echo $usuario->id;?>">Excluir...</a>
				<?php 
				
					$alterar->ini_senha($usuario->id, ++$ind)
				?>
			</td>
    	</tr>
    		<?PHP
	}
	
    ?>

    </tbody>
  </table>
 </fieldset>