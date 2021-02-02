<?php
include("../include/session_check.php");
require_once("../include/component.php");
include("../connectDB.php");

$quizQueRetrieved = $_GET["quizquestionid"];
$quizID = $_SESSION['quiz_id'];
$quiz_question = $quiz_option1=$quiz_option2=$quiz_option3=$quiz_option4=$quiz_answer='';
$errors = array('quiz_question'=>'',
    'quiz_option1'=>'',
    'quiz_option2'=>'',
    'quiz_option3'=>'',
    'quiz_option4'=>'',
    'quiz_selected_option'=>'',
    'quiz_answer'=>'');
$sql = "SELECT * FROM quiz_question as qq inner join quiz as q on qq.quiz_id = q.quiz_id WHERE qq.quiz_question_id = '$quizQueRetrieved'";
$result = mysqli_query($conn, $sql);
if(isset($_POST['update-quiz-que'])) {
    //    check Quiz Question
    if (empty($_POST['quiz_question'])) {
        $errors['quiz_question'] = 'Quiz Question is required <br/>';
    }
    if($_POST['quiz_type'] == 'qa') {
        //    check Quiz Answer
        if (empty($_POST['quiz_answer'])) {
            $errors['quiz_answer'] = 'Quiz Answer is required <br/>';
        }
    }else{
        //    check Quiz option1
        if (empty($_POST['quiz_option1'])) {
            $errors['quiz_option1'] = 'Quiz Option1 is required <br/>';
        }
        //    check Quiz option2
        if (empty($_POST['quiz_option2'])) {
            $errors['quiz_option2'] = 'Quiz Option2 is required <br/>';
        }
        //    check Quiz option3
        if (empty($_POST['quiz_option3'])) {
            $errors['quiz_option3'] = 'Quiz Option3 is required <br/>';
        }
        //    check Quiz option4
        if (empty($_POST['quiz_option4'])) {
            $errors['quiz_option4'] = 'Quiz Option4 is required <br/>';
        }
    }

    if(array_filter($errors)){}
    else{
        $quiz_question  = mysqli_real_escape_string($conn,$_POST['quiz_question']);
        $quiz_option1= mysqli_real_escape_string($conn,$_POST['quiz_option1']);
        $quiz_option2= mysqli_real_escape_string($conn,$_POST['quiz_option2']);
        $quiz_option3= mysqli_real_escape_string($conn,$_POST['quiz_option3']);
        $quiz_option4= mysqli_real_escape_string($conn,$_POST['quiz_option4']);
        $quiz_answer= mysqli_real_escape_string($conn,$_POST['quiz_answer']);
        $quiz_type= mysqli_real_escape_string($conn,$_POST['quiz_type']);

//      Update quiz question into DB Table Quiz Question
        $sql = "UPDATE quiz_question set quiz_question='$quiz_question', quiz_answer='$quiz_answer', quiz_option1='$quiz_option1',
                    quiz_option2='$quiz_option2',quiz_option3='$quiz_option3',quiz_option4='$quiz_option4', quiz_answer ='$quiz_answer' where quiz_question_id = '$quizQueRetrieved'";

//      Save to db and check
        if(mysqli_query($conn,$sql)){
            // success
            header("Location:quiz_question.php?quizid=".$quizID);
        }else{
            // error
            echo "Query error:". mysqli_error($conn);
        }
    }

}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Quiz</title>
    <?php include "../css/css.php";?>
</head>
<body>
<?php include "../lecturer/lecturer_navbar.php";?>
<div class="title">
    <h2><strong>Add Quiz</strong></h2>
    <h3>Add Quiz Question</h3>
</div>
<div class="d-flex justify-content-center" >
    <form action="" method="POST" class="w-50">
        <?php while($row = mysqli_fetch_array($result)) :
        $quiz_question = $row['quiz_question'];
        $quiz_option1 = $row['quiz_option1'];
        $quiz_option2 = $row['quiz_option2'];
        $quiz_option3 = $row['quiz_option3'];
        $quiz_option4 = $row['quiz_option4'];
        $quiz_answer = $row['quiz_answer'];
        $quiz_type = $row['quiz_type'];
        ?>
        <!--Quiz Type-->
        <div class="col">
            <div class="input-group mb-3">
                <label class="input-group-text bg-info" for="quiz_type">Quiz Type</label>
                <select class="form-select" id="quiz_type" name="quiz_type">
                    <option value="<?php echo $quiz_type;?>"><?php echo $quiz_type;?></option>
                </select>
            </div>
        </div>
        <!--Quiz Question-->
        <div class="col">
            <div class="pt-2">
                <div class="input-group my-auto">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-info">Question</div>
                    </div>
                    <input type="text" class="form-control" name="quiz_question" value="<?php echo $quiz_question;?>" >
                </div>
            </div>
            <span class="error"><?php echo $errors['quiz_question'];?></span>
        </div>

        <!--Quiz Answer-->
        <div class="col">
            <div class="pt-2">
                <div class="input-group my-auto">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-info">Answer</div>
                    </div>
                    <input type="text" class="form-control" name="quiz_answer" value="<?php echo $quiz_answer;?>" >
                </div>
            </div>
            <span class="error"><?php echo $errors['quiz_answer'];?></span>
        </div>

        <!--Quiz Option1 -->
        <div class="col optional option"  >
            <div class="pt-2">
                <div class="input-group my-auto">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-info">Option 1</div>
                    </div>
                    <input type="text" class="form-control" name="quiz_option1" value="<?php echo $quiz_option1;?>" >
                </div>
            </div>
            <span class="error"><?php echo $errors['quiz_option1'];?></span>
        </div>
        <!--Quiz Option2 -->
        <div class="col optional option"  style="display: none;">
            <div class="pt-2">
                <div class="input-group my-auto">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-info">Option 2</div>
                    </div>
                    <input type="text" class="form-control" name="quiz_option2" value="<?php echo $quiz_option2;?>">
                </div>
            </div>
            <span class="error"><?php echo $errors['quiz_option2'];?></span>
        </div>
        <!--Quiz Option3 -->
        <div class="col optional option"  >
            <div class="pt-2">
                <div class="input-group my-auto">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-info">Option 3</div>
                    </div>
                    <input type="text" class="form-control" name="quiz_option3" value="<?php echo $quiz_option3;?>">
                </div>
            </div>
            <span class="error"><?php echo $errors['quiz_option3'];?></span>
        </div>
        <!--Quiz Option4 -->
        <div class="col optional option" >
            <div class="pt-2">
                <div class="input-group my-auto">
                    <div class="input-group-prepend">
                        <div class="input-group-text bg-info">Option 4</div>
                    </div>
                    <input type="text" name="quiz_option4" value="<?php echo $quiz_option4;?>" class="form-control">
                </div>
            </div>
            <span class="error"><?php echo $errors['quiz_option4'];?></span>
        </div>
        <br>
        <?php endwhile; ?>
        <div class="col">
            <?php buttonElement("btn-create","btn btn-success btn-block", "Update","update-quiz-que","data-toggle='tooltip' data-placement='bottom' title='Update' ");?>
        </div>
    </form>
</div>

<?php include "../js/js.php";?>
<!--<script>-->
<!--    $("select").change(function () {-->
<!--        // hide all optional elements-->
<!--        $(".optional").css("display","none");-->
<!---->
<!--        $("select option:selected").each(function () {-->
<!--            if($(this).val() === "mcq") {-->
<!--                $('.option').css('display','block');-->
<!--            }-->
<!--        });-->
<!--    });-->
<!--</script>-->

</body>
</html>