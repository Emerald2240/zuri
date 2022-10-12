<?php
session_start();
logout();

function logout()
{
    if (isset($_SESSION['username'])) {
        session_destroy();
        gotoPage('../forms/login.html');
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
