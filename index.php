<?php
require "config.php";
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=1100px, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <script src="https://yastatic.net/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
     <script type="text/javascript" src="/js/formsubmit.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <title>Тестовое задание</title>
<style>
   .container {
	margin-top: 25px;
  width: 60%;
}
h1 {
    text-align: center;
    text-shadow: 1px 0 1px #000,
    0 1px 1px #000,
    -1px 0 1px #000,
    0 -1px 1px #000;
    font-size: 25px; 
    color: white; 
    margin-top:10px; 
    margin-bottom:10px
}
  </style>
</head>
<body>
  <div class="container">
	<h1>Тестовое задание</h1>
<form action="/" method="post">
  <div class="d-flex gap-2 justify-content-center">
			<input type="search" name="search" id="search" placeholder="Что хотите найти?" class="form-control" autocomplete="off" required>
      <button  type="submit" name="find" class="btn btn-lg btn-primary" style="font-size: 15px; width: 30%;">Найти</button>
    </form>
    </div>
    
    <form action="/add.php" enctype="multipart/form-data" method="post" id="myform" style="margin-top: 10px;">
      <div class="d-flex gap-2 justify-content-center">
			<input class="form-control" type="file" name="load[]" id="load" multiple>
		</div>
    <br>
    </form>
    <div class="d-flex gap-2 justify-content-center">
       <?php if ($_SESSION['bruh'] != NULL) {
    echo $_SESSION['bruh'];
    $_SESSION['bruh'] = NULL;
  } 
  ?>
</div>
<?php
require "search.php";
  ?>
</div>
</div>
</body>
</html>