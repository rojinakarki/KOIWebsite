<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!--NAVBAR-->
<?php include "../include/header.php";?>
<!--Page Header-->
    <div class="title">
        <h2><strong>Gallery</strong></h2>
        <h3>Events held at KOI</h3>
    </div>
    <div class="content-container">
        <div class="gallery-container">
            <div class="vid-intro">
                <div class="video">
                    <p>
                        KOI aims to be a recognised leader as an education provider, famous for nurturing our students
                        into successful careers. KOI is a team of widely experienced practitioners with a proud and
                        established record of achievement in education and business. KOI is the place to be: location,
                        facilities, learning support and opportunities. KOI is the launch pad for your career and with
                        exciting diploma, bachelor, certificate and master courses in a variety of fields.
                    </p>
                    <p> Here at KOI, we want the career shaping experience to be fruitful, memorable and enjoyable.
                        We believe the experience of the higher education journey can be as important as the qualification itself.
                    </p>
                </div>
                <div class="video">
                    <video id="koi-vid" controls autoplay>
                        <source src="../resources/KOI_Vid.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
            <div class="gallery">
                <img src="../resources/event1.jpg" alt="Event 1" >
                <div class="desc">Career Orientation</div>
            </div>

        <div class="gallery">
            <img src="../resources/event2.jpg" alt="Event 2" >
            <div class="desc">Group Studies</div>
        </div>

        <div class="gallery">
            <img src="../resources/event3.jpg" alt="Event 3" >
            <div class="desc">Open House Session</div>
        </div>

        <div class="gallery">
            <img src="../resources/event4.jpg" alt="Event 4" >
            <div class="desc">KOI Internship Seminar</div>
        </div>

    </div>
    </div>
    <div class="clear"></div>

<!-- Footer -->
<?php include "../include/footer.php";?>
    <script src="../js/script.js"></script>
</body>
</html>