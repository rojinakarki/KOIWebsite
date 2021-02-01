<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="lecturer_dashboard.php"><img class="site-logo" src="../resources/site-logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="../lecturer/course_details.php">Course Details |</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                --><?php
//                    $course_id = $_SESSION['course_id'];
//                echo "<a class=\"nav-link\" href=\"../lecturer/assignment.php?courseid=".$course_id."\">Assignment|</a>"; ?>
<!--            </li>-->

            <li class="nav-item topnav-right">
                <?php if(isset($_SESSION['user_id'])){ ?>
                    <a class="nav-link" href="../logout.php">Logout</a>
                <?php }?>
            </li>
        </ul>

    </div>
</nav>

