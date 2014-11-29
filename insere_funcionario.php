<?php
   include("config.php"); //Configurações do Banco	   
   
   if (isset($_POST['DT_ADMISSAO']))  {
   
   	$DT_ADMISSAO = $_POST['DT_ADMISSAO'];
   	$DS_NOME = $_POST['DS_NOME'];
   	$DS_EMAIL = $_POST['DS_EMAIL'];
   	$DS_FUNCAO =  $_POST['DS_FUNCAO'];
   	$NM_CPF =  $_POST['NM_CPF'];
   
   	//Inclui o cadastro no mysql
   	$sql_inclu = "INSERT INTO FUNCIONARIO(ID_CARTEIRA_TRAB,DT_ADMISSAO,DS_NOME,DS_EMAIL,DS_FUNCAO,NM_CPF)
   	VALUES('','$DT_ADMISSAO',	'$DS_NOME',	'$DS_EMAIL',	'$DS_FUNCAO',	'$NM_CPF')";
   	
   	$exe_inclu = mysql_query($sql_inclu) or die (mysql_error());
   
    	}
   ?>
<html>
   <head>
      <title>Cadastro de Funcionario</title>
   </head>
   <body>
      <div class="principal">
         <form  id="form1" name="form1" method="post" action="insere_funcionario.php">
            <table width="100%" border="0" >
            <tr>
               <td colspan="2">
                  <div align="center"><strong>Cadastro Funcionario</strong><br><br><br></div>
               </td>
            </tr>
            <tr>
               <td><span >NOME </span></td>
               <td><span >
                  <label>
                  <input name="DS_NOME" type="text" id="DS_NOME" />
                  </label>
                  </span>
               </td>
            </tr>
            <tr>
               <td >
                  <span>
                  DATA ADMISSAO
                  </span>
               </td>
               <td >
                  <span >
                  <label>
                  <input name="DT_ADMISSAO" type="text" id="DT_ADMISSAO" />
                  </label>
                  </span>
               </td>
            </tr>
            <tr>
               <td>	
                  <span >
                  EMAIL
                  </span>
               </td>
               <td>
                  <span >
                  <label>
                  <input name="DS_EMAIL" type="text" id="DS_EMAIL" />
                  </label>
                  </span>
               </td>
            </tr>
            <tr>
               <td>
                  <span >
                  FUNÇÃO
                  </span>
               </td>
               <td>	
                  <span >
                  <label>
                  <input name="DS_FUNCAO" type="text" id="DS_FUNCAO" />
                  </label>
                  </span>
               </td>
            </tr>
            <tr>
               <td ><span >CPF</span></td>
               <td ><span >
                  <label>
                  <input name="NM_CPF" type="text" id="NM_CPF"/>
                  </label>
                  </span>
               </td>
            </tr>
            <tr>
               <td>
                  <center>
                     <input type="submit" value="Cadastrar">
                  </center>
               </td>
            </tr>
         </form>
      </div>
   </body>
</html>
