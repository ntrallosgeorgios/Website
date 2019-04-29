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

    <main id="jobs">

        <section class="sections">
            <div id="arcJob1">

                <h1 class="JobHead1"> Oracle Database Administrator </h1>

                <h2>Job ID: AB1234 </h2>

                <p class="jobPara">
                    One of Australia's most highly reputable Federal Government Departments is looking to engage in an experienced Oracle Database Administrator to provide general DBA support for the departments Oracle environment. The successful candidate will be offered
                    an initial 6 month contract with the view to extend further at a fantastic hourly rate.
                </p>

                <h2 class="JobHead2"> The successful Oracle Database Administrator will be responsible for, but not limited to; </h2>

                <ol class="lists">
                    <li> Assisting with project and development work </li>
                    <li> Providing strong DBA skills and good Linux admin and PL/SQL programming </li>
                    <li> Providing general DBA support for the departments Oracle environment </li>
                </ol>

                <h2 class="JobHead2"> The successful Oracle Database Administrator must have experience in the following; </h2>

                <ul class="lists">
                    <li> Experienced Oracle DBA (non RAC) </li>
                    <li> Linux admin experience </li>
                    <li> General TCP/IP networking and ICT security knowledge </li>
                </ul>

                <a id="aplBut1" name="jobApply" href="apply.php">Apply</a>

            </div>

            <aside class="asJob">
                <p> This is a rare opportunity for a highly skilled and experienced Oracle Database Administrator, The successful applicant will be offered a rewarding hourly rate for a 6 month contract with the view to further extend. If you have the required
                    skills, DON'T DELAY, APPLY NOW. Salary range: 80.000-90.000 </p>
                <a href="https://www.seek.com.au/job/34192654"> Seek advertisement of the Job </a>
            </aside>

            <div id="arcJob2">

                <h1 class="JobHead1">IT Security Systems Analyst</h1>

                <h2>Job ID: BA3456</h2>

                <p class="jobPara">
                    Are you a talented and skilled professional looking for your next challenge? <br /> We are currently looking for an experienced IT Security Analyst / Engineer to work with Data#3 to support our client. This resource will be engaged
                    on a 5-month contract with scope for extension.
                </p>

                <h2 class=" JobHead2"> To support this initiative, the resource will undertake the implementation and support of: </h2>

                <ol class="lists">
                    <li> Log collection and analysis solution </li>
                    <li> File Integrity &#38; Monitoring solution </li>
                    <li> IT services Change Management process </li>
                    <li> Intrusion Prevention and Detection solution </li>
                </ol>

                <h2 class="JobHead2"> The experience and qualifications required for this role are: </h2>

                <ul class="lists">
                    <li> System administration experience in a multi-site Windows environment including Active Directory and Group Policy; </li>
                    <li> Information security solutions (Anti-virus / Anti-malware / IPS / Firewall) </li>
                    <li> Technical knowledge in LAN &#38; WAN technologies: including VLAN, IP, MPLS etc.; </li>
                    <li> Experience in Network, VPN, Cisco Firewall, Cisco Switch and Router Administration would be advantageous; </li>
                    <li> Good problem resolution, analytical and decision making skills. </li>
                </ul>

                <a id="aplBut2" name="jobApply" href="apply.php">Apply</a>

            </div>

            <aside class="asJob">
                <p> Send in your application if you are a strong match to the requirements. Please note that only candidates with valid work rights and who match the selection criteria will be shortlisted and contacted. <br /> Salary range: 85.000-110.000
                </p>
                <a href="https://www.seek.com.au/job/34100172"> Seek advertisement of the Job </a>
            </aside>


        </section>

    </main>

    <?php
        require ("footer.inc");
    ?>

</body>

</html>