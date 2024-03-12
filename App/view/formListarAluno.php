<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles-listarAluno.css">
    <title>Document</title>
</head>
<body>
    
    <?php 
        include("../controller/AlunoController.php");
        $res = AlunoController::listarAlunos();
        $qtd = $res->rowCount();
    print "<div class='container'>";
        if($qtd>0){
            print "<table class ='table table-hover table-striped table-bordered'>";
            print "<tr>";
            print "<th>#</th>";
            print "<th>Nome</th>";
            print "<th>Matricula</th>";
            print "<th>CPF</th>";
            print "<th>Idade</th>";
            print "<th>E-mail</th>";
            print "</tr>";

            while ($row = $res->fetch(PDO::FETCH_OBJ)) {

                print "<tr>";
                print "<td>".$row->idAlu."</td>";
                print "<td>".$row->nomeAlu."</td>";
                print "<td>".$row->matriculaAlu."</td>";
                print "<td>".$row->cpfAlu."</td>";
                print "<td>".$row->idadeAlu."</td>";
                print "<td>".$row->emailAlu."</td>";
                print "<td>

                <button onclick=\"location.href = '../view/formAluno.php?op=Alterar&idAluno=".$row->idAlu."';\">Alterar</button>
                <button onclick=\"if(confirm('Tem certeza que deseja excluir?')) {
                    location.href = '../controller/processaAluno.php?op=excluir&idAluno=".$row->idAlu."'; }

                    else { false; }\">Excluir</button>
                    
                    </td>";
                    echo "</form>";
                    print"</tr>";
            }
            print"</table>";
        }
        else{
            echo "<p>Nenhum registro encontrado!</p>";
        }
        print "</div>";
    ?>

</body>
</html>