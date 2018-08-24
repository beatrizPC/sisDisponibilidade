
<!DOCTYPE HTML>
<html>
<head>
	<title>Listagem de Remedios</title>
	<meta charset="UTF-8">
</head>
<body>
    <fieldset style="text-align:center; width:500px; paddin:10px;margin:5px auto">
        <legend> Buscar Remedio </legend>
        <form class="form" action="/sisDisponibilidade/control/buscaRemedio.php" method="get" >
            <label>Nome:</label>
            <input type="text" name="nome" /><br/>
            <input type="submit" value="Buscar"/>
        </form>
    </fieldset>
    <table border="1" style="margin:30px auto; ">
        <tr>
        	<th>Id</th><th>Nome</th><th>Descricao</th>
        </tr>
        <?php
        include_once '../model/Remedio.php';
        session_start();
        if(isset($_SESSION['remedios'])){
            $remedios = $_SESSION['remedios'];
            foreach ($remedios as $remedio){
                ?>
            	<tr>
            		<td> <?php echo $remedio->getId();?></td>
            		<td> <?php echo $remedio->getNome();?></td>
            		<td> <?php echo $remedio->getDescricao();?></td>
            	</tr>
            	<?php 
            	}
            	unset($_SESSION['remedios']);
            	}
            	?>
	</table>
</body>    
</html>