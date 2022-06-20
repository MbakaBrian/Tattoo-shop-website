
<?php

require_once './db_connection.php';
require_once './fetch-data.php';
require_once './insert-data.php';
$all_user = array_reverse(fetchUsers($conn));

if (isset($_POST['Name']) && isset($_POST['Email'])) {
    $insert_data = insertData($conn, $_POST['Name'], $_POST['Email'], $_POST['phonenumber'], $_POST['password']);
    if ($insert_data === true) {
        header('Location: Booknowform.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="style.css">
     <!--bootstrap-->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
     <!--font-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Finger+Paint&family=Rubik+Wet+Paint&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
</head>
<body class="homepage" id="home">
    <h2 class="text-light text-center bg-dark p-0 m-0"><u>Sign up to book for tattoos</u></h2>
<section>
    <div class="container-fluid">
        <form action="" method="POST" id="signupform">
                <label for="Name" id="Email" >Enter your full name</label>
                <input type="text" placeholder="Enter full name" id="Name" name="Name" required minlength="1"> <br>
                <label for="Email" id="Email">Enter your Email address</label>
                <input type="email" placeholder="Email@gmail.com" id="Email" name="Email" required> <br>
                <label for="phonenumber" id="phonenumber">Enter phone-number</label> 
                <input type="tel" id="phonenumber" name="phonenumber" maxlength="10" minlength="10" required placeholder="07**********"> <br>
                <label for="password" id="password" name="passoword">Password</label>
                <input type="password" required minlength="8" maxlength="15" name="password"> <br>

                <?php if (isset($insert_data) && $insert_data !== true) {
                    echo '<p class="msg err-msg">' . $insert_data . '</p>';
                }
                ?>

                <input type="submit" type="button" id="submitbutton" value="Sign up">

               
        </form>
    </div>
    <div id="loginlink">
        <a href="login.html">Log-in</a>
    </div>

</section>

    <section id="contactus" class="conatiner-fluid bg-dark text-light">
        <h2 class="text-light text-center bg-dark p-0 m-0">Contact us</h2>
        <div class="conatiner-fluid bg-dark" id="conatactus_contents">
        <div>
            <h5>You can contact us through</h5> <br>
            <p>Batcave@gmail.com</p>
            <p>(+254)712345678</p>
            <p>P.O.Box 2***</p>
        </div>
        <div>
           <a href="https://www.instagram.com" class="text-white p-2"><i class="bi bi-instagram"></i></a>
           <a href="https://www.facebook.com" class="text-white p-2"><i class="bi bi-facebook"></i></a>
            <a href="https://web.whatsapp.com" class="text-white p-2"><i class="bi bi-whatsapp"></i></a> <br><br>
            <form action="">
                Leave a message <br>
                <input type="text">
            </form>
        </div>
        </div>
        <div class="conatiner-fluid text-center text-light bg-dark"><h6>&copy;Created by Mbaka Brian</h6></div>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>