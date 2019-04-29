<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assigment3 validate php and input to mysql" />
    <meta name="keywords" content="Assigm, php validation" />
    <meta name="author" content="Georgios Ntrallos" />
    <link href="styles/style.css" rel="stylesheet" />


    <title> Apply validation </title>
</head>

<body>

<?php
    require ("header.inc");
?>
<main id="homepage">

    <?php

        // check if someone is login with session and then load the html for that page
        if (isset($_SESSION["username"])) {

            $username = $_SESSION["username"];
            echo "<h1>Hello  $username</h1>";

            ?>

            <p>
                <a href="logout.php">Log out</a>
            </p>

            <h2>Managers Webpage</h2>

            <form id="ManagerSearch" method="post" action="ManagerProcess.php" novalidate="novalidate">


                <h3>List all EOI</h3>
                <p>
                    <label for="yes"> Y </label>
                    <input type="radio" name="dbshow" id="yes" value="y"/>
                    <label for="no"> N </label>
                    <input type="radio" name="dbshow" id="no" value="n"/>
                </p>


                <br/>
                <p>
                    <label for="listposition"> List Positions </label>
                    <select name="listposition" id="listposition">
                        <option value="" selected="selected">Please Select</option>
                        <option value="AB1234"> AB1234</option>
                        <option value="BA3456"> BA3456</option>
                    </select>
                </p>

                <br/>

                <h3> Search by First Name, Last Name or both</h3>
                <p>
                    <label for="FirName"> First Name </label> <br/>
                    <input type="text" name="FirstName" id="FirName" placeholder="First Name"/>
                </p>

                <p>
                    <label for="LasName"> Last Name </label> <br/>
                    <input type="text" name="LastName" id="LasName" placeholder="Last Name"/>
                </p>

                <br/>

                <h3>Delete Entries by specific job id</h3>

                <p>

                    <label for="deljobID"> List Positions </label>
                    <select name="deljobID" id="deljobID">
                        <option value="" selected="selected">Please Select</option>
                        <option value="AB1234"> AB1234</option>
                        <option value="BA3456"> BA3456</option>
                    </select>

                </p>

                <br/>

                <h3>Update Entries</h3>
                <p>

                    <label for="EOIid">Enter the EOIid</label>
                    <input type="text" id="EOIid" name="EOIid" placeholder="EOIid"/>

                </p>

                <p>

                    <label for="changeStatus"> Update Position with </label>
                    <select name="changeStatus" id="changeStatus">
                        <option value="" selected="selected">Please Select</option>
                        <option value="Current"> Current</option>
                        <option value="Final"> Final</option>
                    </select>

                </p>

                <br/>
                <input type="submit" value="Apply"/>
                <input type="reset" value="Reset"/>

            </form>

            <?php
        } else { // if someone is not login then redirect the user to the login.php
            header("location: login.php");
        }
    ?>


</main>

<?php
    require ("footer.inc");
?>

</body>

</html>