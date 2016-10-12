<?php

require_once('config/config.php');
require_once(LIBS.DIRECTORY_SEPARATOR.'Bootstrap.php');
require_once(LIBS.DIRECTORY_SEPARATOR.'Controller.php');
require_once(LIBS.DIRECTORY_SEPARATOR.'View.php');
require_once(LIBS.DIRECTORY_SEPARATOR.'Database.php');
require_once(LIBS.DIRECTORY_SEPARATOR.'Model.php');
require_once(LIBS.DIRECTORY_SEPARATOR.'Authentication.php');

//Instantiate Boostrap and initialize the entire app
$app = new Bootstrap();
?>