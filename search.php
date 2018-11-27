<?php
    $key=$_GET['key'];
    $array = array();

    $con=mysqli_connect("localhost","serveruser","gorgonzola7!","serverside");
     $query=mysqli_query($con, "select * from article_details where article_title LIKE '%{$key}%'");
    while($row=mysqli_fetch_assoc($query))
    {
      $array[] = $row['article_title'];
    }
    echo json_encode($array);
    mysqli_close($con);
?>

