<h3>
<table>
<tr>
<td>
<a href='banco.php'> criar banco</a> <br></td>
<td>
<a href='insere_funcionario.php'> cadastra funcionario</a> <br></td>
<td>
<a href='insere_telefone.php'> cadastra telefone</a> <br></td>


</tr>
</table>
</h3>
<?php


include("config.php");

	mysql_select_db("banco") or die (mysql_error());

	$sql = "SELECT FUNCIONARIO.*, TELEFONE.* FROM FUNCIONARIO INNER JOIN TELEFONE ON FUNCIONARIO.ID_CARTEIRA_TRAB = TELEFONE.ID_CARTEIRA_TRAB";

	$query = mysql_query($sql);

	while ($l=mysql_fetch_assoc($query)) {
		echo "Nome: " . $l['DS_NOME']. "<br />";
		echo "Telefone: " . $l['DS_TELEFONE'] . "<br />";
		echo "Função: " . $l['DS_FUNCAO']. "<br/>";
		echo "CPF:" . $l['NM_CPF']. "<br/>";
		echo '<hr />';
	}	


?>
