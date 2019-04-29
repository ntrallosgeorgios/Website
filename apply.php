<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="Assigment1 home page" />
    <meta name="keywords" content="Assigm, home, Database, Administrator" />
    <meta name="author" content="Georgios Ntrallos" />
    <link href="styles/style.css" rel="stylesheet" />


    <!-- Diffent size for mobile laptop tables....  -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Dowload the font -->
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet" />

    <script src="scripts/apply.js"></script>
    <title> IT Solutions </title>
</head>

<body>

    <?php
        require ("header.inc");
    ?>

    <main id="applPage">


        <section id="mainSect">

            <h1>Apply for a job</h1>


            <form id="formApply" method="post" action="processEOI.php" novalidate="novalidate">

                <div id="leftAr">
                    <p>
                      <!--  <span>Job reference number</span> <br />
                        <span id="choose_job"></span> -->
                        <label for="jobReNum">Job</label> <br />
                        <input type="text" name="jobReNum" id="jobReNum" size="5" pattern="^[a-zA-Z0-9]{5}" placeholder="12345" required="required" />
                    </p>
                    <!--<input type="hidden" name="choosen" id="choosen" /> -->

                    <p>
                        <label for="FirName"> First Name </label> <br />
                        <input type="text" name="FirstName" id="FirName" pattern="^[a-zA-Z]{0,20}" placeholder="First Name" required="required" />
                    </p>

                    <p>
                        <label for="LasName"> Last Name </label> <br />
                        <input type="text" name="LastName" id="LasName" pattern="^[a-zA-Z]{0,20}" placeholder="Last Name" required="required" />
                    </p>

                    <p>
                        <label for="dateCe">Date</label> <br />
                        <input type="text" name="dateCe" id="dateCe" placeholder="dd/mm/yyyy" required="required" />

                    </p>

                    <fieldset id="genders">

                        <legend>Gender</legend>

                        <p>
                            <label for="male"> M </label>
                            <input type="radio" name="gen" id="male" value="M" required="required" />
                            <label for="female"> F </label>
                            <input type="radio" name="gen" id="female" value="F" required="required" />
                        </p>

                    </fieldset>

                </div>

                <div id="midArt">

                    <p>
                        <label for="StrAddr"> Street Address </label> <br />
                        <input type="text" name="StreetAddress" id="StrAddr" placeholder="Street Address" size="30" required="required" />
                    </p>


                    <p>
                        <label for="SubTown"> Suburb / Town </label> <br />
                        <input type="text" name="SubTown_Town" id="SubTown"  size="30" placeholder="Suburb / Town" required="required" />
                    </p>

                    <p>
                        <label for="state"> State </label>
                        <select name="state" id="state" required="required">
                             <option value="" selected="selected">Please Select</option>
                             <option value="vic"> VIC </option>
                             <option value="nsw"> NSW </option>
                             <option value="qld"> QLD </option>
                             <option value="nt"> NT </option>
                             <option value="wa"> WA </option>
                             <option value="sa"> SA </option>
                             <option value="tas"> TAS </option>
                             <option value="act"> ACT </option>
                        </select>
                    </p>

                    <p>
                        <label for="postCod"> Postcode </label> <br />
                        <input type="text" name="PostCode" id="postCod" pattern="\d{4}" size="4" placeholder="Numb" required="required" />
                    </p>

                    <p>
                        <label for="email"> Email </label> <br />
                        <input type="email" name="email" id="email" placeholder="name@domain.com" required="required" />
                    </p>
                </div>

                <div id="rightArt">
                    <p>
                        <label for="phone"> Phone Number </label> <br />
                        <input type="text" name="Phone_Number" id="phone" pattern="[0-9\s]{8,12}" placeholder="8 to 10 digits or spaces" required="required" />
                    </p>


                    <div id="sk">

                        <p> Skills </p>


                        <label for="isDBA"> DBA</label>
                        <input type="checkbox" id="isDBA" name="skills[]" value="dba" />

                        <label for="isSQL"> SQL </label>
                        <input type="checkbox" id="isSQL" name="skills[]" value="SQL" />

                        <label for="isOracle"> Oracle </label>
                        <input type="checkbox" id="isOracle" name="skills[]" value="Oracle" />

                        <label for="isLinux"> Linux </label>
                        <input type="checkbox" id="isLinux" name="skills[]" value="Linux" />

                        <label for="isNetwroking"> TCP/IP networking </label>
                        <input type="checkbox" id="isNetwroking" name="skills[]" value="Networking" />

                        <br />

                        <label for="isVPN"> VPN </label>
                        <input type="checkbox" id="isVPN" name="skills[]" value="VPN" />

                        <label for="isCisco"> Cisco </label>
                        <input type="checkbox" id="isCisco" name="skills[]" value="Cisco" />

                        <label for="othSkills"> Other Skills </label>
                        <input type="checkbox" id="othSkills" name="skills[]" value="othSkills" />

                    </div>

                    <p>
                        <label for="isOthSki"> Other Skills </label> <br />
                        <textarea id="isOthSki" name="OtherSkills" rows="7" cols="50" placeholder="Write other skills that you have..."></textarea>
                    </p>

                </div>

                <input class="button" type="submit" value="Apply" />
                <input class="button" type="reset" value="Reset Form" />

            </form>

        </section>

        <p id="errMess"> </p>

    </main>

    <?php
        require ("footer.inc");
    ?>

</body>

</html>