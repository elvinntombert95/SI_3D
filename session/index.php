<?php
session_start();
require_once("class.user.php");
$login = new USER();

if($login->is_loggedin()!="")
{
	$login->redirect('home.php');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['txt_uname_email']);
	$umail = strip_tags($_POST['txt_uname_email']);
	$upass = strip_tags($_POST['txt_password']);
		
	if($login->doLogin($uname,$umail,$upass))
	{
		$login->redirect('home.php');
	}
	else
	{
		$error = "Erreur ! Verifier le pseudo ou le mot de passe";
	}	
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type="text/css" href="css/signup.css">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
            <title>Login</title>
    </head>
<body>
    <header class="header">
        <div class="title"><a href="../index.php"><p class="p">Grim Reaper</p></a></div>
            <nav class="first-nav">
                <ul>
                    <a href="#" class="js-scrollTo"><li>jeu</li></a>
                    <a href="#sectionGameplay" class="js-scrollTo"><li>règles</li></a>
                    <a href="session/index.php" class="js-scrollTo"><li>se connecter</li></a>
                    <a href="#sectionInscription" class="js-scrollTo"><li>inscription</li></a>
                </ul>
                <div class="clear"></div>
            </nav>
        <!-- /titre -->
    </header>

<div class="principal">
    <div class="block1">
    	<div class="container">
            <form class="form-signin" method="post" id="login-form">
                <h2 class="form-signin-heading">Authentification</h2>
                    <div id="error">
                        <?php
                			if(isset($error))
                			{
                				?>
                                <div class="alert alert-danger">
                                   <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?> !
                                </div>
                                <?php
                			}
                		?>
                    </div>
                
                <div class="form-group">
                    <input type="text" class="form-control" name="txt_uname_email" placeholder="Pseudo ou E-mail" required />
                        <span id="check-e"></span>
                </div>
                
                <div class="form-group">
                    <input type="password" class="form-control" name="txt_password" placeholder="Mot de passe" />
                </div>
               
                <div class="form-group">
                    <button type="submit" name="btn-login" class="btn btn-default">
                        	<i class="glyphicon glyphicon-log-in"></i>Se connecter
                    </button>
                </div>  
              	<br />
                    <label>Vous n'avez pas de compte ? <a href="sign-up.php">Inscrivez-vous</a></label>
          </form>
        </div>
    </div>
</div>

</body>
</html>