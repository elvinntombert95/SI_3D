<?php

	require_once("session.php");
	
	require_once("class.user.php");
	$auth_user = new USER();
	
	
	$user_id = $_SESSION['user_session'];
	
	$stmt = $auth_user->runQuery("SELECT * FROM users WHERE id=:id");
	$stmt->execute(array(":id"=>$user_id));
	
	$userRow=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<script type="text/javascript" src="jquery-1.11.3-jquery.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/reset.css">
        <link rel="stylesheet" type="text/css" href="css/home.css">
<title>Bienvenue - <?php print($userRow['name']); ?></title>
</head>

<body>    	
  
<div class="content">
<div class="container-fluid">
    <header class="header">
      <div class="title"><a href="../index.php"><p class="p">Grim Reaper</p></a></div>
          <nav class="first-nav">
              <ul>
                  <a href="../jeu/New Unity Project.html" class="js-scrollTo"><li>Jeu</li></a>
                  <a href="#sectionGameplay" class="js-scrollTo"><li>Règles</li></a>
                  <a href="logout.php?logout=true" class="js-scrollTo"><li>Se déconnecter</li></a>
              </ul>
              <div class="clear"></div>
          </nav>
      <!-- /titre -->
    </header>
  <div class="container">
    	<h1 >Bienvenue : <?php print($userRow['name']); ?></h1>
        <h1>
          <p class="h4">Score total : <span><?php print($userRow['score']); ?></span></p>  
  </div>
</div>

<center>
<div class="level">
  <h1>Mes niveaux</h1>
    <ul>

      <li>
        <img src="img/img1.png">
      </li>

        <li>
          <img src="img/img2.png">
        </li>br

        <li>
          <img src="img/img3.png">
        </li>

        <li>
          <img src="img/img4.png">
        </li>

        <li>
          <img src="img/img5.png">
        </li>

        <li class="cs">
          <p>J-4</p>
        </li>
      </ul>
</div>
</center>

</div>
<footer>
    <a href="https://www.facebook.com/Grim-Reaper-Game-699147933521239/" target="_blank"><img src="img/footer.png" alt="footer" class="footer"></a>
    <!-- /social -->
  </footer>
  <!-- /content -->
</body>
</html>