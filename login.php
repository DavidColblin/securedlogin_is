<html>
<head>
</head>

<?php
 if (!(isset($_GET['plaintxt']) || isset($_GET['cipher'])) )

    {

    $URL="index.php";
    $URLhome = "home.php";

   include "dbString.php";
   mysql_select_db("ISloginDavid");

$user= mysql_query("Select * from user");
$flag = 0;
session_start();


   $pwd = md5("$_POST[passwordtxt1]");

                  $time =date("F j, Y, g:i a");
                  $aged = date('j');

  while( $log = mysql_fetch_array($user) )  {

         if (($_POST['usernametxt1'] == $log['username']) && ($pwd == $log['password'])) {

            $flag = 1;
              $age= trim($log['aging']);
          }//ends 1st if
    }//ends while



            if ($flag == 1){
                 if ($age == $aged){
                    mysql_query("INSERT INTO logbook (user, time, failure) VALUES ('$_POST[usernametxt1]','$time', 'False' )  ");
                    header("Location: $URLhome"); }
                 //ends age if
                 else {
                    $_SESSION['MESSAGELOGING']="Your Account is Expired, please Register Again!!";
                    $_SESSION['views']=0;
                    $_SESSION['MESSAGEREGISTER']="Register Here";
                    header("Location: $URL");        }}
            else{
                $_SESSION['MESSAGELOGING']="Wrong Credentials. Try Again";
                $_SESSION['MESSAGEREGISTER']= "";
                $_SESSION['views']=$_SESSION['views']+1;
                header("Location: $URL");
                }//ends else
              }


   if ($_SESSION['views']==3){
                mysql_query("INSERT INTO logbook (user, time, failure) VALUES ('$_POST[usernametxt1]','$time', 'TRUE' )  ");
            }

   mysql_close($db);
   //ends isset();
?>


 </body>
 </html>