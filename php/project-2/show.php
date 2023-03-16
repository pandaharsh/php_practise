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
$TABLE_NAME = 'marks_detail';

$con = mysqli_connect('localhost', 'root');

mysqli_select_db($con, $DB_NAME);

$sql = " select * from " . $TABLE_NAME;
$result = mysqli_query($con, $sql);
$num = mysqli_num_rows($result);

if (mysqli_num_rows($result) > 0) {

    for ($i = 1; $i <= $num; $i++) {
        echo "<div class=info>";
        $row = mysqli_fetch_array($result);
        echo ("id is= " . $row["id"] . "  name is = " . $row["name"] . "   marks are= " . $row["marks"] . "<br>");
        echo "</div>";
    }
} else {
    echo "no data in the table";
}


?>