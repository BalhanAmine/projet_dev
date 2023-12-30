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
    if (document.formul.username.value == "")
     { 
        alert("Please type in your Username!"); return false;
     }
     if (document.formul.email.value == "") { alert("Veuillez entrer votre adresse e-mail!"); return false;}
     if (document.formul.email.value.indexOf('@') == -1) { alert("Adresse e-mail incorrecte!"); return false; }
     
     var password = document.formul.password.value;
     var confirmPassword = document.formul.confpassword.value;
     var specialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]+/;
     var letter = /[a-zA-Z]/;
   
     if (password.length < 8) {
        alert("Enter more than 8 digits");
       return false;
     }
   
     if (!specialChar.test(password) || !letter.test(password)) {
        alert("Enter Special Characters and Letters"); 
       return false;
     }
   
     if (password !== confirmPassword) {
        alert("The password is incorrect"); 
       return false;
     }
   
     return true;
   
}

</script>
<div class="bodybox">
    <div class="box">
   <form action="authentification.php" method="post" name="formul"  onSubmit="verif()">
     <table>
       <tr >
            <td><img src="img/username icon 1.png" alt="" class="authimg"></td>
            <td>Username</td>
            
        </tr>
        <tr><td colspan="2"><input type="text" name="username"></td></tr>
        <tr>
            <td><img src="img/email icon 1.png" alt="" class="authimg"></td>
            <td>Email</td>
        </tr>
        <tr><td colspan="2"><input type="text" name="email"></td></tr>
        <tr>
            <td><img src="img/lockicon1.png" alt="" class="authimg"></td>
            <td>Password</td>
        </tr>
        <tr><td colspan="2"><input type="password" name="password" id="pw"></td></tr>
        <tr>
            <td><img src="img/confirm password.png" alt="" class="authimg"></td>
            <td>Confirm Password</td>
        </tr>
        <tr><td colspan="2"><input type="password" name="confpassword" id="pw"></td></tr>
        <tr><td colspan="2"><p><a href="inscription.php"style="color: yellow;">login</a></p></td></tr>
    <tr><td colspan="2"><input type="submit" value="submit"></td></tr>
    <tr><td colspan="2"><input type="reset" value="Cancel"></td></tr>
   
    
</table>
    </form>
    </div>
</div>
</body>
</html>
<?php
connexion();
if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confpassword']) )
{
if(!empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confpassword']) )
{
    $sql1=$bdd->query("select * from members where Email='".$_POST['email']."'");
    $reponse= $sql1->fetch();
    if(empty($reponse)){
     $sql2= $bdd->exec("insert into 
                   members(UserName,Email,Password,Password_Confirm) 
                   values('" .$_POST['username']."' , 
                          '".$_POST['email']."' , 
                          '".$_POST['password']."' , 
                          '".$_POST['confpassword']."');");
                          
                        
             
                header("Location: index2.php");
                die();
          
}
header("Location: index2.php");
die();
}
}

?>