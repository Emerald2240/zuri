<?php
echo '<h1>USER DATA PAGE</h1>';
if (!empty($_POST)) {
    if (!file_exists('userdata.csv')) {
        $fp = fopen('userdata.csv', 'a');
        fwrite($fp, 'Name,Email,Date_Of_Birth,Gender,Country,' . "\n");
        echo 'New File Created<br>';
    } else {
        $fp = fopen('userdata.csv', 'a');
    }

    fwrite($fp, '"' . $_POST['name'] . '",');
    fwrite($fp, $_POST['email'] . ',');
    fwrite($fp, $_POST['dateOfBirth'] . ',');
    fwrite($fp, $_POST['gender'] . ',');
    fwrite($fp, $_POST['country'] . ',' . "\n");

    fclose($fp);
    echo 'File Updated Succesfully<br>';
    print_r($_POST);
} else {
    echo 'No data entered';
}
