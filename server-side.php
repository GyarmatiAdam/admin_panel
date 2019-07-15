
<?php
include_once "dbconnection.php";

        $product_name = isset($_POST['product_name']);
        $product_price = isset($_POST['product_price']);
        $product_cat = isset($_POST['product_cat']);
        $product_details = isset($_POST['product_details']);

       if ($connect->query("INSERT INTO products 
         (product_name, 
         product_price, 
         product_cat, 
         product_details)
         VALUES (
           '$product_name',
           $product_price,
           '$product_cat',
           '$product_details'
         );")) {
                echo "Successfully Inserted new Employee";
        } else {
                echo "Unsuccessful Insertion";
        }
?>