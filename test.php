<?php
      include('connect.php');
  $sql="SELECT * FROM categories";


  if($result=mysqli_query($con,$sql)) {
    if(mysqli_num_rows($result) > 0) {
      while ($row=mysqli_fetch_array($result)){
        echo $row['category_name'];
    }
  }
}
