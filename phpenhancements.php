<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assigment3 Login page " />
    <meta name="keywords" content="Assigm, php mysql login page" />
    <meta name="author" content="Georgios Ntrallos" />
    <link href="styles/style.css" rel="stylesheet" />


    <title> Login page </title>
</head>

<body>


<?php
    require ("header.inc");
?>
<main id="homepage">

    <h1>Enhancements</h1>

    <p>
        First one in the register page: <a href="register.php">Register </a>  where the user create the account
        and check for if the user is unique. <br />

        After that the user after create the account he is redirected to the <a href="login.php">login</a> page. Where he have 3 attempts
        otherwise he need to wait for 10 minutes.

    </p>

    <p>
        Second one is the logout of the manager.
    </p>

</main>

<?php
    require ("footer.inc");
?>

</body>
</html>