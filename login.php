<!DOCTYPE html>
<html lang="pt-br">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Grayscale - Start Bootstrap Theme</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/stylelogin.css" rel="stylesheet">

</head>



<body id="page-top">
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Escritorio Contábil</a>
      <!-- <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button> -->
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <!-- <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#projects">Serviços</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#signup">Contato</a>
          </li>
        </ul> -->
      </div>
    </div>
  </nav>
  <br>
  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <?php
            //conexão
            require_once 'db_connect.php';
            // sessão
            session_start();
            // BOTÃO ENVIAR
           if(isset($_POST['btn-entrar'])):
            $erros = array();
            $login = mysqli_escape_string($connect, $_POST['login']);
            $senha = mysqli_escape_string($connect, $_POST['senha']);
            
            if(empty($login) or empty($senha)):
            $erros[] = "<li> O campo login/senha precisa ser preenchido </li>";
          else: 
            $sql = "SELECT login FROM usuarios WHERE login = '$login' ";
            $resultado = mysqli_query($connect, $sql);

      $resultado = mysqli_num_rows($resultado) > 0);

        // verificação ded login e senha
           $senha = md5($senha);
           $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha' ";
          $resultado = mysqli_query($connect, $sql);
      
      if(mysqli_num_rows($resultado) == 1):
            $dados = mysqli_fetch_array($resultado);
            mysqli_close($connect);
            $_SESSION ['logado'] = true;
            $_SESSION ['id_usuario'] = $dados ['id'];
            header('Location: index.php');
          else:
            $erros [] = "<li> Usuário e senha não conferem </li>";
          endif;

          else:
            $erros[] = " <li> Usuário inexistente </li>";
          endif;
        endif;
      endif;

            ?>
            <h5 class="card-title text-center">Login/Senha</h5>
            <!-- form -->
            <!-- php// -->
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>"  class="form-signin" method="POST">
              <div class="form-label-group">
                <input type="text" name="login" id="inputLogin" class="form-control" placeholder="login" required autofocus>
                <label for="inputlogin">Login</label>
              </div>

              <div class="form-label-group">
                <input type="password" name="senha" id="inputSenha" class="form-control" placeholder="Senha" required>
                <label for="inputPassword">Senha</label>
              </div>


              <div class="custom-control custom-checkbox mb-3">
                <input type="checkbox" class="custom-control-input" id="customCheck1">
                <label class="custom-control-label" for="customCheck1">Lembrar senha</label>
              
              </div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" name="btn-entrar" type="submit">Entrar</button>
              <hr class="my-4">
                 <?php
                  if(!empty($erros)):
                    foreach($erros as $erro):
                      echo $erro;
                    endforeach;
                  endif;
                  ?>  
            <!--   <button class="btn btn-lg btn-google btn-block text-uppercase" type="submit"><i class="fab fa-google mr-2"></i>Entrar com Google</button>
              <button class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit"><i class="fab fa-facebook-f mr-2"></i> Entrar com Facebook</button> -->
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>



 

 <footer class="bg-black small text-center text-white-50">
    <div class="container">
      Copyright &copy; Desenvolvido por Agência DF 2019
    </div>
  </footer>

  
</body>
 











   <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/grayscale.min.js"></script>