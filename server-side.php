
<?php
       $conn = new mysqli("localhost" , "root", "", "google");
       $name =  $_POST['name'];
       $salary = $_POST['salary'];
       $position = $_POST['position'];
       if ($conn->query("INSERT INTO employees (name, salary, position) VALUES ('$name', '$salary', '$position')" )) {
                echo "Successfully Inserted new Employee";
        } else {
                echo "Unsuccessful Insertion";
        }
?>