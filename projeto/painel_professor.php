<?php
    include_once 'inc/header.php';
    require_once('controllers./Conexao.php');
    require_once('controllers./Crud.php');
    require_once('controllers./config.php');
    include_once 'inc/header.php';
    $Crud = new Crud(HOST, USER2, PASS2, BD);
    $mysqli = $Crud->conectar();
    if(!isset($_SESSION)){
        session_start();
    }

    
    if(!isset($_SESSION['id'])){
        header('location:index.php');
    }



?>



<link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">

<header style="margin-top: 60px">
    <div class="row">

        <div class="col-sm-6">
            <h2>Disciplina</h2>
        </div>

        
    </div>
    <hr>
</header>



<table class="table table-hover">


    <thead>
        <tr>
            <th class="text-center">Diciplina</th>

            <th class="text-center">Opções</th>
        </tr>
    </thead>
    <tbody>
<?php

$exe=$Crud->listaDisciplina($_SESSION['id']);

if($exe->num_rows>0){
    while($dados=$exe->fetch_object()){
        if(!isset($_SESSION)) {
            session_start();
        }
  




?>      
        <tr>
            <td>
                <center>
            <p><h5><?php echo $dados->nome_materia;?></h5></p>
                </center>
            </td>
            <td>
                <center>
                <a class="btn btn-sm btn-success lead" style = "font-size:20px;" href="alunos.php?nome=<?php echo $dados->nome_materia;?>">
                <i class="fas fa-eye"></i> Visualizar
                </a>
                </center>

            </td>            
        </tr>
        
<?php

}

}


?>
    </tbody>

</table>

<?php
?>

    <script src="assets/bootstrap/jquery-3.4.1.js"></script>
    <script src="assets/bootstrap/bootstrap.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="./assets/bootstrap.min.js"></script>

    <?php
    require_once 'inc/footer.php';
    ?>
</body>

</html>