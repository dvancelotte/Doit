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
    <div class="container">

    <div class="principal">

        <?php
        mostraAlerta("success");
        mostraAlerta("danger");
        ?>
