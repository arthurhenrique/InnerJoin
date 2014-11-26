<?php

include("config.php"); //Configurações do Banco
					   //Página pública, por isso não utilizou o restrito.php
					   


if (isset($_POST['LOGIN'])){ //Verifica se a variavel LOGIN existe, caso contrario cria-las

	$CD_IGREJA = $_POST['CD_IGREJA'];
	$LOGIN = $_POST['LOGIN'];
	$SENHA = $_POST['SENHA'];
	$SENHA2 = $_POST['SENHA2'];
	$NOME =  $_POST['NOME'];
	$TEL =  $_POST['TEL'];
	$CEL =  $_POST['CEL'];
	$EMAIL = $_POST['EMAIL'];
	$VERIFIC = $_POST['VERIFIC'];
	
	

   $sql_busca = "SELECT * FROM USUARIO WHERE USU_LOGIN = '$LOGIN'";
   $exe_busca = mysql_query($sql_busca) or die (mysql_error());
   $num_busca = mysql_num_rows($exe_busca);

   $sql_busca2 = "SELECT * FROM USUARIO WHERE USU_EMAIL = '$EMAIL'";
   $exe_busca2 = mysql_query($sql_busca2) or die (mysql_error());
   $num_busca2 = mysql_num_rows($exe_busca2);

   //Verifica se os campos estão preenchidos
   if ($_POST['CD_IGREJA'] == "" || $_POST['LOGIN'] == "" || $_POST['SENHA'] == "" || $_POST['SENHA2'] == "" || $_POST['NOME'] == "" ||  $_POST['EMAIL'] == "" || $_POST['VERIFIC'] == ""){
      $ac[] = "Por favor preencha todos os campos corretamente.";
   }
   //Verifica se ja existe o login
   if ($num_busca > 0){
      $ac[] = "Esse login j&aacute; esta sendo usado por outro usu&aacute;rio.";
   }
   //Verifica se ja existe o e-mail
   if ($num_busca2 > 0){
      $ac[] = "Esse e-mail j&aacute; esta sendo usado por outro usu&aacute;rio.";
   }
   //Verifica se o e-mail esta correto
   if (!ereg("@.", $_POST['EMAIL'])){
      $ac[] = "E-mail inv&aacute;lido.";
   }
   //Verifica se as duas senha são diferente
   if ($_POST['SENHA'] != $_POST['SENHA2']){
      $ac[] = "Verifique se as duas senha est&atilde;o correta.";
   }
   if ($_POST['CD_IGREJA']== -1){ //Verifica se igreja está na opção "SELECIONE"
      $ac[] = "Selecione alguma igreja.";
   }
   if ($_POST['VERIFIC']!== "novoconvertido" ){ //Verifica se igreja está na opção "SELECIONE"
      $ac[] = "C&oacute;digo invalido";
   }
   if (eregi('[^a-zA-Z0-9_]', $LOGIN)) {

    $ac[] = "Usuário Inválido";

	}
   
   
   //Verifica se todas estão corretas
   if (!isset($ac)){
	  //Inclui o cadastro no mysql
	  
	$sql_inclu = "INSERT INTO 		USUARIO(USU_CODIGO,USU_IGRE_CODIGO,USU_LOGIN,USU_SENHA,USU_NM,USU_NIVEL,USU_TEL,USU_CEL,USU_EMAIL) 
	VALUES('NULL',
	'$CD_IGREJA',
	'$LOGIN',
	'$SENHA',
	'$NOME',
	'1',
	'$TEL',
	'$CEL',
	'$EMAIL')";
	
	$exe_inclu = mysql_query($sql_inclu) or die (mysql_error());

	echo "<script>javascript:alert('Sucesso, cadastro enviado.')</script>";
	echo "<script>javascript:location.href='index.php'</script>";

	}

	else {


	echo "<script language=javascript>";
	echo "alert ('Erro')";
	echo "</script>";




	}
}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<title>Cadastro de Usu&aacute;rio</title>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js" type="text/javascript"></script>
<script src="js/maskedinput.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="bg.css" />
<link rel="stylesheet" href="css/bootstrap.css">


