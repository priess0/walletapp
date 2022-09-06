<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/style.css">
    <meta charset="utf-8">
    <title>Přidat nákup</title>
  </head>
  <body>
    <?php
      include('navbar.php');
      include('connect.php');
    ?>
    <h1>Přidat nákup</h1>
    <form action="add-purchase.php" method="post">
      <p>Cena nákupu</p>
      <input type="number" name="purchase-value">
      <p>Název nákupu</p>
      <input type="text" name="purchase-name">
      <p>Datum nákupu</p>
      <input type="date" name="purchase-date" id="dateDefault">
      <script>
        function setInputDate(_id){
            var _dat = document.querySelector(_id);
            var toDay = new Date(),
                d = toDay.getDate(),
                m = toDay.getMonth()+1,
                y = toDay.getFullYear();
            if(d < 10){
                d = "0"+d;
            };
            if(m < 10){
                m = "0"+m;
            };
            var data = y + "-" + m + "-" + d;
            _dat.value = data;
        };
        setInputDate("#dateDefault");
      </script>
      <br>



<!--    _____________________plátce_____________________  -->



      <label for="purchase-payer"><p>Plátce nákupu</p></label>
      <select id="purchase-payer" name="payer-id">
        <?php
          $selectPayer="SELECT *
          FROM payers";
          //INNER JOIN purchases
          //ON payers.payer_id = purchases.payer_id";
          $payerQuery=mysqli_query($con,$selectPayer);
          while ($pq=mysqli_fetch_array($payerQuery)){
        ?>
        <option Value=<?php echo $pq["payer_id"]?>>
          <?php
            echo $pq["payer_name"];
          ?>
        </option>
        <?php
          }
        ?>

      </select>

<!--    _____________________kategorie_____________________  -->


      <br>
      <label for="purchase-category"><p>Kategorie nákupu</p></label>
      <select id="purchase-category" name="category-id"></select>
      <?php
        $selectPayer="SELECT *
        FROM payers";
        //INNER JOIN purchases
        //ON payers.payer_id = purchases.payer_id";
        $payerQuery=mysqli_query($con,$selectPayer);
        while ($pq=mysqli_fetch_array($payerQuery)){
      ?>
      <option Value=<?php echo $pq["payer_id"]?>>
        <?php
          echo $pq["payer_name"];
        ?>
      </option>
      <?php
        }
      ?>


      <br>
      <button type="submit" name="button">Přidat</button>



    </form>

    <?php
      if(isset($_POST["button"])) {
        include("connect.php");
        $purchase_value=$_POST["purchase-value"];
        $purchase_name=$_POST["purchase-name"];
        $purchase_date=$_POST["purchase-date"];
        $payer_id=$_POST["payer-id"];
        $category_id=$_POST["category-id"];


        $postQuery="INSERT into purchases(purchase_value,purchase_name,purchase_date,payer_id,category_id)
                values('$purchase_value','$purchase_name','$purchase_date','$payer_id','$category_id')";

        mysqli_query($con,$postQuery);
        header("location:index.php");
      }
     ?>
  </body>
</html>
