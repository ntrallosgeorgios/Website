<?php

function sanitInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars("$data");
    return $data;
}

$userError = "";
$passwordError = "";
if (isset($_POST["username"])) {

    $username = sanitInput($_POST["username"]);
    $password = sanitInput($_POST["userpassword"]);

    // check if the user have any entry in th username field
    if (strlen($username) == 0) {
        $userError = "Your user name must not be empty!!";
    }

    require_once ('settings.php');

    $dbconn = @mysqli_connect($host,
        $user,
        $pwd,
        $sql_db
    )
    or die("<p> Error connection with the database </p>");

    $db_login = "login";
    $quercheckUser = "select * from $db_login where username = '$username';";

    $resucheckUser = mysqli_query($dbconn, $quercheckUser);

    if ($resucheckUser) {

        $checrows = mysqli_num_rows($resucheckUser); // give the rows that created by the query

        if ($checrows == 1) {

            $userError = "The user already exist";

        } else if ($checrows == 0) {

            // check if the password is valid for input
            if (strlen($password) != 0) {
                $pattern = "/^[\da-zA-Z_.!@]+$/";

                if (strlen($password) < 6) {

                    $passwordError = "You must have at list 6 characters";

                } else if (!preg_match($pattern, $password)) { // check the pattern of the password

                    $passwordError = "Your password must contain numbers characters a to z capital and the special characters _.!@";

                } else {

                    // if everythin is correct then run the query to register the user
                    $querIns = "insert into $db_login (userID, username, password) values (NULL, '$username', '$password');";

                    $restIns = mysqli_query($dbconn, $querIns);

                    if ($restIns) {

                        // if everything is ok then redirect to login page
                        header("location: login.php");

                    } else {
                        echo "<p> Something wrong with the insert query!!</p>";
                    }

                }

            } else {
                $passwordError = "You must insert a password!!";
            }

        }


    } else {
        echo "<p>Something is wrong with the query!!!</p>";
        $userError = '';
        $passwordError = '';
    }

    mysqli_close($dbconn);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assigment3 register" />
    <meta name="keywords" content="Assigm, php mysql register" />
    <meta name="author" content="Georgios Ntrallos" />
    <link href="styles/style.css" rel="stylesheet" />


    <title> Register </title>
</head>

<body>


<?php
    require ("header.inc");
?>
<main id="homepage">

    <h1>Register Page</h1>

    <form method="post" action="register.php">

        <p>
            <label for="username"> Enter your username</label>
            <input type="text" name="username" />
            <span> <?php echo $userError;  ?></span> <!-- print the username errors -->
        </p>

        <br />

        <p>
            <label for="userpassword"> Enter your password</label>
            <input type="password" name="userpassword" />
            <span><?php echo $passwordError;  ?></span> <!-- print the password errors -->
        </p>

        <br />

        <input type="submit" value="register"/>
        <input type="reset" value="Reset form"/>

    </form>


</main>

<?php
    require ("footer.inc");
?>

</body>
</html>