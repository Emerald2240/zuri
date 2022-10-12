<?php
if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $newpassword = $_POST['newpassword'];

    //if password is reset succesfully, display successful message, if not display unsuccesful message
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

    $changes = false;
    $filename = '../storage/users.csv';
    $data = [];

    if (!file_exists('../storage/users.csv')) {
        die('Oops! File not available. Go register.');
    }

    // open the file
    $f = fopen($filename, 'r');

    //variable to temporarily hold csv data
    $data = [];

    if ($f === false) {
        die('Cannot open the file ' . $filename);
    }

    // read each line in CSV file at a time and compare email. if match found, make required changes
    while (($row = fgetcsv($f)) !== false) {
        // print_r($row);
        if ($row[1] == $email) {
            $row[2] = $newpassword;
            $changes = true;
        }
        $data[] = $row;
    }

    echo '<pre>';
    print_r($data);

    //if no changes, do nothing, if there are, rebuild csv file
    if (!$changes) {
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

//redirects user to another page
function gotoPage($location)
{
    header('location:' . $location);
    exit();
}
