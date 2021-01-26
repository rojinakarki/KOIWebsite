<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>FAQ</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<!--NAVBAR-->
<?php include "../include/header.php";?>
<!--Page Header-->
    <div class="title">
        <h2><strong>FAQ – Academic Area</strong></h2>
        <h3>Academic Area Enquiries and Frequently Asked Questions</h3>
    </div>
    <div class="content-container">
        <h3><strong>What do I do if I ...</strong></h3><br>
        <div class="faq-container">
            <button type="button" class="collapsible"> 1. Miss a class because I was sick? </button>
            <div class="content">
                <p> Please provide a medical certificate to the Academic Manager via KOI Reception. Remember the medical
                    certificate must be specific and detailed as to what is wrong with you – terms
                    such as “medical condition” or “unwell” are not acceptable. </p>
            </div>
            <button type="button" class="collapsible"> 2. Submit an assignment late because I was sick? </button>
            <div class="content">
                <p> Complete and submit the “Application for Assignment Extension or Deferred Exam – Medical Reasons”
                    form available at KOI Reception and also on the KOI website – www.koi.edu.au (under the Policies
                    and Forms tab) AS SOON AS POSSIBLE BUT NO LATER THAN 3 WORKING DAYS after the assignment due date.
                    You need to attach a medical certificate and your doctor will need to stamp and sign the form. Remember
                    the medical certificate must be specific and detailed as to what is wrong with you – terms such as
                    “medical condition” or “unwell” are not acceptable. You will be advised if an assignment extension
                    has been granted, and the new due date for the assignment. Please be aware that there is no guarantee
                    an extension will be granted. You should anticipate submitting the assignment as soon as possible after
                    the original due date. Late penalties will be applied to assignments submitted after the extension date if granted. </p>
            </div>
            <button type="button" class="collapsible"> 3. Submit an assignment late for some other, unavoidable reason? </button>
            <div class="content">
                <p> Complete and submit the “Application for Assignment Extension or Deferred Exam – Non-Medical
                    Reasons” form available at KOI Reception and also on the KOI website – www.koi.edu.au (
                    under the Policies and Forms tab) AS SOON AS POSSIBLE BUT NO LATER THAN 3 WORKING DAYS after the
                    assignment due date. You need to attach supporting evidence of the circumstances preventing you from
                    submitting the assignment (the form illustrates the types of circumstances and supporting evidence required).
                    You will be advised if an assignment extension has been granted, and the new due date for the assignment. Please
                    remember there is no guarantee an extension will be granted, or the length of time given if an extension is granted.
                    You should anticipate submitting the assignment as soon as possible after the original due date. Late penalties will be
                    applied to assignments submitted after the extension date if granted. </p>
            </div>
            <button type="button" class="collapsible"> 4. Miss an exam because I was sick?</button>
            <div class="content">
                <p> Complete and submit the “Application for Assignment Extension or Deferred Exam
                    – Medical Reasons” form available at KOI Reception and also on the KOI website –
                    www.koi.edu.au (under the Policies and Forms tab) AS SOON AS POSSIBLE BUT NO LATER THAN
                    3 WORKING DAYS after the exam date. You will need to attach a medical certificate, and
                    your doctor will need to stamp and sign the form. Remember the medical certificate must be
                    specific and detailed as to what is wrong with you – terms such as “medical condition” or
                    “unwell” are not acceptable. You will be advised if a deferred exam has been granted, and the
                    date of the deferred exam. There will be only one date for deferred exams and failure to sit
                    the exam on the deferred date will mean you fail the subject.
                    Please be aware that there is no guarantee a deferred exam will be granted.  </p>
            </div>
            <button type="button" class="collapsible"> 5. Miss an exam for some other, unavoidable reason? </button>
            <div class="content">
                <p>Complete and submit the “Application for Assignment Extension or Deferred Exam –
                    Non-Medical Reasons” form available at KOI Reception and also on the KOI website –
                    www.koi.edu.au (under the Policies and Forms tab) AS SOON AS POSSIBLE BUT NO LATER
                    THAN 3 WORKING DAYS after the exam date. You need to attach supporting evidence of
                    the circumstances preventing you from submitting the assignment (the form illustrates
                    the types of circumstances and supporting evidence required). You will be advised if a
                    deferred exam has been granted, and the date of the deferred exam. There will be only
                    one date for deferred exams and failure to sit the exam on the deferred date will mean you fail the subject.
                    Please be aware that there is no guarantee a deferred exam will be granted.  </p>
            </div>
            <button type="button" class="collapsible"> 6. Need to contact a lecturer?</button>
            <div class="content">
                <p> You will find the lecturer’s email address on the front page of each Subject Outline.
                    You can also contact your lecturers and tutors
                    via the E-Learning portal. If you cannot find the email address,
                    please contact Reception or the Student Services Officer. </p>
            </div>
            <button type="button" class="collapsible"> 7. Want to find out my exam timetable?  </button>
            <div class="content">
                <p>The final exam timetable is published <strong>a month prior to the exam commencement date
                    (end of WEEK 9 of the Trimester) </strong> and placed on all notice boards and information screens throughout KOI.
                    It is also uploaded on the KOI website and E-Learning portal.
                    <br>
                    Please note that it is the responsibility of each student to check the timetable.
                    Notification of the release date will be emailed to all students via their KOI email addresses.  </p>
            </div>
            <button type="button" class="collapsible"> 8. Want to know my results for a subject? </button>
            <div class="content">
                <p> If you are looking for trimester grades for assignments / mid trimester exam / tutorial participation,
                    please contact your tutor. These Marks will also be available via Moodle E-Learning portal during each trimester.
                    Your final (letter) grades will be available on the Student Portal. They can be located under CURRENT STUDENT menu
                    on KOI’s website </p>
            </div>

        </div>
    </div>


<!-- Footer -->
<?php include "../include/footer.php";?>
<script >
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