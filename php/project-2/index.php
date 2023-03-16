<?php

//declaring all variables
$name = $_POST['name'];
$marks = $_POST['marks'];
$DB_NAME = 'students_record';
$TABLE_NAME = 'marks_detail';


//Creating SQL connection.
$con = mysqli_connect('localhost', 'root');

if (!$con) {
    echo "SQL connection failed!!, data can't be inserted";
} else {

    //html of student form
    $form = '<!DOCTYPE html>
    <html lang="en">
        <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        </head>
        <body>
        <form action="index.php" method="post">
            S name:
            <input
            type="text"
            placeholder="Enter Student name"
            name="name"
            /><br /><br />
            Marks:
            <input type="number" placeholder="Enter Marks" name="marks" /><br /><br />
            <input type="submit" />
            <button>
             <a href="show.php">view</a>
            </button>
        </form>
        </body>
    </html>';

    // rendering form
    echo $form;



    //select database
    $is_selected = mysqli_select_db($con, $DB_NAME);

    if ($is_selected) {

        // insert into database

        $sql = " select * from " . $TABLE_NAME;
        if (!is_null($name) && !is_null($marks)) {

            if (mysqli_query($con, $sql)) {
                $sql = "INSERT INTO " . $TABLE_NAME . " (name, marks) values ('" . $name . "' , " . $marks . ");";

            } else {
                $sql = "CREATE TABLE " . $TABLE_NAME . "(id INT AUTO_INCREMENT PRIMARY KEY, name varchar(255), marks INT);";
            }

            if (mysqli_query($con, $sql)) {
                echo ("<br>data submitted");
            } else {
                echo mysqli_error($con);
            }
        } else {
            echo "Data is empty!";
        }

    } else {
        // Create database
        $sql = "CREATE DATABASE " . $DB_NAME;
        if (mysqli_query($con, $sql)) {
            echo "Database created successfully";
        } else {
            echo "Error creating database: " . mysqli_error($con);
        }
    }
}

?>