<?php

session_start();

//declaring all variables
$username = $_POST['username'];
$password = $_POST['password'];
$DB_NAME = 'students_record';
$TABLE_NAME = 'user_signup';

// Set session variables
$_SESSION["username"] = '"' . $username . '"';
$_SESSION["password"] = '"' . $password . '"';

//Creating SQL connection.
$con = mysqli_connect('localhost', 'root');

if (!$con) {
    echo "SQL connection failed!!, data can't be inserted";
} else {

    //select database
    $is_selected = mysqli_select_db($con, $DB_NAME);

    if (!is_null($username) && !is_null($password)) {

        $sql = " SELECT username FROM $TABLE_NAME Where username = '$username' And " . "password= '" . $password . "';";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result)) {

            echo "Hello!!, $username <br /> <br />";

            $view = '<a href="show.php">
                <button>view</button>
                </a>';
            echo $view;

            $logout = '<a href="index.php">
                <button>Logout</button>
                </a>';
            echo $logout;

            if ($logout) {
                session_destroy();
            }

        } else {
            echo "Please fill the right username or password";
        }


    } else {
        echo "Please fill the form first!!, for login";
    }
}