<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  min-width: 100px;
  max-width: 100px;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

<?php

echo "<h1>$message</h1>";


 echo "<table>
   <tr>
     <th>ID</th>
     <th>Type</th>
     <th>Location</th>
     <th>Used</th>
   </tr>
 </table>";




 //Print the list of products
 if(!empty($list)){
   foreach($list As $product){
     $id = htmlspecialchars($product['id'],ENT_QUOTES, 'UTF-8');
     $type = htmlspecialchars($product['type'],ENT_QUOTES, 'UTF-8');
     $location = htmlspecialchars($product['location'],ENT_QUOTES, 'UTF-8');
     $used= htmlspecialchars($product['used'],ENT_QUOTES, 'UTF-8');


     echo "

     <table>

       <tr>
         <td>{$id}</td>
         <td>{$type}</td>
         <td>{$location}</td>
         <td>{$used}</td>
       </tr>
     </table>


     ";

 }
}


 else{
   echo "<h2>Product list is empty</h2>";}

   if(isset($_POST['addtocart'])) {
     session_start();
     $code = $_POST['code'];
     array_push($_SESSION['cart'],$code);
   }



 ?>
