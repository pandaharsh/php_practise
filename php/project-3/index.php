<?php

//declaring all variables
$username = $_POST['username'];
$password = $_POST['password'];
$user_admin = $_POST['user_admin'];
$DB_NAME = 'students_record';
$TABLE_NAME = 'user_signup';
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
            User name:
            <input type="text" name="username" /><br /><br />
            password:
            <input type="password" name="password" /><br /><br />
            User as admin: 
            <input type="checkbox" name="user_admin" value="admin"/><br /><br />
            <input type="submit"  value="Sign up"/>
        </form><br /><br />
        <form action="logout.php" method="post">
            User name:
            <input type="text" name="username" /><br /><br />
            password:
            <input type="password" name="password" /><br /><br />
            <input type="submit"  value="Login"/>
        </form>
        </body>
    </html>';

    // rendering form
    echo $form;

    //select database
    $is_selected = mysqli_select_db($con, $DB_NAME);

    if ($is_selected) {

        // insert into database

        $sql = " SELECT * from " . $TABLE_NAME;
        if (!is_null($username) && !is_null($password)) {

            if (mysqli_query($con, $sql)) {
                $sql = "INSERT INTO " . $TABLE_NAME . " (username, password, user_admin) values ('" . $username . "' , '" . $password . "' , '" . $user_admin . "');";

            } else {
                $sql = "CREATE TABLE " . $TABLE_NAME . "(id INT AUTO_INCREMENT PRIMARY KEY, username varchar(255), password varchar(255), user_admin varchar(255) );";
            }

            if (mysqli_query($con, $sql)) {
                echo ("<br>data submitted");
            } else {
                echo mysqli_error($con);
            }
        } else {
            echo "no data here";
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