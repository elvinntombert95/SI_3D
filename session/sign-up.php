<?php
session_start();
require_once('class.user.php');
$user = new USER();

if($user->is_loggedin()!="")
{
	$user->redirect('home.php');
}

if(isset($_POST['btn-signup']))
{
	$uname = strip_tags($_POST['txt_uname']);
	$umail = strip_tags($_POST['txt_umail']);
	$upass = strip_tags($_POST['txt_upass']);	
	
	if($uname=="")	{
		$error[] = "Veuillez rentrer un pseudo !";	
	}
	else if($umail=="")	{
		$error[] = "Veuillez rentrer un email !";	
	}
	else if(!filter_var($umail, FILTER_VALIDATE_EMAIL))	{
	    $error[] = 'Ajoutez une adresse mail valide !';
	}
	else if($upass=="")	{
		$error[] = "Veuillez rentrer un mot de passe !";
	}
	else if(mb_strlen($upass) < 6){
		$error[] = "Le mot de passe doit avoir 6 characters";	
	}
	else
	{
		try
		{
			$stmt = $user->runQuery("SELECT name, email FROM users WHERE name=:uname OR email=:umail");
			$stmt->execute(array(':uname'=>$uname, ':umail'=>$umail));
			$row=$stmt->fetch(PDO::FETCH_ASSOC);
				
			if($row['name']==$uname) {
				$error[] = "Désole ! Ce pseudo est non valide ou déjà utilisé.";
			}
			else if($row['email']==$umail) {
				$error[] = "Désole ! Cet e-mail est non valide ou déjà utilisé.";
			}
			else
			{
				if($user->register($uname,$umail,$upass)){	
					$user->redirect('sign-up.php?joined');
				}
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}	
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>S'inscrire</title>
        <link rel="stylesheet" type="text/css" href="css/auth.css">
        <link rel="stylesheet" type="text/css" href="css/reset.css">
</head>
<body>

    <header class="header">
        <div class="title"><a href="#"><p class="p">Grim Reaper</p></a></div>
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

<div class="signin-form">

<div class="container">	
        <form method="post" class="form-signin">
            <h2 class="form-signin-heading">Inscrivez-vous.</h2>
            <?php
			if(isset($error))
			{
			 	foreach($error as $error)
			 	{
					 ?>
                     <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-warning-sign"></i> &nbsp; <?php echo $error; ?>
                     </div>
                     <?php
				}
			}
			else if(isset($_GET['joined']))
			{
				 ?>
                 <div class="alert alert-info">
                      <i class="glyphicon glyphicon-log-in"></i> &nbsp; Inscription Reussite <a href='index.php'>Connectez-vous ici</a>
                 </div>
                 <?php
			}
			?>
            <div class="form-group">
            <input type="text" id="nom" class="form-control" name="txt_uname" placeholder="Pseudo" value="<?php if(isset($error)){echo $uname;}?>" />
            </div>
            <div class="form-group">
            <input type="text" id="email" class="form-control" name="txt_umail" placeholder="E-mail" value="<?php if(isset($error)){echo $umail;}?>" />
            </div>
            <div class="form-group">
            	<input type="password" id="password" class="form-control" name="txt_upass" placeholder="Mot de passe" />
            </div>
            <div class="clearfix"></div>
            <div class="form-group">
            	<button type="submit" class="btn btn-primary" name="btn-signup">
                	<i class="glyphicon glyphicon-open-file"></i>&nbsp;Valider
                </button>
            </div>
            <br />
            <label>Vous avez un compte ? <a href="index.php">Connectez-vous</a></label>
        </form>
       </div>
</div>

</div>

 
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.0/jquery.min.js"></script>
		<script type="text/javascript">
 
		$(function() {
		$(".submit").click(function() {
 
			/* VALUES */
			var prenom = $("#nom").val();
			var password = $("#password").val();
			var email = $("#email").val();
 
			/* DATASTRING */
		    var dataString = 'nom='+ nom+'&password='+ password +'&email='+ email;
 
 
 
			if(nom=='' || email=='') {
			$('.success').fadeOut(200).hide();
		    $('.error').fadeOut(200).show();
			/* UNCOMMNENT TO SEND TO CONSOLE */
			/* console.log ("SOMETHING HAPPENS"); */
			} else {
			$.ajax({
			type: "POST",
		    url: "sign-up.php",
		    data: dataString,
		    	success: function(){
					$('.success').fadeIn(200).show();
		    		$('.error').fadeOut(200).hide();
					/* UNCOMMNENT TO SEND TO CONSOLE */
					/*
					console.log (dataString);	
					console.log ("AJAX DONE");
					*/
		   		}
			});
				}//EOC
		   return false;
			}); //EOF
 
 
 
		});
		</script>
</body>
</html>