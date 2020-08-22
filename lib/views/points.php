<?php
echo "<h1>Claim points for Red Bin</h1>";
 //Print the list of account details
 if(!empty($list)){
   foreach($list As $detail){
     $points = htmlspecialchars($detail['points'],ENT_QUOTES, 'UTF-8');
          $fname = htmlspecialchars($detail['fname'],ENT_QUOTES, 'UTF-8');


   echo "<ul>
   <li>Points: {$points}</li>
   </ul>";


 }
}

 else{
   echo "<h2>Something went wrong</h2>";}

 ?>

 <form action='/addpoints' method='POST'>
  <input type='hidden' name='_method' value='post' />
  <input type='submit' value='Add point' />
 </form>
