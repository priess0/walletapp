<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="utf-8">
    <title>Upravit uživatele</title>
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <h1>Upravit uživatele</h1>
    <?php

      include('connect.php');
      $q="SELECT * from payers";
      $query=mysqli_query($con,$q);
      while ($qq=mysqli_fetch_array($query)) {

    ?>




     <form action="edit-user.php" method="post">
       <p name="user-id">User ID: </p><p><?= $qq['user_id']; ?></p>
       <p>Jméno uživatele</p>
       <input type="text" name="user-name" value="<?= $qq['user_name']; ?>">
       <p>Barva</p>
       <input type="color" name="user-color" value="<?= $qq['user_color']; ?>">
       <button type="submit" name="button">Upravit</button>
       <button type="submit" name="delbutton">Smazat</button>

     </form>


     <?php
         include("connect.php");
         $user_id = $_GET['user-id'];
         $q = "DELETE from payers WHERE user-id = $user_id ";
         mysqli_query($con,$q);
     ?>









     <?php
       if(isset($_POST["button"])) {
         include("connect.php");
         $user_id=$_GET["user-id"];
         $user_name=$_POST["user-name"];
         $user_color=$_POST["user-color"];

         $query="UPDATE payers SET user_name='$user_name',user_color='$user_color', WHERE 'user-id'=$user_id";
         //$query="update payers set user_name='$user_name',user_color='$user_color', where id=$id";

         mysqli_query($con,$query);
         header("location:index.php");






       }
     }
      ?>


      <?php
      /*
      	include("connect.php");
      	if(isset($_POST['btn']))
      	{
      		$item_name=$_POST['iname'];
      		$item_prc=$_POST['iprc'];
      		$ipayer=$_POST['ipayer'];
      		$date=$_POST['idate'];
      		$id = $_GET['id'];
      		$q= "update grocerytb set item_name='$item_name', item_price='$item_prc',
      		item_payer='$ipayer', date='$date' where id=$id";
      		$query=mysqli_query($con,$q);
      		header('location:index.php');
      	}
      	else if(isset($_GET['id']))
      	{
      		$q = "SELECT * FROM grocerytb WHERE id='".$_GET['id']."'";
      		$query=mysqli_query($con,$q);
      		$res= mysqli_fetch_array($query);
      	}
        */
      ?>

  </body>
</html>
