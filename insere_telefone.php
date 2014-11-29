<?php
   include("config.php"); //Configurações do Banco	   
   
   if (isset($_POST['ID_CARTEIRA_TRAB']))  {
   
   	
   	$ID_CARTEIRA_TRAB = $_POST['ID_CARTEIRA_TRAB'];
   	$DS_TELEFONE = $_POST['DS_TELEFONE'];
   
   	//Inclui o cadastro no mysql
   	$sql_inclu = "INSERT INTO telefone (ID_TELEFONE, ID_CARTEIRA_TRAB, DS_TELEFONE)
   
   	VALUES('','$ID_CARTEIRA_TRAB','$DS_TELEFONE')";
   	
   	$exe_inclu = mysql_query($sql_inclu) or die (mysql_error());
   
    	}
   ?>
<html>
   <head>
      <title>Cadastro de Telefone</title>
   </head>
   <body>
      <div class="principal">
         <form  id="form1" name="form1" method="post" action="insere_telefone.php">
            <table width="100%" border="0" >
               <tr>
                  <td colspan="2">
                     <div align="center"><strong>Cadastro Funcionario</strong><br><br><br></div>
                  </td>
               </tr>
               <tr>
                  <td ><span>FUNCIONARIO</span></td>
                  <td >
                     <span >
                        <label>
                           <select name="ID_CARTEIRA_TRAB">
                              <option value="-1">Selecione</option>
                              <?php
                                 $query = mysql_query("SELECT ID_CARTEIRA_TRAB,DS_NOME FROM FUNCIONARIO");
                                  while($prod = mysql_fetch_array($query)) { ?>
                              <option value="<?php echo $prod['ID_CARTEIRA_TRAB']; ?>" >
                                 <?php echo $prod['DS_NOME']; ?>
                              </option>
                              <?php } ?>
                           </select>
                        </label>
                     </span>
                  </td>
               </tr>
               <tr>
                  <td><span >TELEFONE</span></td>
                  <td><span >
                     <label>
                     <input name="DS_TELEFONE" type="text" id="DS_TELEFONE">
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
            </table>
         </form>
      </div>
   </body>
</html>
