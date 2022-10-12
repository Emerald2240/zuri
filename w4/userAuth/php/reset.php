<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $newpassword = $_POST['newpassword'];

    if (resetPassword($email, $newpassword)) {
        echo 'User succesfully updated';
        // gotoPage('../forms/login.html');
        echo ('<br><a href="../forms/login.html">Go to Login Page</a>');
    } else {
        echo 'User does not exist';
        //gotoPage('../forms/resetpassword.html');
        echo ('<br><a href="../forms/login.html">Go to Login Page</a>');
    }
}

function resetPassword($email, $newpassword)
{
    //open file and check if the username exist inside
    //if it does, replace the password

    $changes = false;
    $filename = '../storage/users.csv';
    $data = [];

    // open the file
    $f = fopen($filename, 'r');

    $data = [];

    if ($f === false) {
        die('Cannot open the file ' . $filename);
    }

    // read each line in CSV file at a time
    while (($row = fgetcsv($f)) !== false) {
        // print_r($row);
        if ($row[1] == $email) {
            $row[2] = $newpassword;
            $changes = true;
        }
        $data[] = $row;
    }

    //print_r($data);

    if ($changes == false) {
        return false;
    } else {
        $fwrite = fopen($filename, 'w');
        foreach ($data as $row) {
            fputcsv($fwrite, $row);
        }
        fclose($fwrite);
        return true;
    }

    // close the file
    fclose($f);
    return false;
}

function gotoPage($location)
{
    header('location:' . $location);
    exit();
}
// echo "HANDLE THIS PAGE";
