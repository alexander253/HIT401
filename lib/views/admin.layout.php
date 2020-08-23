<!DOCTYPE html>
<html>
<head>
<meta charset='utf-8' />
<title><?php echo $title ?></title>
 <link rel="stylesheet" href="/css/different.css" />
</head>
<body>

<div id="main">
<nav>
<ul>
  <li><a href='/'>Home</a></li>
  <li><a href='/bins'>Bins</a></li>
  <li><a href='/addbin'>Add a Bin</a></li>
  <!--<li><a href='/cart'>My Cart</a></li>
      <li><a href='/myaccount'>My Account</a></li>
      <li><a href='/signin'>Sign in</a></li>
      <li><a href='/signup'>Sign up</a></li>
      <li><a href='/points'>Points</a></li>
-->

  <li><a href='/leaderboard'>Leader Board</a></li>

  <li><a href='/signout'>Sign out</a></li>

  <li><a href='/addrubbish_item'>Add rubbish item</a></li>
  <li><a href='/rubbish_items'>Rubbish items</a></li>


</ul>
</nav>


<div id='content'>
<?php
  if(!empty($flash)){
    echo "<p class='flash'>{$flash}</p>";
  }
  if(!empty($error)){
    echo "<p class='flash'>{$error}</p>";
  }
  require $content;
?>
</div> <!-- end content -->

</div> <!-- end main -->

</body>
</html>
