<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<title>ADICIONAR POSTO</title>
</head>
<body>
	<div class="geral_posto">
		<form method="post" action="../control/postoAdd.php">
			<fieldset>
				<legend>Aicionar posto</legend>
				<label>Nome do posto:</label>	<input type="text" name="nomeP"><br/>
				<label>Endereço do posto:</label>	<input type="text" name="enderecoP"><br/>
				<label>Telefone do posto:</label>  <input type="text" name="telefoneP"> <br/>
				<input type="hidden" name="nomeClasse" value="PostoControl">
				<input type="hidden" name="metodo" value="incluir">
				<input type="hidden" name="nextPage" value="/sisDisponibilidade/view/msg.php">
				<div class="btn"><button type="submit">Adicionar</button></div>
			</fieldset>
		</form>	
		<p><?php if(isset($_GET['msg'])){ echo ($_GET['msg']); }?></p>
	</div>
</body>
</html>