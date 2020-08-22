<?php
/* SET to display all warnings in development. Comment next two lines out for production mode*/
ini_set('display_errors','On');
error_reporting(E_ERROR | E_PARSE);

/* Set the path to the Application folder */
DEFINE("LIB",$_SERVER['DOCUMENT_ROOT']."/lib/");

/* SET VIEWS path */
DEFINE("VIEWS",LIB."views/");
DEFINE("PARTIALS",VIEWS."/partials");

# Paths to actual files
DEFINE("MODEL",LIB."/model.php");
DEFINE("APP",LIB."/application.php");

# Define a layout
DEFINE("LAYOUT","standard");

# This inserts our application code which handles the requests and other things
require APP;



/* Here is our Controller code i.e. API if you like.  */
/* The following are just examples of how you might set up a basic app with authentication */


#GET Functions
get("/bins",function($app){
   $app->set_message("title","Darwin Art Company");
   $app->set_message("message","Bins");
   require MODEL;
   $app->set_message("list", product_list());
   $app->render(LAYOUT,"bins");
});

get("/myaccount",function($app){
   $app->set_message("title","Darwin Art Company");
   $app->set_message("message","My Account");
   require MODEL;
   $app->set_message("list", my_account());
   $app->render(LAYOUT,"myaccount");
});

get("/leaderboard",function($app){
   $app->set_message("title","Darwin Art Company");
   $app->set_message("message","Leader Board");
   require MODEL;
   $app->set_message("list", leaderboard());
   $app->render(LAYOUT,"leaderboard");
});

get("/points",function($app){
   $app->set_message("title","Darwin Art Company");
   $app->set_message("message","My Account");
   require MODEL;
   $app->set_message("list", points());
   $app->render(LAYOUT,"points");
});

get("/cart",function($app){
   $app->set_message("title","My Cart");
   $app->set_message("message","Your cart:");
   require MODEL;
   $app->set_message("list", cart());
   $app->render(LAYOUT,"cart");
});

get("/addbin",function($app){
   $app->set_message("title","My Cart");
   $app->set_message("message","Your cart:");
   require MODEL;
   $app->render(LAYOUT,"addbin");
});

get("/",function($app){
  require MODEL;
   $app->force_to_http("/");
   $app->set_message("title","Home");
   $app->set_message("message","Home");
   $app->set_message("name",get_user_name());
   $app->render(LAYOUT,"home");

});

