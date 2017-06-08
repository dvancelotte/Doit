<?php require_once("cabecalho-index.php");
      require_once("logica-usuario.php"); ?>


<?php if(usuarioEstaLogado()) { ?>
    <p class="text-success">Você está logado como <?= usuarioLogado() ?>. <a href="logout.php">Deslogar</a></p>
<?php } else { ?>
  
    <div class="col-md-5 col-md-offset-4 login">
        <form action="login.php" method="post">
            <h1>Login</h1>
            <div class="col-md-12 form-div">Digite seu e-mail</div>
            <div class="col-md-12 form-div"><input class="form-control" type="email" name="email" ></div>
            <div class="col-md-12 form-div">Digite sua senha</div>
            <div class="col-md-12 form-div"><input class="form-control" type="password" name="senha"></div>
            <div class="col-md-12 form-div"><button class="btn btn-primary btn-login" type="submit">Login</button></div>
        </form>
            <div class="col-md-12 form-div"><button class="btn btn-primary btn-login-senha" onclick="senha()">Esqueci minha senha</button></div>
</div>
    
<?php echo "<script>
            function senha(){
                alert('Entre em contato com o administrado do sistema/gerente para conseguir uma nova senha');
            }
            </script>";
} ?>

<?php require_once("rodape.php"); ?>
