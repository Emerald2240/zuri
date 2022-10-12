<?php
//Initialize the session global variable
session_start();

if (isset($_POST['submit'])) {
    $email = $_POST['email']; //finish this line
    $password = $_POST['password']; //finish this

    //If the login is succesful, go to dashboard page, if not send user back to login page
    if (loginUser($email, $password)) {
        gotoPage('../dashboard.php');
    } else {
        gotoPage('../forms/login.html');
    }
}

//redirects to new page
function gotoPage($location)
{
    header('location:' . $location);
    exit();
}

function loginUser($email, $password)
{
    //Checks if the user has already previously logged in and grants easy access.
    // if (isset($_SESSION['username'])) {
    //     echo $_SESSION['username'];
    //     return true;
    // }
    if (!file_exists('../storage/users.csv')) {
        die('Oops! File not available. Go register.');
    }

    $filename = '../storage/users.csv';
    $data = [];

    // open the file
    $f = fopen($filename, 'r');

    if ($f === false) {
        die('Cannot open the file ' . $filename);
    }

    // read each line in CSV file at a time and compare to user email and password
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
