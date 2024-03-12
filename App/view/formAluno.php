<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles-formAluno.css">
    <title>Formulário Aluno</title>
</head>
<body>
    
    <?php 
        $operacao = $_REQUEST["op"];
        
        if($operacao=="Alterar")
        {
            include("../controller/AlunoController.php");
        $res = AlunoController::resgataPorID($_REQUEST["idAluno"]);
        $qtd = $res->rowCount();
        $row = $res->fetch(PDO::FETCH_OBJ);
        $nome = $row->nomeAlu;
        $matricula = $row->matriculaAlu;
        $cpf = $row->cpfAlu;
        $idade = $row->idadeAlu;
        $id = $row->idAlu;
        $email = $row->emailAlu;
        $operacao="Alterar";
        }
        else
        {
            $nome = "";
            $matricula = "";
            $cpf = "";
            $idade = "";
            $id = "";
            $email = "";
            $operacao = "Incluir";
        }
        print "<div class='container'>";
        print "<form method='post' action='../controller/processaAluno.php'>";
        print "   <label for='nome'>Nome:</label>";
        print "   <input type='text' name='nome' value=".$nome."><br>";

        print "   <label for='matricula'>Matrícula:</label>";
        print "   <input type='text' name='matricula' value=".$matricula."><br>";

        print "   <label for='cpf'>CPF:</label>";
        print "   <input type='text' name='cpf' value=".$cpf."><br>";

        print "   <label for='idade'>Idade:</label>";
        print "   <input type='number' name='idade' value=".$idade."><br>";

        print "   <label for='email'>E-mail:</label>";
        print "   <input type='text' name='email' value=".$email."><br>";

        print "   <input type='hidden' name='idAluno' value='$id'><br>";
        print "   <input type='hidden' name='op' value='$operacao'><br>";
        print "   <input type='submit' value='$operacao'>";
        print "   </form>";
        print "</div>";
    ?>

</body>
</html>