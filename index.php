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

    <main id="homepage">

        <article>

            <h1 id="hhom"> IT solutions </h1>

            <p id="phom">

            </p>

        </article>

        <figure id="slidShow">


            <!--http://entertainmentdesigner.com/wp-content/uploads/2012/10/google-server-room6.jpg -->
            <img class="ItSlideShow fSlid" src="styles/images/google-server-room6.jpeg" alt="google-server" />



            <!--https://twistedsifter.files.wordpress.com/2012/10/dalles-oregon-data-center-server-room.jpg -->
            <img class="ItSlideShow fSlid" src="styles/images/dalles-oregon-data-center-server-room.jpeg" alt="Data center" />


            <!-- https://bits.blogs.nytimes.com/2013/06/18/i-b-m-inflates-its-cloud/ -->
            <img class="ItSlideShow fSlid" src="styles/images/CLOUD-tmagArticle.jpeg" alt="Cloud server" />

        </figure>

    </main>

    <?php
        require ("footer.inc");
    ?>

</body>

</html>