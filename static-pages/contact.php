<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/style.css">
<body>
<!-- NAVBAR -->
<?php include "../include/header.php";?>
</div>
<!-- Page Header-->
    <div class="title">
        <h2><strong>Contact</strong></h2>
        <h3>Get in touch with KOI</h3>
    </div>
    <div class="content-container">
            <form>
                <legend>Enquiry Form </legend>

                <!-- NAME -->
                <label for="contact-name" class="form-label">Name*</label><br>
                <input type="text" class="contact-form" id="contact-name" name="name" placeholder="Enter your name.." onkeyup='validateName()'>
                <span class='error-message' id='name-error'></span> <br>

                <!-- EMAIL ADDRESS -->
                <label for="contact-email" class="form-label" >Email address*</label><br>
                <input type="email" class="contact-form" id="contact-email" name="email" placeholder="Enter Email" onkeyup='validateEmail()'>
                <span class='error-message' id='email-error'></span><br>

                <!-- SUBJECT  -->
                <label for="contact-subject" class="form-label" >Subject*</label><br>
                <input type="text" class="contact-form" id="contact-subject" name="subject" placeholder="Enter Subject" onkeyup='validateSubject()'>
                <span class='error-message' id='subject-error'></span><br>

                <!-- MESSAGE -->
                <label for='contact-message' class="form-label" >Your Message*</label><br>
                <textarea class="contact-form" rows="5" id='contact-message'  name='message'  placeholder="Enter a brief message" onkeyup='validateMessage()'></textarea>
                <span class='error-message' id='message-error'></span><br>

                <!-- Submit Button -->
                <button onclick='return validateForm()' class="btn btn-default">Submit</button>
                <span class='error-message' id='submit-error'></span>
            </form>
    </div>
<!-- Footer -->
<?php include "../include/footer.php";?>
<script src="../js/script.js"></script>
</body>
</html>