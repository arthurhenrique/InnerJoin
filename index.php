<a href='banco.php'> criar banco</a> <br>

<?php


	$conexao = mysql_connect("127.0.0.1", "root", "") or die (mysql_error());

	mysql_select_db("banco") or die (mysql_error());
	

	$sql = "SELECT FUNCIONARIO.*, TELEFONE.* FROM FUNCIONARIO INNER JOIN TELEFONE ON FUNCIONARIO.ID_CARTEIRA_TRAB = TELEFONE.ID_CARTEIRA_TRAB";

	$query = mysql_query($sql);


	while ($l=mysql_fetch_assoc($query)) {
		echo "Nome: " . $l['DS_NOME']. "<br />";
		echo "Telefone: " . $l['DS_TELEFONE']. "<br />";
		echo '<hr />';
	}	


?>
