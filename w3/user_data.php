<?php
echo '<h1>USER DATA PAGE</h1>';

// Checks if post global array is empty
if (!empty($_POST)) {
    // Checks if userdata.csv already exists. If it doesnt exist, the first row of the csv file is created.
    if (!file_exists('userdata.csv')) {
        $fp = fopen('userdata.csv', 'a');
        fwrite($fp, 'Name,Email,Date_Of_Birth,Gender,Country' . "\n");
        echo 'New File Created<br>';
    } else {
        $fp = fopen('userdata.csv', 'a');
    }

    //All the different data is written to the file in the order of the title above. \n text is added to create a new line
    #region
    fwrite($fp, '"' . $_POST['name'] . '",');
    fwrite($fp, $_POST['email'] . ',');
    fwrite($fp, $_POST['dateOfBirth'] . ',');
    fwrite($fp, $_POST['gender'] . ',');
    fwrite($fp, $_POST['country'] .  "\n");
    #endregion

    fclose($fp);
    echo 'File Updated Succesfully<br>';
    print_r($_POST);
} else {
    echo 'No data entered';
}
