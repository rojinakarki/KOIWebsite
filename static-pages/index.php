<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!-- NAVBAR -->
<?php include "../include/header.php";?>

<!-- Slideshow -->
<div class="slideshow-container">
    <div class="mySlides fade">
        <img class="slider-img" src="../resources/image1.jpg" >
    </div>
    <div class="mySlides fade">
        <img class="slider-img" src="../resources/image2.jpg" >
    </div>
    <div class="mySlides fade">
        <img class="slider-img" src="../resources/image3.jpg" >
    </div>
    <div class="mySlides fade">
        <img class="slider-img" src="../resources/image4.jpg" >
    </div>
    <div class="mySlides fade">
        <img class="slider-img" src="../resources/image5.jpg" >
    </div>
    <div class="mySlides fade">
        <img class="slider-img" src="../resources/image6.jpg" >
    </div>
</div>
<br>
<!-- circles for slideshow -->
<div style="text-align:center">
    <span class="dot" onclick="currentSlide(1)"></span>
    <span class="dot" onclick="currentSlide(2)"></span>
    <span class="dot" onclick="currentSlide(3)"></span>
    <span class="dot" onclick="currentSlide(4)"></span>
    <span class="dot" onclick="currentSlide(5)"></span>
    <span class="dot" onclick="currentSlide(6)"></span>
</div>
<div class="content-container">
    <p>
        King’s Own Institute is a tertiary level institution offering high quality accredited degree courses.
    </p>
    <p>
        King’s Own Institute aims to be recognised as a leading education provider famous for nurturing our students
        and preparing them for successful careers. We believe the higher education experience is as crucial as the qualification itself.
        Here at King’s Own Institute, we want the career shaping experience to be fruitful, enjoyable and memorable.
    </p>
    <!--        Listing Images and Link to Pages-->
    <table>
        <tr>
            <td><img class="listing-img" src="../resources/courses.jpg" alt="KOICourse"></td>
            <td><img class="listing-img" src="../resources/currentStd.jpg" alt="CurrentStudents"></td>
            <td><img class="listing-img" src="../resources/futureStd.jpg" alt="FutureStudents"></td>
            <td><img class="listing-img" src="../resources/agents.jpg" alt="KOIContact"></td>
        </tr>
        <tr>
            <td><a href ="course.php"> <u> Courses </u></a><br></td>
            <td><a href ="#"> Current Students </a><br></td>
            <td><a href ="#"> Future Students </a><br></td>
            <td><a href ="contact.php"> <u> Contact Us</u></a><br></td>
        </tr>
    </table>
    <!--        Why Koi And latest blogs-->
    <table>
        <tr>
            <td class="why-koi">
                <h2>Why Choose KOI?</h2><hr>
                <p> The team at KOI are proven, widely experienced practitioners with a proud and
                    established record of achievement in education and business.
                    As a student at KOI, you will develop a thorough understanding
                    of the practical and theoretical skills fundamental to launching your career.</p>
                <ul>
                    <li>  Industry relevant business knowledge and acumen applied in all courses.</li>
                    <li>  Excellent student support and learning facilities, centrally located.</li>
                    <li>  Choose from a variety of study programs suited to your career interests.</li>
                    <li>  Outstanding teachers, renowned for achievements in business, education and research.</li>
                </ul>
            </td>
            <td class="latest-blog">
                <h2 id="latest-blog-heading">Latest Blog Posts</h2><hr>
                <strong><em>The Australian Institute of Business and Management Pty Ltd trading as King’s Own Institute (KOI), is listed on China’s JSJ website.</em></strong>
                <p>The Australian Institute of Business and Management Pty Ltd trading as King’s Own Institute (KOI), is listed on... <a href="#">Read More → </a></p>

                <strong><em>Australian Government’s Graduate Outcome Survey</em></strong>
                <p>KOI is participating in the Australian Government’s Graduate Outcomes Survey (GOS) administered by the Social Research Centre.
                    KOI Graduates who completed their studies in... <a href="#"> Read More → </a></p>
            </td>
        </tr>
    </table>
    <div class="course-info">
        <h3>Courses offered at KOI</h3> <hr>
        <button type="button" class="collapsible">ICT102 Introduction to Programming </button>
        <div class="content">
            <p>
                <strong> B Info Tech		Core </strong><br>
                This subject provides an introduction to programming and the fundamental principles of programming
                using objects. It utilises the Java programming language and covers programming concepts such
                as data types, control structures, strings, files, input/output and an introduction to classes,
                objects and programming methods. At the end of this subject students will have
                an understanding of fundamental computational concepts along with a range of problem solving
                techniques using the Java programming language. </p>
        </div>
        <button type="button" class="collapsible">ICT104 Program Design and Development </button>
        <div class="content">
            <p>
                <strong> B Info Tech		Core </strong><br>
                Programming is a vital skill that enables problem solving through the use of computers
                across a range of disciplines. This subject covers intermediate and advanced features
                of the Java programming language as a continuation of ICT102 Introduction to Programming.
                Topics covered include object-oriented programming concepts of inheritance, interfaces,
                abstract classes, abstract methods, and polymorphism. Students will learn about implementing
                Java’s graphical FX components and Java Applets, and acquire practical knowledge of developing Java programs.
        </div>
        <button type="button" class="collapsible">MGT100 Introduction to Management </button>
        <div class="content">
            <p>
                <strong>  B BUS (Acct)		Core
                    B BUS (MGT and FIN)		Core </strong><br>
                The subject describes the management of organisations, the way work and systems are organised
                and managed and the impact on individuals, stakeholders and societies. </p>
        </div>
        <button type="button" class="collapsible">MGT300 Logistics Management </button>
        <div class="content">
            <p>
                <strong>
                    B BUS (Acct)		Elective
                    B BUS (MGT and FIN)		Core </strong><br>
                This subject describes the role of global operations and logistics in manufacturing and service
                organisations to source, produce and distribute products and services.
                The unit covers tactical and strategic considerations and basic quantitative tools and techniques
                that support managerial decision-making.
            </p>
        </div>
        <hr>
        <h3 id="std-guide-direction"><em>For more Information, please go through the link.</em></h3>
        <button id="std-guide-btn"><a href="https://koi.edu.au/wp/wp-content/uploads/2020/09/2020-Brochure-low-as-of-05092020.pdf?x87409">
                Student Guide </a></button>

        <hr>

    </div>
</div>
<!-- Footer -->
<?php include "../include/footer.php";?>

<script src="../js/script.js"></script>
<script>
    var col = document.getElementsByClassName("collapsible");
    var i;
    for (i = 0; i < col.length; i++) {
        col[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>
</body>
</html>