<?php 
echo '<pre>';
var_dump([$_lang_ru]);
var_dump([$_lang_en]);
echo '</pre>';
$arrayDiff = array_diff_key(array_flip($list2),$list1);
 $arrayFill = array_fill_keys(array_flip($arrayDiff),0);
 $final = array_merge($list1,$arrayFill);
 foreach ($arrayDiff as $key => $value) {
    $value != "" ? "" : $value;
}  
?>

$("textarea").on('click', function() {
                                    if($("textarea").prop('disabled')) {
                                        $("textarea").prop('disabled', false);
                                    } else {
                                        $("textarea").prop('disabled', true);
                                    }
                                });

                                <?php   $lang_check = "false";
                                if(isset($_GET)&&$_GET["list1"] == "ru"){
                                $lang1 = $_lang_ru;  
                                $lang_check = "true";                              
                                } 
                                if(isset($_GET)&&$_GET["list1"] == "en"){
                                $lang1 = $_lang_en;   
                                $lang_check = "true";                             
                                } 
                                if(isset($_GET)&&$_GET["list1"] == "fr"){
                                $lang1 = $_lang_fr;   
                                $lang_check = "true";                             
                                } 
                               if($lang_check = "true"){
                                    foreach($lang1 as $key => $value)
                                    {
                                    echo '<textarea value="'.$key.'" disabled>'.$value.'</textarea>'; 
                                    } 
                                } else {
                                        echo '<textarea value="Описание" disabled>Описание</textarea>'; 
                                    }  
                            ?>

$lang_check = "false";
                                if(isset($_GET)&&$_GET["list2"] == "ru"){
                                    $lang2 = $_lang_ru;  
                                    $lang_check = "true";                              
                                } 
                                if(isset($_GET)&&$_GET["list2"] == "en"){
                                    $lang2 = $_lang_en;   
                                    $lang_check = "true";                             
                                } 
                                if(isset($_GET)&&$_GET["list2"] == "fr"){
                                    $lang2 = $_lang_fr;   
                                    $lang_check = "true";                             
                                }                                 
                                if($lang_check = "true"){
                                    $arrayDiff = array_diff_key($lang1, $lang2);
                                    $new_array = array_map(function($n){
                                        return ($n = "Описание отсутствует");  
                                      }, $arrayDiff);                              
                                    
                                    if($arrayDiff != 0){
                                        $final = array_merge($lang2,$new_array);
                                    }
                                    else{
                                        $final = $lang2;
                                    }
                                    foreach($final as $key => $value)
                                    {
                                        echo '<textarea name="'.$key.'" value="'.$key.'" disabled>'.$value.'</textarea>'; 
                                    } 
                                } 
                                else {
                                        echo '<textarea name="'.$key.'" value="Описание" disabled>Описание</textarea>'; 
                                    }                                    
                                    //var_dump($final );
                                   // var_dump(array_diff_key($lang1, $lang2));    

                                   $('.textarea1').prop("disabled", true);
                                    $('.textarea').click(function() { alert('Test'); });