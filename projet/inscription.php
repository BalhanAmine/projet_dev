<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<?php include('fonction.php');?>
<script language="JavaScript">
    
function verif() {
    
     if (document.formul.email.value == "") { alert("Veuillez entrer votre adresse e-mail!"); return false;}
     if (document.formul.email.value.indexOf('@') == -1) { alert("Adresse e-mail incorrecte!"); return false; }
   
}

</script>
<div class="bodybox">
    <div class="box">
   <form action="inscription.php" method="post" name="formul"  onSubmit="verif()">
     <table>
      
        
            <td><img src="img/email icon 1.png" alt="" class="authimg"></td>
            <td>Email</td>
        </tr>
        <tr><td colspan="2"><input type="text" name="email"></td></tr>
        <tr>
            <td><img src="img/lockicon1.png" alt="" class="authimg"></td>
            <td>Password</td>
        </tr>
        <tr><td colspan="2"><input type="password" name="password" id="pw"></td></tr>
        <tr><td colspan="2">
        <?php
connexion();

if (isset($_POST['email']) && isset($_POST['password'])) {
    if (!empty($_POST['email']) && !empty($_POST['password'])) {
        $sql3 = $bdd->prepare("SELECT * FROM members WHERE Email = ?");
        $sql3->execute(array($_POST['email']));
        $reponse = $sql3->fetch();  

        if (!empty($reponse)) {
            if (password_verify($_POST['password'], $reponse["Password"])) {
        
                header("Location: index2.php");
                exit(); 
            } else {
                echo '<p style="color: red;">⚠️  Incorrect password.</p>';
            }
        } else {
            echo '<p style="color: red;">⚠️ The email does not exist.</p>';
        }
    }
}
?>
        </td></tr>
    <tr><td colspan="2"><input type="submit"></td></tr>
    <tr><td colspan="2"><input type="reset"></td></tr>
   
    
</table>
    </form>
    </div>
</div>
</body>
</html>
