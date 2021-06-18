<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="main.css" /> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <title>Редактирование перевода</title>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->  
    </head>
    <body>
        <div class="container">
            <div class="wrapper">
                <div class="header">
                    <div class="form1">
                        <form action="" method="GET" id="form_select">                            
                            <select name="list1" id="lang_list1" >
                            <?php 
                                foreach(lang_files::$langs_list as $key => $value)
                                {
                                echo '<option value="'.$key.'">'.$value.'</option>'; 
                                }    
                               // var_dump($langs_list); exit;                           
                            ?>
                            </select>
                            <select  name="list2" id="lang_list2">
                            <?php 
                                foreach(lang_files::$langs_list as $key => $value)
                                {
                                echo '<option value="'.$key.'">'.$value.'</option>'; 
                                }      
                            ?>
                            </select>
                            <input type="submit" name="send" value="Применить" id="myBtn">
                        </form> 
                        
                        <div class="section">
                        

                            <?php   
                                $lang_check = "false";
                                if(isset($_GET["list1"])) {   
                                    $lang_check = "true";                                  
                                    if($_GET["list1"] == "ru"){
                                    $lang1 = $_lang_ru;                                                                   
                                    } 
                                    if($_GET["list1"] == "en"){
                                    $lang1 = $_lang_en;                               
                                    } 
                                    if($_GET["list1"] == "fr"){
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
                        <form class="form_save" action="form_save.php" method="POST" id="form_save">                    
                            <input type="submit" name="send" value="Сохранить изменения" id="myBtn2">
                            <?php   
                               $lang_check = "false";
                               if(isset($_GET["list2"])) {
                                    $lang_check = "true";
                                    if($_GET["list2"] == "ru"){
                                        $lang2 = $_lang_ru;  
                                    }
                                    if($_GET["list2"] == "en"){
                                        $lang2 = $_lang_en;  
                                    }
                                    if($_GET["list2"] == "fr"){
                                        $lang2 = $_lang_fr;  
                                    } 
                                }
                                if(isset($_GET["list1"])&&isset($_GET["list2"])) {
                                    $arrayDiff = array_diff_key($lang1, $lang2);
                                    $new_array = array_map(function($n){
                                        return ($n = "");  
                                        }, $arrayDiff);  
                                    if($arrayDiff != 0){
                                        $final = array_merge($lang2,$new_array);
                                    } 
                                    foreach($final as $key => $value)
                                    {
                                        echo '<textarea class="textarea1" name="'.$key.'" value="'.$key.'" >'.$value.'</textarea>'; 
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
                                    if ($(this).prop('disabled', false)) {
                                        $(this).prop("disabled", true);
                                    } 
                                    });                                
                            </script>
                        </form>
                    </div>
                </div>                 
            </div>
        </div>
    </body>
</html>
<?php  
?>
