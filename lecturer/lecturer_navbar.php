<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><img class="site-logo" src="../resources/site-logo.png" alt="logo"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="../lecturer/lecturer_course.php">Course |</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../lecturer/all_course_details.php">Course Details |</a>
            </li>

            <li class="nav-item topnav-right">
                <?php if(isset($_SESSION['user_id'])){ ?>
                    <a class="nav-link" href="../static-pages/index.php">Logout</a>
                    <?php session_destroy();?>
                <?php }?>
            </li>
        </ul>

    </div>
</nav>

