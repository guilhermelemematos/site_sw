<?php
    session_start();
    if((!isset($_SESSION['id']) == true) and (!isset($_SESSION['nome']) == true) and (!isset($_SESSION['email']) == true)){
        unset($_SESSION['id']);
        unset($_SESSION['nome']);
        unset($_SESSION['email']);
        header('Location: ../index.html');
    }
    require('conecta.php');

?>
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Painel Administrativo</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">    
    <!-- <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">     -->
    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>
    <!-- Painel Esquerdo -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="index.php"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Tarefas</h3><!-- /.menu-title -->
                    <li>
                        <a href="#"> <i class="menu-icon ti-email"></i>INSERIR NOVO CLIENTE</a>
                    </li>
                    <li>
                        <a href="#"> <i class="menu-icon fa fa-area-chart"></i>PESQUISAR UM CLIENTE</a>
                    </li>
                    <li>
                        <a href="#"> <i class="menu-icon fa fa-pie-chart"></i>Widgets</a>
                    </li> 
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
    <!-- Fim Painel Esquerdo -->

    <!-- Painel Direito -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="header-menu">
                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left"> 
                        <p>Bem vindo <b><?php echo $_SESSION['nome']; ?></b></p>                      
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>
                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa-user"></i> Meu Perfil</a>
                            <a class="nav-link" href="#"><i class="fa fa-cog"></i> Ajustes</a>
                            <a class="nav-link" href="sair.php"><i class="fa fa-power-off"></i> Sair</a>
                        </div>
                    </div>                    
                </div>
            </div>
        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Painel de Controle</h1>
                    </div>
                </div>
            </div>            
        </div>

        <div class="content mt-3">
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> You successfully read this important alert message.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
            <!--/.col-->
            <div class="col-sm-12">
            <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Data Table</strong>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Salary</th>
                                            <th>Opções</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php
                                        $sql = "SELECT * FROM cadastro";
                                        $consulta = $conexao->query($sql);
                                        while($linha = $consulta->fetch_assoc()){
                                            echo "<tr>";
                                            echo "<td>".$linha['id_cliente']."</td>";
                                            echo "<td>".$linha['nome_cliente']."</td>";
                                            echo "<td>".$linha['email_cliente']."</td>";
                                            echo "<td>".$linha['cidade_cliente']."</td>";
                                            echo "<td>
                                                    <div class='btn-group' role='group' aria-label='Basic mixed styles example'>
                                                        <button type='button' class='btn btn-primary'>Atualizar</button>
                                                        <button type='button' class='btn btn-danger'>Apagar</button>
                                                    </div>
                                                </td>";
                                            echo "</tr>";
                                        }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
            <!--/.col-->
        </div> <!-- .content -->
    </div><!-- /#right-panel -->
    <!-- Fim Painel Direito -->

    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>
