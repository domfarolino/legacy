<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="<?php echo URL?>public/styles/normalize.css">
	<link rel="stylesheet" href="<?php echo URL?>public/styles/global.css">
	<link rel="stylesheet" href="<?php echo URL?>public/styles/menu.css">
	<link rel="stylesheet" href="<?php echo URL?>public/styles/scroll.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<?php
		if(isset($this->data['css'])){
			foreach($this->data['css'] as $key=>$value){
				echo '<link rel="stylesheet" href="'.URL.'public/styles/'.$value.'.css">';
			}
		}
	?>

	<title><?php echo $this->data['title']?></title>
</head>