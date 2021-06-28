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

                                    $lang_list1 = "не выбрано";
$lang_list2 = "не выбрано";
if (isset($_GET["list1"])){
    $lang_list1 = $_GET["list1"];
}
if (isset($_GET["list2"])){
    $lang_list2 = $_GET["list2"];
}

$file_lang = '../lang_files/lang_files_'.$lang_list1.'.php';
if (file_exists($file_lang)) {
    $is_set_page = true;
    include $file_lang;
}

$file_lang2 = '../lang_files/lang_files_'.$lang_list2.'.php';
if (file_exists($file_lang2)) {
    $is_set_page = true;
    include $file_lang2;
}



<div class="section">                       

<?php   
    $lang_check = "false";
    if(isset($_GET["main_file"])) {   
        $lang_check = "true";                                  
        if($_GET["main_file"] == "ru"){
        $lang1 = $_lang_ru;                                                                   
        } 
        if($_GET["main_file"] == "en"){
        $lang1 = $_lang_en;                               
        } 
        if($_GET["main_file"] == "fr"){
        $lang1 = $_lang_fr;                              
        }                                     
        foreach($lang1 as $key => $value)
        {
        echo '<textarea value="'.$key.'" disabled>'.$value.'</textarea>'; 
        }                                       
    } 
    else {
            echo '<textarea disabled>Язык не выбран</textarea>'; 
    }
?>
</div>                              
</div>                    
<div class="form2">
<form class="form_save" action="form_save" method="POST" id="form_save">                    
<input type="submit" value="Сохранить изменения" id="myBtn2">
<?php   
   $lang_check = "false";
   if(isset($_GET["editable_file"])) {
        $lang_check = "true";
        if($_GET["editable_file"] == "ru"){
            $lang2 = $_lang_ru;  
        }
        if($_GET["editable_file"] == "en"){
            $lang2 = $_lang_en;  
        }
        if($_GET["editable_file"] == "fr"){
            $lang2 = $_lang_fr;  
        } 
    }
    if(isset($_GET["main_file"])&&isset($_GET["editable_file"])) {
        $arrayDiff = array_diff_key($lang1, $lang2);
        $new_array = array_map(function($n){
            return ($n = "");  
            }, $arrayDiff);  
        if($arrayDiff != 0){
            $final = array_merge($lang2,$new_array);
        } 
        foreach($final as $key => $value)
        {
            echo '<div class="textarea1"><textarea name="'.$key.'" value="'.$key.'" disabled>'.$value.'</textarea></div>'; 
        } 
    } 
    else {
           echo '<textarea disabled>Язык не выбран</textarea>'; 
    }                                    
       //var_dump($final );
      // var_dump(array_diff_key($lang1, $lang2));                                    
 ?>
<script>                                    
        $('.textarea1').click(function (event) {
            //console.log($(this).prop('disabled'));
            let $textarea = $('textarea', $(this));
            if ($textarea.prop('disabled')) {
                $textarea.prop("disabled", false);
            } 
        });                                
</script>
</form>
</div>


<?php                                  
        if(isset($_GET["main_file"])&&isset($_GET["editable_file"])) {  
            $lang_check = "true";                                  
            //$final = array_merge($main_lang,$editable_lang);                                        
                // var_dump($final);                                        
            $arrayDiff = array_diff_key($main_lang, $editable_lang);
            $new_array = array_map(function($n){
                return ($n = "");  
                }, $arrayDiff);  
            if($arrayDiff != 0){
                $final = array_merge($editable_lang,$new_array);
            } 
            uasort($final, function($a, $b){
                if (!$a && !$b) return 0;
                if ($a && !$b) return 1;
                else return 	-1;
            });
            foreach($final as $key => $value)
            {
                echo '<div class="textarea">
                    <div class="textarea_container">
                    <div class="textarea1"><textarea form="form_save1" name="'.$key.'" disabled>'.$key.'</textarea></div>
                    <div class="textarea2"><textarea form="form_save1"  name="'.$value.'" disabled>'.$value.'</textarea></div>                                            
                    </div>'; 
            } 
        } 
        else {
            echo '<textarea disabled>Язык не выбран</textarea>'; 
        }                 
        // var_dump(array_diff_key($lang1, $lang2));                                                                      
    ?>

<?php foreach(lang_files::$langs_list as $key => $value): ?>
                                    <option value="<?=$value?>"<? if($key == $_GET['main_file']) echo " selected"?>><?=$value?></option>                             
                                <?php endforeach;?>


                                <div class="forms1">
                        
                    </div>
                    <div class="forms2">
                        
                    </div>