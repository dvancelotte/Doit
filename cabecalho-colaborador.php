<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("mostra-alerta.php"); ?>

<html>
<head>
    <title>Do It</title>
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
                    <li><a href="funcionario-tarefas.php">Minhas tarefas</a>
                      </li>
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
