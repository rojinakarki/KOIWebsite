<div class ="navbar" >
    <!-- Site Logo Within the navbar -->
    <a id ="logo" href="index.html"><img class="site-logo" src="../resources/site-logo.png" alt="logo"></a>
    <a href="../static-pages/about-us.php">About Us </a>
    <!-- Dropdown menu for courses-->
    <div class="dropdown">
        <button class="dropbtn">Courses </button>
        <div class="dropdown-content">
            <a href="../static-pages/course_summary.php">Courses Summary</a>
            <a href="#">Undergraduate Courses</a>
            <a href="#">Postgraduate Courses</a>
        </div>
    </div>
    <?php if(isset($_SESSION['user_id'])){ ?>
        <a class="nav-link" href="../static-pages/index.php">Logout</a>
        <?php session_destroy();?>
    <?php }?>
</div>
