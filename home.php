<html>
<head>
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
<div>
<h1> Encryption Application Page (Triple DES)</h1>


<?php


    if (isset($_POST['plaintxt']) )
    {

      $plain = $_POST['plaintxt'];


      echo "<form action='home.php' method='post'>
      Key: <input type='text' name='key'/></br>
      Cipher Text:<br/><textarea name='code' rows='1' cols='36'>" .encrypt($_POST['plaintxt']). "</textarea><br/> ";
      echo "<input type='submit' value='Decrypt'/></form>";
    }
    else //if plaintxt is yet null
      echo
      '<form method="post" action="home.php">
      Key: <input type="text" name="key"/></br>
      Plain Text:<br/> <textarea name="plaintxt" rows="6" cols="36">' . decrypt() .'</textarea><br/>
      <input type="submit" value="Encrypt"/>
      </form>';

      function encrypt($planie){
            if (!(isset($_POST['key']))){
                 return "Enter text and key Here";    }
        else{
          $key = $_POST['key'];
            $codie =  mcrypt_ecb (MCRYPT_3DES, $key, $planie, MCRYPT_ENCRYPT);
            return $codie;
            }//ends else
      }

      function decrypt(){
        if (!(isset($_POST['key']) || isset($_POST['code'])  )){
                 return "Enter text and key Here";    }
        else{
           $codie = $_POST['code'];
            $key = $_POST['key'];
            $planie =  mcrypt_ecb (MCRYPT_3DES, $key, $codie, MCRYPT_DECRYPT);
            return $planie;
        }//ends else
      }
 ?>
 </div>
</body>
</html>