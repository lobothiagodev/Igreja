<fieldset>
<legend>Cadastro de Usu&aacute;rios de Acesso ao Sistema</legend>
<form method="post" action="">
	<label>CPF:</label>
	<input name="cpf" type="text" id="cpf" tabindex="<?PHP echo ++$ind; ?>" OnKeyPress="formatar('###.###.###-##', this);" value="<?PHP echo $_POST["cpf"];?>" maxlength="14" />
	Campo obrigat&oacute;rio.
	<label>Nome:</label>
	<input name="nome" type="text" id="nome" value="<?PHP echo $_POST["nome"];?>" tabindex="<?PHP echo ++$ind; ?>" size="40" /> Campo obrigat&oacute;rio.
	<label>Cargo que ocupa:</label>
	<input name="cargo" type="text" id="cargo" value="<?PHP echo $_POST["cargo"];?>" tabindex="<?PHP echo ++$ind; ?>"/>
	<label>Senha:</label>
	<input name="senha" type="password" id="senha" tabindex="<?PHP echo ++$ind; ?>" />
	Campo obrigat&oacute;rio
	<label>Confirme a Senha:</label>
	<input name="senha1" type="password" id="senha1" tabindex="<?PHP echo ++$ind; ?>" />
	Campo obrigat&oacute;rio
	<table style="text-align: left; width: 100%; background-color: #00CCFF; " >
		<caption style="vertical-align: top; text-align:left;">Tipo de Acesso do Usu&aacute;rio</caption>
			<tbody>
				<tr>
			  		<td><input type="radio" id="nivel" name="nivel" value="5" tabindex = "<?php echo ++$ind; ?>" >N&iacute;vel 1 - Consulta</td>
			  		<td><input type="radio" id="nivel" name="nivel" value="7" tabindex = "<?php echo ++$ind; ?>" >N&iacute;vel 2 - Cadastrar</td>
			  		<td><input type="radio" id="nivel" name="nivel" value="8" tabindex = "<?php echo ++$ind; ?>" >N&iacute;vel 3 - Atualizar</td>
		  		</tr>
		  		<tr>
			  		<td><input type="radio" id="semana" name="nivel" value="9" tabindex = "<?php echo ++$ind; ?>" >N&iacute;vel 4 - Apagar Registros</td>
			  		<td><input type="radio" id="semana" name="nivel" value="10" tabindex = "<?php echo ++$ind; ?>" >N&iacute;vel 5 - Administra��o</td>
		  		</tr>
	  		</tbody>
	</table>
	<p>Departamento em que Trabalha:</p>
		<select name='setor' class='' tabindex='<?php echo ++$ind; ?>'>
			<option value=''> ***Campo Obrigat&oacute;rio*** </option>
			<option value='1'>Secretaria Executiva</option>
			<option value='3'>Secretaria Miss&otilde;es</option>
			<option value='2'>Tesouraria Templo Central</option>
		</select>
	
	<input type="submit" name="Submit" value="Cadastrar..." tabindex="<?PHP echo ++$ind; ?>"/>
  <input name="escolha" type="hidden" value="tab_auxiliar/cad_usuario.php" />
</form>
</fieldset>