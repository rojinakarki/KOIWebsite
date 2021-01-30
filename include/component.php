<?php

function inputElement($icon,$type, $name,$placeholder,$value,$attr){
    $val = htmlspecialchars($value);
    $element = "
                <div class=\"pt-2\">
                    <div class=\"input-group my-auto\">
                        <div class=\"input-group-prepend\">
                            <div class=\"input-group-text bg-info\"><i class='$icon'></i></div>
                        </div>
                        <input class=\"form-control\" type='$type' name='$name' '$attr' placeholder='$placeholder' value='$val'   >
                    </div>
                </div>
    ";
    echo $element;
}

function buttonElement($btnid,$styleclass,$text,$name,$attr){
    $btn="
        <button name='$name''$attr' class='$styleclass' id='$btnid' >$text </button>
    ";
    echo $btn;
}
