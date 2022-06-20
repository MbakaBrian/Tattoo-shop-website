<?php
function insertData($conn, $Name, $Email,$phonenumber,$password)
{
    $Name = trim(mysqli_real_escape_string($conn, htmlspecialchars($Name)));
    $Email = trim(mysqli_real_escape_string($conn, htmlspecialchars($Email)));
    $phonenumber = trim(mysqli_real_escape_string($conn, htmlspecialchars($phonenumber)));
    $password = trim(mysqli_real_escape_string($conn, htmlspecialchars($password)));

    // IF NAME OR EMAIL IS EMPTY
    if (empty($Name) || empty($Email)) {
        return 'Please fill all required fields.';
    }
    //IF EMAIL IS NOT VALID
    elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
        return 'Invalid email address.';
    } else {
        $check_email = mysqli_query($conn, "SELECT `Email` FROM `sign-up` WHERE `Email` = '$Email'");
        // IF THE EMAIL IS ALREADY IN USE
        if (mysqli_num_rows($check_email) > 0) {
            return 'This email is already registered. Please try another.';
        }

        // INSERTING THE USER DATA
        $query = mysqli_query($conn, "INSERT INTO `sign_up`(`Name`,`Email`,'phonenumber','password') VALUES('$Name','$Email','$phonenumber','$password')");
        // IF USER INSERTED
        if ($query) {
            return true;
        }
        return 'Opps something is going wrong!';
    }
}