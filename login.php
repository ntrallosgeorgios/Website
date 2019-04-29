<?php

    session_start();

    function sanitInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars("$data");
        return $data;
    }

    $accountSuspensionDurationSeconds = 60 * 10;
    $userError = '';
    $passwordError = '';
    $totalTries = 0;
    $errorMes = '';

    $_SESSION["currentTime"] = time();

    if (isset($_POST["username"])) {


        $username = sanitInput($_POST["username"]);
        $password = sanitInput($_POST["password"]);
        $totalTries = $_POST["totalTries"];

        if (strlen($username) == 0) {
            $userError = "The username can't be empty";
        }

        if (strlen($password) == 0) {
            $passwordError = "The password can't be empty";
        }

        $triesLimit = 3;



        require_once ('settings.php');

        $dbconn = @mysqli_connect($host,
            $user,
            $pwd,
            $sql_db
        )
        or die("<p> Error connection with the database </p>");

        if ($totalTries < $triesLimit) {

            $db_login = "login";
            $querValUser = "select * from $db_login where username = '$username' and password = '$password' ";

            $resValUser = mysqli_query($dbconn, $querValUser);

            if ($resValUser) {

                $coutRow = mysqli_num_rows($resValUser);

                if ($coutRow == 1) {

                    $_SESSION ["username"] = $username;
                    header("location: manage.php");

                } else if ($coutRow == 0) {


                    $errorMes = "Your username or your password is not correct!!";


                    if ($totalTries < $triesLimit) {
                        $_SESSION['lastFail'] = time();
                        $totalTries++;
                    }

                }


            } else {

                $errorMes = "something wrong with the query!!";

            }
        } else {

            if (time() - $_SESSION['lastFail'] > $accountSuspensionDurationSeconds) {
                    $errorMes = "Your account is unlocked!";
                    $totalTries = 0;
                } else {
                    $errorMes = "you are locked for 10 minutes";
                }
        }

        mysqli_close($dbconn);

    } else {
        $userError = '';
        $passwordError = '';
        $totalTries = 0;
        $errorMes = '';
    }


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assigment3 login session" />
    <meta name="keywords" content="Assigm, php validation" />
    <meta name="author" content="Georgios Ntrallos" />
    <link href="styles/style.css" rel="stylesheet" />


    <title> login </title>
</head>

<body>

<!-- reference session login demo lab 9-->
<?php
require ("header.inc");
?>
<main id="homepage">

    <h1>Login Page</h1>

    <form method="post" action="login.php">

        <p>
            <label for="username"> Enter your username</label>
            <input type="text" name="username" />
            <span><?php echo $userError;  ?></span>
        </p>
        <br />
        <p>
            <label for="password"> Enter your password</label>
            <input type="password" name="password"  />
            <span><?php echo $passwordError;  ?></span>
        </p>

        <br />

        <p>
            <span><?php echo $errorMes; ?></span>
            <input type="hidden" name="totalTries" value="<?php echo $totalTries; ?>" />
        </p>

        <input type="submit" value="Login"/>

    </form>

    <br />

    <p>
        <?php echo "How have done ", $totalTries, " attempt(s)"; ?>
    </p>

</main>

<?php
    require ("footer.inc");
?>
</body>
</html>