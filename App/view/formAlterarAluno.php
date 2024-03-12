<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
        include("../controller/AlunoController.php");
        $res = AlunoController::resgataPorID($_REQUEST["idAluno"]);
        $qtd = $res->rowCount();
        $row = $res->fetch(PDO::FETCH_OBJ);

        print "<form method='post' action='../controller/processaAluno.php'>";
        print "     <label for='nome'>Nome:</label>";
        print "     <input type='text' name='nome' value=".$row->nomeAlu."><br>";
        
        print "     <label for='matricula'>Matrícula:</label>";
        print "     <input type='text' name='matricula' value=".$row->matriculaAlu."><br>";
        
        print "     <label for='cpf'>CPF:</label>";
        print "     <input type='text' name='cpf' value=".$row->cpfAlu."><br>";

        print "     <label for='idade'>Idade:</label>";
        print "     <input type='number' name='idade' value=".$row->idadeAlu."><br>";

        print "     <label for='email'>E-mail:</label>";
        print "     <input type='text' name='email' value=".$row->emailAlu."><br>";

        print "     <input type='hidden' name='idAluno' value=".$row->idAlu."><br>";
        print "     <input type='hidden' name='op' value='alterar'><br>";
        print "     <input type='submit' value='Alterar'>";  

        print "     </form>";
    ?>

</body>
</html>