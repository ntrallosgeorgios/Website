<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assigment3 manager process" />
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

function checkState($state, $postCod) {

    $erMes = "";
    $chckTrue = true;
    $postcode = str_split($postCod, 1);

    switch ($state) {
        case "vic":
            if ($postcode[0] == '3' or $postcode == '8') {
                $chckTrue = true;
            } else {
                $chckTrue = false;
                $erMes .= "<p>The post code of VIC must start from 3 or 8</p>";
            }
            break;
        case "nsw":
            if ($postcode[0] == '1' or $postcode == '2') {
                $chckTrue = true;
            } else {
                $chckTrue = false;
                $erMes .= "<p>The post code of NSW must start from 1 or 2</p>";
            }
            break;
        case "qld":
            if ($postcode[0] == '4' or $postcode == '9') {
                $chckTrue = true;
            } else {
                $chckTrue = false;
                $erMes .= "<p>The post code of QLD must start from 4 or 9</p>";
            }
            break;
        case "act":
        case "nt":
            if ($postcode[0] == '0') {
                $chckTrue = true;
            } else {
                $chckTrue = false;
                $erMes .= "<p>The post code of NT  or ACT must start from 0</p>";
            }
            break;
        case "wa":
            if ($postcode[0] == '6') {
                $chckTrue = true;
            } else {
                $chckTrue = false;
                $erMes .= "<p>The post code of WA must start from 6</p>";
            }
            break;
        case "sa":
            if ($postcode[0] == '5') {
                $chckTrue = true;
            } else {
                $chckTrue = false;
                $erMes .= "<p>The post code of SA must start from 5</p>";
            }
            break;
        case "tas":
            if ($postcode[0] == '7') {
                $chckTrue = true;
            } else {
                $chckTrue = false;
                $erMes .= "<p>The post code of Tas must start from 7</p>";
            }
            break;

    }

    $checkedData = array($chckTrue, $erMes);

    return $checkedData;

}

function validInputDate($dateCe) {

    $mesErr = "";
    $dateval = true;

    $spl_year = explode('/',$dateCe);
    $fifYearOld = date('Y') - 15;
    $eightyYearsOld = date('Y') - 80;

    if ( $spl_year[0] < 1 ||  $spl_year[0] > 31) {
        $mesErr .= "<p> The input date must be between 1 and 31</p>";
        $dateval = false;
    }

    if ( $spl_year[1] <1 ||  $spl_year[1] > 12) {
        $mesErr .= "<p> The input year must be between 1 and 12 </p>";
        $dateval = false;
    }

    if ( $spl_year[2] > $fifYearOld ||  $spl_year[2] < $eightyYearsOld) {
        $mesErr .= "<p> You can't apply if you are under 15 and over 80 old !</p>";
        $dateval = false;
    }

    if ( $spl_year[2] > date('Y')) {
        $mesErr .= "<p> The input year must be between 1 and 12 </p>";
        $dateval = false;
    }

    $retValue = array($dateval,$mesErr);

    return $retValue;

}

?>

<h1>Valid data</h1>

