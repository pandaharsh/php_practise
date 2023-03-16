<style>
    .info {
        margin-top: 10px;
        border: 2px solid black;
        letter-spacing: 1px;
        font-size: 20px;
    }
</style>


<?php

$DB_NAME = 'students_record';
$TABLE_NAME = 'user_signup';

$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, $DB_NAME);

$sql = " select * from " . $TABLE_NAME;
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);

if (mysqli_num_rows($result) > 0) {

    for ($i = 0; $i < $num; $i++) {
        echo "<div class=info>";
        $row = mysqli_fetch_array($result);
        echo ("id is= " . $row["id"] . "  username is = " . $row["username"] . "   password is= " . $row["password"] . "<br>");
        echo "</div>";
    }
} else {
    echo "no data in the table";
}

?>