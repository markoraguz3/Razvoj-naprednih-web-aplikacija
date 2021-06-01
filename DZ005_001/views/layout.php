<DOCTYPE html>
<html>
  <head>
  <link rel="stylesheet" href="styles.css">  
</head>
  <body>
    <header class="navbar">
      <a href='./'>Početna</a>
      <a href='?controller=cities&action=index'>Cities</a>
      <a href='?controller=countries&action=index'>Countries</a>
	    <a href='?controller=countrylanguages&action=index'>Country Languages</a>
    </header>

    <div class="content">
      <?php require_once('routes.php'); ?>
</div>

    <footer>
      Copyright
    </footer>
  <body>
<html>