<?php

    require ("settings.php");

    $errorMes = "";

    if (isset($_POST["jobReNum"])) {
        $jobReNum = sanitInput($_POST["jobReNum"]);

    } else {
        header ("location: apply.php");
    }


    if(strlen($jobReNum) == 0) {
        $errorMes .= "<p>You must choose a job to apply</p>";
    } else if (!preg_match("/^[a-zA-Z\d]{6}+$/", $jobReNum)) {
        $errorMes .= "<p>Your input for the job must be alphanumeric and must be 6 alphanumerical!!</p>";
    }

    if (isset($_POST["FirstName"])) {
        $FirName = sanitInput($_POST["FirstName"]);
    }

    if (strlen($FirName) == 0) {
        $errorMes .= "<p>You must Enter your first name</p>";
    } else if (!preg_match("/^[a-zA-Z]{0,25}+$/", $FirName)) {
        $errorMes .= "<p>Your first name must have  alpha characters and be less 25  alpha characters </p>";
    }

    if (isset($_POST["LastName"])) {
        $LastName = sanitInput($_POST["LastName"]);
    }

    if (strlen($LastName) == 0) {
        $errorMes .= "<p>You must Enter your last name</p>";
    } else if (!preg_match("/^[a-zA-Z]{0,25}+$/", $LastName)) {
        $errorMes .= "<p>Your last name must have  alpha characters and be less 25  alpha characters </p>";
    }

    if (isset($_POST["StreetAddress"])) {
        $StreetAddress = sanitInput($_POST["StreetAddress"]);
    }

    if (strlen($StreetAddress) == 0) {
        $errorMes .= "<p>You must your Address</p>";
    } else if (!preg_match("/^[a-zA-Z\d- ]{1,40}+$/", $StreetAddress)) {
        $errorMes .= "<p>Your street address must have at least 40 characters </p>";
    }

    if (isset($_POST["SubTown_Town"])) {
        $SubTown = sanitInput($_POST["SubTown_Town"]);
    }

    if (strlen($SubTown) == 0) {
        $errorMes .= "<p>You must your Town suburb</p>";
    } else if (!preg_match("/^[a-zA-Z\d- ]{1,40}+$/", $SubTown)) {
        $errorMes .= "<p>Your Town suburb must have at least 40 characters </p>";
    }

    if (isset($_POST["email"])) {
        $email = sanitInput($_POST["email"]);
    }

    if (strlen($email) == 0) {
        $errorMes .= "<p>You must enter an email address</p>";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMes .= "<p> You must put a valid email </p>";
    }

    if (isset($_POST["Phone_Number"])) {
        $phone = sanitInput($_POST["Phone_Number"]);
    }

    if (strlen($phone) == 0) {
        $errorMes .= "<p>You must enter your phone number</p>";
    } else if (!preg_match("/^[\d ]{8,12}+$/", $phone)) {
        $errorMes .= "<p> You must a valid phone with 8 to 12 or spaces </p>";
    }

    if (isset($_POST["gen"])) {
        $gen = $_POST["gen"];
    } else {
        $errorMes .= "<p> You must choose a gender </p>";
    }

    if (isset($_POST["state"])) {
        $state = $_POST["state"];
    }

    if (strlen($state) == 0) {
        $errorMes .= "<p> You must choose a state </p>";
    }

    if (isset($_POST["PostCode"])) {
        $postCod = sanitInput($_POST["PostCode"]);
    }

    $checkSt = checkState($state, $postCod);

    if (strlen($postCod) == 0) {
        $errorMes .= "<p> You must enter a postcode </p>";
    } else if (!preg_match("/^[0-9]{4}+$/", $postCod)) {
        $errorMes .= "<p> You are must enter exactle 4 digits </p>";
    } else if ($checkSt[0] != true) {
        $errorMes .= "<p>$checkSt[1]</p>";
    }

    if (isset($_POST["dateCe"])) {
        $dateCe = sanitInput($_POST["dateCe"]);

        if (strlen($dateCe) == 0) {
            $errorMes .= "<p>You must enter a date of birth!</p>";
        }

        // check if there is any input in the date
        if (strlen($dateCe != 0)) {

            // if there is anu value then runs the validInputDate
            $valDate = validInputDate($dateCe);

            if (!preg_match("/^\d{1,2}\/\d{1,2}\/\d{4}$/", $dateCe)) {
                $errorMes .= "<p>Your date must have follow that forman dd/mm/yyyy</p>";
            } else if ($valDate[0] != true) {
                $errorMes .= "<p>$valDate[1]</p>";
            }
        }
    }

    if (isset($_POST["OtherSkills"])) {
        $OtherSkills = sanitInput($_POST["OtherSkills"]);
    }

    if (isset($_POST["skills"])) {
        $skillsArray = $_POST["skills"];

        $allSkills = ""; // value that will take the values that have checked

        // Put
        for ($i = 0; $i < sizeof($skillsArray); $i++) {
            $allSkills .="$skillsArray[$i], ";

            if ($skillsArray[$i] == "othSkills") {
                if (strlen($OtherSkills) == 0 ){
                    $errorMes .= "<p>You must have some input in the text area Other skills!</p>";
                }
            }

        }

        // substr remove the comma for the end of the string
        $skills = substr($allSkills, 0, -2);

    } else {
        $errorMes .= "<p>You must add some skills</p>";
    }


    if ($errorMes != ""){
        echo "<p>$errorMes</p>";
    } else {

        require_once ('settings.php');

        $dbconn = @mysqli_connect($host,
            $user,
            $pwd,
            $sql_db
        )
        or die("<p> Error connection with the database </p>");


        $sqlcreateEOI = "
          create table if not exists  EOI (
            EOInumber int NOT NULL AUTO_INCREMENT ,
            jobid varchar(6) NOT NULL,
            firstName varchar(25) NOT NULL,
            lastName varchar(25) NOT NULL,
            address varchar(120) NOT NULL,
            email varchar(40) NOT NULL,
            phoneNumber int(12) NOT NULL,
            skills varchar(150),
            otherSkills varchar(85),
            status varchar(10) NOT NULL,
            PRIMARY KEY(EOInumber)
         )
        ";

        $queryAdd = @mysqli_query($dbconn, $sqlcreateEOI);

        if ($queryAdd) {
            echo "<p> Table created </p>";

            $dbTaEOI = "EOI";
            $status = "new";
            $locationLive = "$StreetAddress $SubTown $state $postCod";

            $insertquery = "insert into $dbTaEOI (EOInumber ,jobid, firstName,lastName, address, email, phoneNumber, skills, otherSkills, status )
                            VALUES (NULL, '$jobReNum', '$FirName', '$LastName', '$locationLive',
                             '$email',  $phone,  '$skills', '$OtherSkills', '$status')";

            $insResult = mysqli_query($dbconn, $insertquery);

            if (!$insResult) {
                echo "<p>Something went wrong with the insert the values!</p>";
           } else {

                $selquery = "select * from $dbTaEOI where email = '$email';";

                $selresult = mysqli_query($dbconn, $selquery);

                if (!$selresult) {
                    echo "<p> The id does not exist!! </p>";
                } else {

                    $shoResult = mysqli_fetch_assoc($selresult);

                    if ( $row = $shoResult) {
                        echo "<p>Your identifier for the job is ", $row["EOInumber"], "</p>";
                    }
                    mysqli_free_result ($selresult);
                }
            }

            } else {
            echo "<p>Error creating of database </p>";
        }
        mysqli_close($dbconn);

    }

?>

</main>

<?php
    require ("footer.inc");
?>
</body>
</html>