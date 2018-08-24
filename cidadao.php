<html>
<head>
<meta charset="ISO-8859-1">
<link rel="stylesheet" type="text/css" href="estilo.css">
<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
<title>ADICIONAR CIDADÃO</title>


	<script type="text/javascript">
		$(document).ready(function(){
		    $(".possui").click(function(){
		        $(".nCartao").slideToggle();
		    });
		});
	</script>
</head>
<body>
<div class="geral_cdd">
<form action="/sisDisponibilidade/control/Control.php">
	<p> Nome: <input type="text" name="nome">
    <p> Idade: <input type="number" name="idade">
    <p> Telefone: <input type="text" name="telefone">
    <label>Informe:</label>
					<input type="radio" name="cartaoSUS" class="possui" value="s">Possuo cartão do SUS
				 	<input type="radio" name="cartaoSUS" value="n" >Não possuo cartão do SUS <br/>
	<label class="nCartao">Número do Cartão do SUS:</label>  <input type="number" name="numeroSus" class="nCartao"> <br/>
    
    <input type="hidden" name="nomeClasse" value="CidadaoControl">
    <input type="hidden" name="metodo" value="incluir">
    <input type="hidden" name="nextPage" value="/sisDisponibilidade/view/msg.php">
    <div class="btn"><button type="submit">ADICIONAR CIDADÃO</button></div>
    
</form>
    <p> <?php if(isset($_GET['msg'])) echo ($_GET['msg']); ?>
   </div>
</body>
</html>