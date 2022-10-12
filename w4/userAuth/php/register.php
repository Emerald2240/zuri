<?php
if (isset($_POST['submit'])) {
    $username = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    registerUser($username, $email, $password);
}

function registerUser($username, $email, $password)
{
    //save data into the file
    if (!empty($username) || !empty($email) || !empty($password)) {
        // Checks if userdata.csv already exists. If it doesnt exist, the first row of the csv file is created.
        if (!file_exists('../storage/users.csv')) {
            $fp = fopen('../storage/users.csv', 'a');
            fwrite($fp, 'Username,Email,Password' . "\n");
            echo 'New File Created<br>';
        } else {
            $fp = fopen('../storage/users.csv', 'a');
        }

        //All the different data is written to the file in the order of the title above. \n text is added to create a new line
        #region
        fwrite($fp, '"' . $username . '",');
        fwrite($fp, $email . ',');
        fwrite($fp, $password  . "\n");
        #endregion

        fclose($fp);
        echo 'User Successfully Registered<br>';
        echo ('<br><a href="../forms/login.html">Go to Login Page</a>');

        //print_r($_POST);
    } else {
        echo 'No data entered';
        echo ('<br><a href="../forms/register.html">Go back</a>');
    }
    // echo "OKAY";
}
// echo "HANDLE THIS PAGE";
