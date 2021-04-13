<?php

include('connect.php');

if(isset($_POST["action"]))
{
    $query = "SELECT * FROM product WHERE Status='1'";
if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
    {
        $query .="AND price BETWEEN '".$_POST["maximum_price"]."' AND '".$_POST["maximum_price"]."'"; 
    }
    if(isset($_POST["brand"]))
    {
        $bran_filter = implode("','",$_POST["brand"]);
        $query .="AND Brand IN ('".$brand_filter."')";

    }
    if(isset($_POST["ram"]))
    {
        $ram_filter = implode("','",$_POST["ram"]);
        $query .="AND Ram IN ('".$ram_filter."')";

    }
     $result = $conn->query($query);
    $output = "";
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $output .= '
            <div class ="col-sm-4 col-lg-3 col-md-3>
                <div style ="border:1px solid # border-radius:5px; pading:16px; margin-bottom:16px; height:450px;">
                <image src="image/'.$row['Picture'] .'" alt="" class="img-reponsive">
                <p align ="center"><strong><a href="#">'.$row['ProductName'] .'</a></strong></p>
                <h4 style = "text-align:center;" class="text-danger">'. $row['Price'] .'</h4>
                Brand : '.$row['Brand'] .' <br />
                Ram : '.$row['Ram'] .'GB<br />
                <div>
                </div>
                ';

        }
    }
    else
    {
        $output = '<h3>No Data Found</h3>';

    }
    echo $output;
}
?> 