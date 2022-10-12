<?php
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email']; //finish this line
    $password = $_POST['password']; //finish this

    if (loginUser($email, $password)) {
        gotoPage('../dashboard.php');
    } else {
        gotoPage('../forms/login.html');
    }
}

function gotoPage($location)
{
    header('location:' . $location);
    exit();
}

function loginUser($email, $password)
{
    /*
        Finish this function to check if username and password 
    from file match that which is passed from the form
    */

    //Checks if the user has already previously logged in and grants easy access.
    // if (isset($_SESSION['username'])) {
    //     echo $_SESSION['username'];
    //     return true;
    // }

    $filename = '../storage/users.csv';
    $data = [];

    // open the file
    $f = fopen($filename, 'r');

    if ($f === false) {
        die('Cannot open the file ' . $filename);
    }

    // read each line in CSV file at a time
    while (($row = fgetcsv($f)) !== false) {
        $data[] = $row;
        if ($row[1] == $email && $row[2] == $password) {
            $_SESSION['username'] = $row[0];
            fclose($f);
            return true;
        }
        //print_r($row);
    }

    // close the file
    fclose($f);
    return false;
}

//echo "HANDLE THIS PAGE";
