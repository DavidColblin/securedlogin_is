<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<title>Internet Security</title>
<META HTTP-EQUIV="Content-Language" CONTENT="FR-FR">
<script src="jquery-1.4.2.min.js" type="text/javascript"></script>
  <link href="keyboard.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="keyboard.js" charset="UTF-8"></script>
<script>
$('document').ready(function(){
$('input').keypad();
});
</script>
</head>
  <style>
     div {
       position: absolute;
       left: 30%;
       top: 10%;
     }
     body{
       background: -webkit-gradient(
    linear,
    left bottom,
    right top,
    color-stop(0, rgb(219,219,219)),
    color-stop(0.8, rgb(242,252,250))
);

 background: -moz-linear-gradient(
    left bottom,
    rgb(219,219,219) 0%,
    rgb(242,252,250) 80%
)
     }
  </style>
<body style="font-family: Calibri">
 <h6>High Security Login by David&nbsp;Moutoussamy</h6>
<div>
<h1> Internet Security Labwork</h1>
 <?php session_start();

if(!isset($_SESSION['views']))
{$_SESSION['views']=0;
$_SESSION['MESSAGELOGING']="";
$_SESSION['MESSAGEREGISTER']=""; }
 ?>

 <?php
if ($_SESSION['views'] != 3 ){
echo '
<h3>Login</h3>

<p <font color="red"> ' . $_SESSION["MESSAGELOGING"] . '</font> </p>
<form action="login.php" method="post">
<table>
<tr><td>Username</td><td> <input class="keyboardInput" type="text" name="usernametxt1"/>          </td></tr>
<tr><td>Password </td><td><input class="keyboardInput" type="password" name="passwordtxt1"/>                 </td></tr>
<tr><td><input type="submit"/>       </td></tr>
</table>
</form>
<hr />  <hr /> '; }
else
{
  echo '<font color="red"><h3>Too Many Trials, Please Register</h3></font>';

}
?>
<h3>Register</h3>
<?php echo '<p> <font color="red"> ' . $_SESSION["MESSAGEREGISTER"] . '</font> </p> '; ?>
<form action="register.php" method="post">
<table>
<tr><td>Username</td><td> <input type="text" class="keyboardInput" name="usernametxt"/>          </td></tr>
<tr><td>Password </td><td><input type="pasword"  class="keyboardInput" id="pwdstr" name="passwordtxt"/> <b id="str"></b>                </td></tr>
<tr><td><input type="submit"/>       </td></tr>
</table>
</form>
   <script> //PASSWORD STRENGTH
        $('#pwdstr').keypress(function(){
               var len =   $(this).val().length;
               var msg

               if(len > 10) {
                 msg = "<font color='green'>Strong</font>" }
               else if (len > 5){
                 msg = "<font color='brown'>Good</font>" }
               else {
                  msg = "<font color='red'>Weak</font>" }



            $("#str").html(msg);
        });
   </script>
</div>
</body>

</html>