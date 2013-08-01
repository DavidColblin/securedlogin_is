<?php

    if (isset($_GET['plaintxt']) )
    {

    $plain = $_GET['plaintxt'];

    echo "<form action='encrypt.php' method='get'><input type='text' width='200' value=' " .  md5('$_GET[plaintxt]') . "' />";
    echo "<input type='submit' value='decrypt'/></form>";
    }
    else //if plaintxt is yet null
    echo '
    <form method="get" action="encrypt.php">
      Plain Text: <input type="text" name="plaintxt"/>
      <input type="submit" value="Encrypt"/>
    </form>';
 ?>

