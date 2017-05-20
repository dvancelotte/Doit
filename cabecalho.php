<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("mostra-alerta.php"); ?>

<html>
<head>
    <title>Minha loja</title>
    <meta charset="utf-8">
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/site.css" rel="stylesheet" />
   
</head>
<body>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js" ></script>
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <a href="index.php" class="navbar-brand">Do it</a>
            </div>
            <div>
                <ul class="nav navbar-nav">
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Projeto<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="#">Consultar</a></li>
                          <li><a href="projeto-formulario.php">Cadastrar</a></li>
                        </ul>
                      </li>
                    <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Funcionario<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                          <li><a href="funcionario-consulta.php">Consultar</a></li>
                          <li><a href="funcionario-formulario.php">Cadastrar</a></li>
                        </ul>
                      </li>
                    <li><a href="sobre.php">Minha conta</a></li>
                    <li><a href="sobre.php">Sobre</a></li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container">

    <div class="principal">

        <?php
        mostraAlerta("success");
        mostraAlerta("danger");
        ?>
