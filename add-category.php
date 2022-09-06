<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="utf-8">
    <title>Přidat uživatele</title>
  </head>
  <body>
    <?php include('navbar.php'); ?>
    <h1>Přidat kategorii</h1>
    <form action="add-category.php" method="post">
      <p>Jméno kateogrie</p>
      <input type="text" name="category-name">
      <button type="submit" name="button">Přidat</button>

    </form>

    <?php
      if(isset($_POST["button"])) {
        include("connect.php");
        $category_name=$_POST["category-name"];

        $query="INSERT into categories(category_name)values('$category_name')";

        mysqli_query($con,$query);
        header("location:index.php");
      }
     ?>
  </body>
</html>
