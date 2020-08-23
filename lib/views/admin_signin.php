<h1>Admin Sign in</h1>
<div>
<form action='/admin_signin' method='POST'>
 <input type='hidden' name='_method' value='post' />
 <?php
    require PARTIALS."/form.name.php";
	require PARTIALS."/form.password.php";
 ?>
 <input type='submit' value='Sign in' />
</form>
</div>

<div class="">
  <a href= "/signin"><p>User sign in here</p></a>

</div>