get("/signin",function($app){
   $app->force_to_http("/signin");
   $app->set_message("title","Sign in");
   require MODEL;
   try{
     if(is_authenticated()){
        $app->set_message("error","Why on earth do you want to sign in again.
        You are already signed in. Perhaps you want to sign out first.");
     }
   }
   catch(Exception $e){
       $app->set_message("error",$e->getMessage($app));
   }
   $app->render(LAYOUT,"signin");
});

get("/signup",function($app){
    $app->force_to_http("/signup");
    require MODEL;
    $is_authenticated=false;
    $is_db_empty=false;
    try{
       $is_authenticated = is_authenticated();
       $is_db_empty = is_db_empty();
    }
    catch(Exception $e){
       $app->set_flash("We have a problem with DB. The gerbils are working on it.");
       $app->redirect_to("/");
    }

    if($is_authenticated){
        $app->set_message("error","Create more accounts for other users.");
    }
    else if(!$is_authenticated && $is_db_empty){
       $app->set_message("error","You are the SUPER USER. This account cannot be deleted. You are the boss.
       The only way to clear the SUPER USER from the database is to DROP the entire table.
       Please sign in after you have finished signing up.");
    }
    else{
       $app->set_flash("You are not authorised to access this resource yet. I'm gonna tell your mum if you don't sign in.");
       $app->redirect_to("/signin");
    }
   $app->set_message("title","Sign up");
   $app->render(LAYOUT,"signup");
});

get("/change",function($app){
   $app->force_to_http("/change");
   $app->set_message("title","Change password");
   require MODEL;
   $name="";
   try{
      if(is_authenticated()){
        try{
           $name = get_user_name();
           $app->set_message("name",$name);
           $id = get_user_id();
           $app->set_message("user_id",$id);
        }
        catch(Exception $e){
            $app->set_message("error","Error with retrieving name");
        }
      }
      else{
          $app->set_flash("You are not authorised to do this.");
          $app->redirect_to("/");
      }
   }
   catch(Exception $e){
       $app->set_message("error",$e->getMessage());
   }
   $app->render(LAYOUT,"change_password");
});

get("/signout",function($app){
   $app->force_to_http("/signout");
   require MODEL;
   if(is_authenticated()){
      try{
         sign_out();
         $app->set_flash("You are now signed out.");
         $app->redirect_to("/");
      }
      catch(Exception $e){
        $app->set_flash("Something wrong with the sessions.");
        $app->redirect_to("/");
     }
   }
   else{
        $app->set_flash("You can't sign out if you are not signed in!");
        $app->redirect_to("/signin");
   }
});


#POST Functions

post("/addtocart",function($app){
    require MODEL;
    addtocart();
    $app->set_flash(htmlspecialchars("Your cart has been updated"));
    $app->redirect_to("/cart");
  });

post("/signup",function($app){
    require MODEL;
    try{
        if(is_authenticated() || is_db_empty()){
          $email = $app->form('email');
          $fname = $app->form('fname');
          $lname = $app->form('lname');
          $pw = $app->form('password');
          $confirm = $app->form('password-confirm');

          if($email && $fname && $lname && $pw && $confirm){
              try{
                sign_up($email,$fname, $lname,$pw,$confirm);
                $app->set_flash(htmlspecialchars($app->form('name'))." is now signed up ");
             }
             catch(Exception $e){
                  $app->set_flash($e->getMessage());
                  $app->redirect_to("/signup");
             }
          }
          else{
             $app->set_flash("You are not signed up. Try again and don't leave any fields blank.");
             $app->redirect_to("/signup");
          }
          $app->redirect_to("/signup");
        }
        else{
           $app->set_flash("You are not authorised to access this resource");
           $app->redirect_to("/");
        }
    }
    catch(Exception $e){
         $app->set_flash($e.getMessage());
         $app->redirect_to("/");
    }
});

post("/signin",function($app){
  $name = $app->form('name');
  $password = $app->form('password');
  if($name && $password){
    require MODEL;
    try{
       sign_in($name,$password);
    }
    catch(Exception $e){
      $app->set_flash("Could not sign you in. Try again. {$e->getMessage()}");
      $app->redirect_to("/signin");
    }
  }
  else{
       $app->set_flash("Something wrong with name or password. Try again.");
       $app->redirect_to("/signin");
  }
  $app->set_flash("Lovely, you are now signed in!");
  $app->redirect_to("/");
});

#doesnt work
put("/change",function($app){
  // Not complete because can't handle complex routes like /change/23
  $app->set_flash("Password is changed");
  $app->redirect_to("/");
});


post("/addbin",function($app){
      require MODEL;
      $type = $app->form('type');
      $location = $app->form('loc');
      $used = $app->form('use');

      if($type && $location && $used){
      addbin($type, $location, $used);
      $app->set_flash(htmlspecialchars($app->form('type'))." bin is now added at ". htmlspecialchars($app->form('loc')) );
          }
      $app->redirect_to("/bins");

      });

post("/cart",function($app){
      session_start();
      require MODEL;
      $cart= $_SESSION['cart'];

      #for purchase table
      $date = date("l jS \of F Y h:i:s A");
      $purchaseno= mt_rand(1,255);
      $email= $_SESSION["email"];

      #purchase item table
      $autogen= mt_rand(1,255);

      if(!empty($_SESSION["cart"])){
        foreach($_SESSION['cart'] as $key=>$value)
            { $productno= $value;
              $itemno= $autogen;
                      }
                }
      if($productno && $itemno){
        placeorder($date, $email, $purchaseno, $itemno, $productno);
        $app->set_flash(htmlspecialchars(" Your order is now placed "));
        }
        $app->redirect_to("/myaccount");

      })
;

post("/addpoints",function($app){
      session_start();
      require MODEL;
      $db = get_db();
      $email= $_SESSION["email"];


//Will propbably seperate some of this code into models to make cleaner

//select points from users account
      $query = "SELECT points FROM user where email = '$email'";
      $statement= $db->prepare($query);
      $statement->execute();
      $list = $statement->fetch(PDO::FETCH_ASSOC);
//select usage points from bin with id=1
      $query_bin = "SELECT used FROM bin where id = '1'";
      $statement= $db->prepare($query_bin);
      $statement->execute();
      $bin_list = $statement->fetch(PDO::FETCH_ASSOC);


//cast the results into an integer
      $points= (int) $list['points'];
      $bin_used= (int) $bin_list['used'];

//add 1 point to their totals
      $updated_points = $points+ 1;
      $updated_bin= $bin_used+1;

//update their totals in the database
      $query2 = "UPDATE user set points = '$updated_points' where email = '$email'";
      $query3 = "UPDATE bin set used = '$updated_bin' where id = '1'";

      $statement = $db->prepare($query2);
      $statement -> execute();

      $statement = $db->prepare($query3);
      $statement -> execute();

//redirect to points page (which they should be on anyway)
      $app->redirect_to("/points");

      })
;


# The Delete call back is left for you to work out
// New. If it get this far then page not found
resolve();
