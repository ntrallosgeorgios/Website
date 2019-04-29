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
    <script src="scripts/enhancements.js"></script>
    <title> IT Solutions </title>
</head>

<body>

    <?php
        require ("header.inc");
    ?>

    <main id="aboutPage">

        <dl>
            <dt>Name:</dt>
            <dd>Georgios Ntrallos</dd>

            <dt>Student number:</dt>
            <dd>101458545</dd>

            <dt>Tutor:</dt>
            <dd>Muhammad Hussain</dd>

            <dt>Course:</dt>
            <dd>Masters of IT</dd>
        </dl>

        <figure>
            <img id="figImg" src="styles/images/me.png" alt="Georgios Ntrallos" />
        </figure>


        <table id="tableAb">
            <caption>Time Table</caption>
            <thead>
                <tr>
                    <th>Days</th>
                    <th>Subject</th>
                    <th>Type</th>
                    <th>Hours</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Monday</th>
                    <td>User-Centred Design</td>
                    <td>Lecture</td>
                    <td>8:30am - 10:30am </td>

                </tr>

                <tr>
                    <th>Monday</th>
                    <td>User-Centred Design</td>
                    <td>Tutorial</td>
                    <td>12:30pm - 2:30pm </td>
                </tr>

                <tr>
                    <th>Tuesday</th>
                    <td>Database, Analysis and Design</td>
                    <td>Tutorial</td>
                    <td>8:30am - 10:30am </td>
                </tr>

                <tr>
                    <th>Wednesday</th>
                    <td>Database, Analysis and Design</td>
                    <td>Lecture</td>
                    <td>8:30am - 10:30am </td>
                </tr>

                <tr>
                    <th>Wednesday</th>
                    <td>Creating Web Applications</td>
                    <td>Lecture</td>
                    <td>5:30pm - 7:30pm </td>
                </tr>

                <tr>
                    <th>Wednesday</th>
                    <td>Creating Web Applications</td>
                    <td>Tutorial</td>
                    <td>7:30pm - 9:30pm</td>
                </tr>

                <tr>
                    <th>Thursday</th>
                    <td>Introduction to Business Information Systems</td>
                    <td>Lecture</td>
                    <td>12:30pm - 2:30pm</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th>Thursday</th>
                    <td>Introduction to Business Information Systems</td>
                    <td>Tutorial</td>
                    <td>4:30pm - 6:30pm</td>
                </tr>
            </tfoot>

        </table>

        <p>
            Email: <a href="mailto:101458545@student.swin.edu.au"> Georgios Ntrallos</a>
        </p>



    </main>

    <?php
        require ("footer.inc");
    ?>

</body>

</html>