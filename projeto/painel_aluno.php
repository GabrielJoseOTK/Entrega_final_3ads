<?php
    require_once('controllers./Conexao.php');
    require_once('controllers./Crud.php');
    require_once('controllers./config.php');
    if(!isset($_SESSION)){
        session_start();
    }

    
    if(!isset($_SESSION['id'])){
        header('location:index.php');
    }

        




?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/stylepainel.css">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.css">
    <title>PORTAL</title>
</head>

<body>

    <div class="alert alert-info" role="alert">
        <h2>PORTAL DO ALUNO</h2>


                </button>
                <a href="login_aluno.php" class="btn btn-danger"> <i class="fas fa-times-circle"></i>Voltar</a>
            </div>
        <style>
            

            h2 {
                text-align: center;
            }
        </style>
    </div>
<?php

$Crud = new Crud(HOST, USER, PASS, BD);
$mysqli = $Crud->conectar();


$exe=$Crud->list2($_SESSION['id']);



 
?>
    <div class="container ajuda">
        <div class="row">
            <?php
            if ($exe->num_rows > 0) {
                while ($dados = $exe->fetch_object()) {
                    $_SESSION['codigo']=$dados->codigo_materia;
                    
            ?>
                    <div class="col-sm-3">
                        <div class="card " style="width: 14rem;">
                            <img class="card-img-top" src="./assets/img/<?php echo  $dados->img; ?>" alt="Imagem de capa do card">

                            <div class="card-body">
                                <h5 class="card-title"><?php echo $dados->nome_materia ?></h5>
                                <a href="#" class="btn btn-primary col" data-toggle="modal" data-target="#m_<?php echo $dados->codigo_materia ?>">Frequência <br> </a>
                                <br><p>
                                <a href="#" class="btn btn-primary col" style="margin-top:10px" data-toggle="modal" data-target="#m2_<?php echo $dados->codigo_materia ?>">Notas <br> </a>
                                <!-- Modal -->
                                <div class="modal fade" id="m_<?php echo $dados->codigo_materia ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="rp">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ver Frequência</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                if ($dados->frequencia > 0) {
                                                    echo $dados->frequencia;
                                                } else {
                                                    echo 'sem registros';
                                                }
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                                            </div>
                                            



                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="m2_<?php echo $dados->codigo_materia ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="rp">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Notas</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <?php
                                                if ($dados->frequencia > 0) {
                                                    echo $dados->notas;
                                                } else {
                                                    echo 'sem registros';
                                                }
                                                ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>

                                            </div>
                                            



                                            
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
             <?php
                }
            ?>
        </div>
    </div>
        <?php
        }
        ?>

?>

    <script src="assets/bootstrap/jquery-3.4.1.js"></script>
    <script src="assets/bootstrap/bootstrap.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="./assets/bootstrap.min.js"></script>
</body>

</html>