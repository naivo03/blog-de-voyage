<?php session_start(); ?> <!--dois se mettre au debut de chaque page afin de verifier l'etat de la session-->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> <!--charset pour comprendre le francais (accents, cedille, etc..) sinon met des @, #,etc...-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog de Naivo</title> <!--nom onglet-->

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.css" rel="stylesheet">

  </head>

  <body>

  <?php //verification de session existante
  		if(!isset($_SESSION['userConnected']))
   			header("location:login.html");
   ?>
    <!-- Static navbar -->
    <?php require_once('couleurNavbar.php'); ?>
    <!--<nav class="navbar navbar-default navbar-static-top">-->
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Blog de Naivo</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="#">Articles</a></li>
            <li><a href="administration.php">Administration</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
            	<form method="POST" action="deconnexion.php">
            		<input type="submit" value="Deconnexion" class="btn btn-lg btn-primary" role="button" >
            	</form>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>