<script type="text/javascript">
jQuery(function($){
$("#TEL").mask("(99)9999-9999",{placeholder:"_"});
$("#CEL").mask("(99)99999-9999",{placeholder:"_"});
});
</script>

<style type="text/css">
form{
margin: 0px;
text-align: center;
}
div.principal{

width: 300px;
text-align:center;
margin-left:auto;
margin-right:auto;
}
</style>

</head>

<body>
<div class="principal">

<?php
if (isset($ac)){
   for($i=0;$i<count($ac);$i++){
      echo "<li>".$ac[$i]."</li>";
   }
}

?>

<form  id="form1" name="form1" method="post" action="<? $_SERVER['PHP_SELF']?>">
 
  <table width="100%" border="0" >
    <tr>
      <td colspan="2"> <div align="center"><strong>Cadastro Usu&aacute;rio</strong><br><br><br></div></td>
    </tr>
	
	<tr>
		<td ><span>Nome:</span></td>
		<td ><span >
        <label>
        <input name="NOME" type="text" id="NOME" value="<? echo $NOME;?>" />
        </label>
		</span></td>
    </tr>

		
	<tr>	
		<td>
		<span >Igreja: </span></td>
		<td><span >
			<select name="CD_IGREJA">
			<option value="-1">Selecione</option>
			<?php
			$query = mysql_query("SELECT IGRE_CODIGO, IGRE_NM FROM IGREJA");
			  while($prod = mysql_fetch_array($query)) { ?>
			  <option <? 
			  if($CD_IGREJA == $prod['IGRE_CODIGO'])//SE O CAMPO CADASTRADO FOR IGUAL AO CODIGO ENTAO SELECIONE
			  {
				echo 'selected';
			  } 
			  ?> value="<?php echo $prod['IGRE_CODIGO']; ?>"><?php echo $prod['IGRE_NM']; ?></option>
			<?php } ?>
			</select>
			</span>
		</td>
		</td>
	</tr>
	
	<tr>
      <td><span >E-mail:</span></td>
      <td><span >
        <label>
        <input name="EMAIL" type="text" id="EMAIL" value="<? echo $EMAIL;?>" />
        </label>
      </span></td>
    </tr>
	
	<tr>
      <td><span >Tel:</span></td>
      <td><span >
        <label>
        <input name="TEL" type="text" id="TEL" value="<? echo $TEL;?>" />
        </label>
      </span></td>
    </tr>
	
	<tr>
      <td><span >Cel:</span></td>
      <td><span >
        <label>
        <input name="CEL" type="text" id="CEL" value="<? echo $CEL;?>" />
        </label>
      </span></td>
    </tr>
		
	<tr>
    <td ><span >Login:</span></td>
      <td ><span >
        <label>
        <input name="LOGIN" type="text" id="LOGIN" value="<? echo $LOGIN;?>"/>
        </label>
      </span></td>
    </tr>
	
    <tr>
      <td><span >Senha:</span></td>
      <td><span >
        <label>
        <input name="SENHA" type="password" id="SENHA"  />
        </label>
      </span></td>
    </tr>
	
    <tr>
      <td><span >Repetir senha: </span></td>
      <td><span >
        <label>
        <input name="SENHA2" type="password" id="SENHA2" />
        </label>
      </span></td>
    </tr>
      <tr>
      <td><span >C&oacute;digo Verifica&ccedil;&atilde;o: </span></td>
      <td><span >
        <label>
        <input name="VERIFIC" type="Text" id="VERIFIC" />
        </label>
      </span></td>
    </tr>
	
    <tr>
      <td>&nbsp;</td>
      <td><span >
        
        <input type="submit" name="Submit" value="Enviar" />
        
		<input type="reset" name="reset" value="Limpar" />
      </span></td>
    </tr>
	
  </table>
  <p>&nbsp;</p>
  
</form>
<?
echo "<a href='index.php'>Voltar</b> </a>";
echo "<br><br>";
?>
</div>
</body>

</html>
