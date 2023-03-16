<?php

// Read the JSON file 
$json = file_get_contents('data.json');

//All the result in this array variable.
$result = json_decode($json, true);
for ($x = 0; $x < 5; $x++) {
    echo ($result['articles'][$x]['title']);

}
?>