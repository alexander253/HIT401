<?php
echo "<h1>$message</h1>";

if(!empty($_SESSION["email"])){
  echo "<h2>You are currently signed in as:</h2>";
  echo $_SESSION['email'];
}
  else {
    echo "You are not signed in, sign in or sign up to to start earning points";}








 ?>
