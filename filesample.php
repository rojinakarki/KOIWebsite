<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php include "css/css.php";?>
</head>
<body>

<form class="contact" name="contact" action="#" method="post">
    <label>How did you hear about us:</label>
    <div id="styled-select">
        <select name="how" class="dropdown">
            <option value="Internet Search">Internet Search</option>
            <option value="Facebook" >Facebook</option>
            <option value="Twitter" >Twitter</option>
            <option value="LinkedIN" >LinkedIN</option>
            <option value="Referral" >Referral</option>
            <option value="Other">Other</option>
        </select>
    </div>
    <label class="optional referral" style="display:none;">Referred By:</label>
    <input class="optional referral" name="Referral2" style="display:none;" class="hidden-txt">
    <label class="optional other" style="display:none;">Please Specify:</label>
    <input class="optional other" name="Other2" value="" style="display:none;" class="hidden-txt">
    <label for="signup" class="text-checkbox">Add me to your email list</label>
    <input type="checkbox" name="signup" value="Yes" class="checkbox">
    <button class="send">Submit</button>
</form>

<?php include "js/js.php";?>
<script>
    $("select").change(function () {
        // hide all optional elements
        $(".optional").css("display","none");

        $("select option:selected").each(function () {
            if($(this).val() == "Referral") {
                $('.referral').css('display','block');
            } else if($(this).val() == "Other") {
                $('.other').css('display','block');
            }
        });
    });
</script>


</body>
</html>