<?php
    $con = mysqli_connect("localhost","root","","abcreation");
    if(!$con){
        die("Connection Error");
    }
    $sql = "select * from invoice_form";
    $result = $con -> query($sql);

    if(!$result){
        die("Invalid query: " . $con->error);
    }

    while($row = $result -> fetch_assoc()){
        
    }
?>