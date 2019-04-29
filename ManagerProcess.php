<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assigment3 php mysql manipulation" />
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
        function sanitInput($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars("$data");
            return $data;
        }

        require_once ('settings.php');

        $dbconn = @mysqli_connect($host,
            $user,
            $pwd,
            $sql_db
        )
        or die("<p> Error connection with the database </p>");

        $dbName = "EOI";

        if (isset($_POST["dbshow"])) {
            $dbshow = $_POST["dbshow"];

            if ($dbshow == 'y') {
                $querShDB = " select * from $dbName; ";

                $shResult = mysqli_query($dbconn,$querShDB);

                if ($shResult) {

                    echo "<p>List all EOI</p>";
                    echo "<table border=\"1\"> \n";

                    echo "<tr> \n"
                        ."<th scope=\"col\">EOInumber</th> \n"
                        ."<th scope=\"col\">jobid</th> \n"
                        ."<th scope=\"col\">firstName</th> \n"
                        ."<th scope=\"col\">lastName</th> \n"
                        ."<th scope=\"col\">address</th> \n"
                        ."<th scope=\"col\">email</th> \n"
                        ."<th scope=\"col\">phoneNumber</th> \n"
                        ."<th scope=\"col\">skills</th> \n"
                        ."<th scope=\"col\">otherSkills</th> \n"
                        ."<th scope=\"col\">status</th> \n"
                        ."</tr>";



                    while ( $rows = mysqli_fetch_assoc($shResult)) {
                        echo "<tr> \n";
                        echo "<td>", $rows["EOInumber"], "</td>";
                        echo "<td>", $rows["jobid"], "</td>";
                        echo "<td>", $rows["firstName"], "</td>";
                        echo "<td>", $rows["lastName"], "</td>";
                        echo "<td>", $rows["address"], "</td>";
                        echo "<td>", $rows["email"], "</td>";
                        echo "<td>", $rows["phoneNumber"], "</td>";
                        echo "<td>", $rows["skills"], "</td>";
                        echo "<td>", $rows["otherSkills"], "</td>";
                        echo "<td>", $rows["status"], "</td>";
                        echo "</tr> \n";
                    }

                    echo "</table> \n";
                    mysqli_free_result($shResult);

                } else {
                    echo "<p>No one have apply for the jobs!!</p>";
                }
            }

        } else {
            header ("location: manage.php");
        }

        if (isset($_POST["listposition"])) {

            $listposition = $_POST["listposition"];

            if (strlen($listposition) != 0) {

                $queryListPos = "select * from $dbName where jobid= '$listposition'; ";

                $resuListPos = mysqli_query($dbconn, $queryListPos);

                if ($resuListPos) {

                    echo "<p>List Positions</p>";
                    echo "<table border=\"1\"> \n";

                    echo "<tr> \n"
                        . "<th scope=\"col\">EOInumber</th> \n"
                        . "<th scope=\"col\">jobid</th> \n"
                        . "<th scope=\"col\">firstName</th> \n"
                        . "<th scope=\"col\">lastName</th> \n"
                        . "<th scope=\"col\">address</th> \n"
                        . "<th scope=\"col\">email</th> \n"
                        . "<th scope=\"col\">phoneNumber</th> \n"
                        . "<th scope=\"col\">skills</th> \n"
                        . "<th scope=\"col\">otherSkills</th> \n"
                        . "<th scope=\"col\">status</th> \n"
                        . "</tr>";


                    while ($rows = mysqli_fetch_assoc($resuListPos)) {
                        echo "<tr> \n";
                        echo "<td>", $rows["EOInumber"], "</td>";
                        echo "<td>", $rows["jobid"], "</td>";
                        echo "<td>", $rows["firstName"], "</td>";
                        echo "<td>", $rows["lastName"], "</td>";
                        echo "<td>", $rows["address"], "</td>";
                        echo "<td>", $rows["email"], "</td>";
                        echo "<td>", $rows["phoneNumber"], "</td>";
                        echo "<td>", $rows["skills"], "</td>";
                        echo "<td>", $rows["otherSkills"], "</td>";
                        echo "<td>", $rows["status"], "</td>";
                        echo "</tr> \n";
                    }
                    echo "</table> \n";
                    mysqli_free_result($resuListPos);
                }
            }

        }

        if (isset($_POST["FirstName"])) {
            $firstName = sanitInput($_POST["FirstName"]);
        }

        if (isset($_POST["LastName"])) {
            $lastName = sanitInput($_POST["LastName"]);
        }

        if (strlen($firstName) != 0 and strlen($lastName) != 0) {

            $queryFirLas = "select * from $dbName where firstName ='$firstName' and lastName = '$lastName';";

            $resFirLas = mysqli_query($dbconn, $queryFirLas);

            if ($resFirLas) {

                echo "<p>Search by First Name, Last Name or both</p>";
                echo "<table border=\"1\"> \n";

                echo "<tr> \n"
                    . "<th scope=\"col\">EOInumber</th> \n"
                    . "<th scope=\"col\">jobid</th> \n"
                    . "<th scope=\"col\">firstName</th> \n"
                    . "<th scope=\"col\">lastName</th> \n"
                    . "<th scope=\"col\">address</th> \n"
                    . "<th scope=\"col\">email</th> \n"
                    . "<th scope=\"col\">phoneNumber</th> \n"
                    . "<th scope=\"col\">skills</th> \n"
                    . "<th scope=\"col\">otherSkills</th> \n"
                    . "<th scope=\"col\">status</th> \n"
                    . "</tr>";


                while ($rows = mysqli_fetch_assoc($resFirLas)) {
                    echo "<tr> \n";
                    echo "<td>", $rows["EOInumber"], "</td>";
                    echo "<td>", $rows["jobid"], "</td>";
                    echo "<td>", $rows["firstName"], "</td>";
                    echo "<td>", $rows["lastName"], "</td>";
                    echo "<td>", $rows["address"], "</td>";
                    echo "<td>", $rows["email"], "</td>";
                    echo "<td>", $rows["phoneNumber"], "</td>";
                    echo "<td>", $rows["skills"], "</td>";
                    echo "<td>", $rows["otherSkills"], "</td>";
                    echo "<td>", $rows["status"], "</td>";
                    echo "</tr> \n";
                }
                echo "</table> \n";
                mysqli_free_result($resFirLas);
            } else {
                echo "<p> Your first name or your last name doesn't exist!!!</p>";
            }

        } else if (strlen($firstName) != 0 and strlen($lastName) == 0) {
            $queryFir = "select * from $dbName where firstName ='$firstName';";

            $resFir = mysqli_query($dbconn, $queryFir);

            if ($resFir) {

                echo "<p>Search by First Name, Last Name or both</p>";
                echo "<table border=\"1\"> \n";

                echo "<tr> \n"
                    . "<th scope=\"col\">EOInumber</th> \n"
                    . "<th scope=\"col\">jobid</th> \n"
                    . "<th scope=\"col\">firstName</th> \n"
                    . "<th scope=\"col\">lastName</th> \n"
                    . "<th scope=\"col\">address</th> \n"
                    . "<th scope=\"col\">email</th> \n"
                    . "<th scope=\"col\">phoneNumber</th> \n"
                    . "<th scope=\"col\">skills</th> \n"
                    . "<th scope=\"col\">otherSkills</th> \n"
                    . "<th scope=\"col\">status</th> \n"
                    . "</tr>";


                while ($rows = mysqli_fetch_assoc($resFir)) {
                    echo "<tr> \n";
                    echo "<td>", $rows["EOInumber"], "</td>";
                    echo "<td>", $rows["jobid"], "</td>";
                    echo "<td>", $rows["firstName"], "</td>";
                    echo "<td>", $rows["lastName"], "</td>";
                    echo "<td>", $rows["address"], "</td>";
                    echo "<td>", $rows["email"], "</td>";
                    echo "<td>", $rows["phoneNumber"], "</td>";
                    echo "<td>", $rows["skills"], "</td>";
                    echo "<td>", $rows["otherSkills"], "</td>";
                    echo "<td>", $rows["status"], "</td>";
                    echo "</tr> \n";
                }
                echo "</table> \n";
                mysqli_free_result($resFir);
            } else {
                echo "<p> Your first name doesn't exist!!!</p>";
            }

        } else if (strlen($firstName) == 0 and strlen($lastName) != 0) {
            $queryLas = "select * from $dbName where lastName = '$lastName';";

            $resLas = mysqli_query($dbconn, $queryLas);

            if ($resLas) {

                echo "<p>Search by First Name, Last Name or both</p>";
                echo "<table border=\"1\"> \n";

                echo "<tr> \n"
                    . "<th scope=\"col\">EOInumber</th> \n"
                    . "<th scope=\"col\">jobid</th> \n"
                    . "<th scope=\"col\">firstName</th> \n"
                    . "<th scope=\"col\">lastName</th> \n"
                    . "<th scope=\"col\">address</th> \n"
                    . "<th scope=\"col\">email</th> \n"
                    . "<th scope=\"col\">phoneNumber</th> \n"
                    . "<th scope=\"col\">skills</th> \n"
                    . "<th scope=\"col\">otherSkills</th> \n"
                    . "<th scope=\"col\">status</th> \n"
                    . "</tr>";


                while ($rows = mysqli_fetch_assoc($resLas)) {
                    echo "<tr> \n";
                    echo "<td>", $rows["EOInumber"], "</td>";
                    echo "<td>", $rows["jobid"], "</td>";
                    echo "<td>", $rows["firstName"], "</td>";
                    echo "<td>", $rows["lastName"], "</td>";
                    echo "<td>", $rows["address"], "</td>";
                    echo "<td>", $rows["email"], "</td>";
                    echo "<td>", $rows["phoneNumber"], "</td>";
                    echo "<td>", $rows["skills"], "</td>";
                    echo "<td>", $rows["otherSkills"], "</td>";
                    echo "<td>", $rows["status"], "</td>";
                    echo "</tr> \n";
                }
                echo "</table> \n";
                mysqli_free_result($resLas);
            } else {
                echo "<p> Your your last name doesn't exist!!!</p>";
            }
        }

        if (isset($_POST["deljobID"]))  {

            $deljobID = $_POST["deljobID"];

            if (strlen($deljobID) != 0) {

                $queryDelet = "delete from $dbName where jobid = '$deljobID'; ";

                $resDelet = mysqli_query($dbconn, $queryDelet);

                if ($resDelet) {
                    echo "<p> The rows successful deleted </p>";
                } else {
                    echo "<p>The rows didn't deleted or there are not exist!!!</p>";
                }

            }

        }


        if (isset($_POST["changeStatus"]) and isset($_POST["EOIid"])) {
            $EOIid = sanitInput($_POST["EOIid"]);
            $changeStatus = $_POST["changeStatus"];

            if (strlen($EOIid) != 0 and strlen($changeStatus ) != 0) {

                $querUpd = "update $dbName set status = '$changeStatus' where  EOInumber = $EOIid ;";

                $resUpd = mysqli_query($dbconn, $querUpd);

                if ($resUpd) {
                    echo "<p>The $EOIid is successful updateted to $changeStatus </p>";
                } else {
                    echo "<p> It can be updated</p>";
                }

            } else {
                echo "<p> You must choose an EOIid to update the status value!!!</p>";
            }
        }

        mysqli_close($dbconn);


    ?>


</main>

<?php
    require ("footer.inc");
?>

</body>

</html>