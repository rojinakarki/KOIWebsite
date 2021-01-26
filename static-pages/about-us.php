<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<!--NAVBAR-->
<?php include "../include/header.php";?>
<!--SLIDESHOW-->
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img class="slider-img" src="../resources/koi-img1.jpg" >
        </div>
        <div class="mySlides fade">
            <img class="slider-img" src="../resources/koi-img2.png" >
        </div>
    </div>
    <br>
    <!-- circles for slideshow -->
    <div style="text-align:center">
        <span class="dot" onclick="currentSlide(1)"></span>
        <span class="dot" onclick="currentSlide(2)"></span>
    </div>
    <div class="content-container">
        <div class="about-us-container">
        <p>
            King’s Own Institute (KOI) is a leading private institution of higher education located in central Sydney,
            Australia and offering high quality accredited diploma, undergraduate and postgraduate courses in Accounting,
            Business, Management, Information Technology (IT) and postgraduate courses in TESOL (Teaching English to Speakers of Other Languages).
        </p>
        <p>
            Named after a regiment of the British army with which the CEO and Dean was associated as an exchange officer, King’s Own Institute adopts
            a similar spirit and values with traditions and an established reputation for its recognised development of successful leaders.
        </p>
        <p>
            Our initials KOI have a second meaning, as the word “koi” in some Asian languages is a wild carp. The koi is energetic and can swim upstream
            against the current. According to legend if a koi succeeded in climbing the falls at a point called Dragon Gate on the Yellow River it would
            be transformed into a dragon. This demonstrates perseverance in adversity and strength of purpose. Because of its strength and determination to
            overcome obstacles, the koi represents courage and the ability to attain high goals.
        </p>
        <p>
            Similarly, King’s Own Institute (KOI) aims to be a recognised leader as an education provider famous for nurturing our students into successful
            careers.The experience of the higher education journey can be as important as the qualification itself.
        </p>
        <p class="par5">
            Here at King’s Own Institute, we want the career-shaping experience to be fruitful, memorable and enjoyable.
        </p>
    </div>
    </div>

<!-- Footer -->
<?php include "../include/footer.php";?>
<script src="../js/script.js"></script>
</body>
</html>