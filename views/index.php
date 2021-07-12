<!DOCTYPE html>
<html>
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/main.css" /> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.2.1/dist/jquery.min.js" type="text/javascript"></script>
    <script src="js/script.js" type="text/javascript"></script>
    <title>Редактирование перевода</title>
    <!--[if IE]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->  
    </head>
    <body >
        <div class="container">
            <div class="wrapper">
                <div class="header">
                    <ul>
                        <li class="a">
                        <form action="" method="GET" id="form_select">                             
                            <label class="pad" for="main">На основе</label>                         
                            <select name="main_file" id="main" class="pad">
                                <?php foreach(lang_files::$langs_list as $key => $value): ?>
                                    <option value="<?=$key?>"<? if($key == $_GET['main_file']) echo " selected"?>><?=$value?></option>                             
                                <?php endforeach;?>
                            </select>
                            <label class="pad" for="editable">Редактируем</label>    
                            <select  name="editable_file" id="editable" class="pad">                            
                                <?php foreach(lang_files::$langs_list as $key => $value): ?>
                                    <option value="<?=$key?>"<? if($key == $_GET['editable_file']) echo " selected"?>><?=$value?></option>                             
                                <?php endforeach;?>
                            </select>                           
                            <input class="pad" type="submit" value="Применить" id="myBtn">
                        </form> 
                        </li>
                        <li class="d">
                            <form class="form_save" action="form_save" method="POST" id="form_save1">                                             
                                <input class="pad" type="submit" value="Сохранить изменения" id="myBtn2" form="form_save1">
                            </form>
                        </li>                    
                    </ul>                    
                </div>   
                <div class="section">
                    <div class="section_header">
                        <div id="result">
                            <script>
                                var txt = $("#main option:selected").text();
                                $('div#result').html(txt + " (значение)");
                            </script>
                        </div>
                        <div id="result2">
                            <script>
                                $('div#result2').html(txt + " (ключ)");
                            </script>
                        </div>                       
                        <div id="result3">
                            <script>
                                var txt2 = $("#editable option:selected").text();
                                $('div#result3').html(txt2 + " (значение)");
                            </script>
                        </div>
                    </div>
                    <div>
                        <?php
                        if (isset($_GET['main_file'])&&isset($_GET['editable_file'])) {
                            foreach ($editable_lang as $editable_key => $editable_value) {
                                if (!empty($main_lang[$editable_key])) {
                                    echo '<div class="textarea_container"><div class="text1">'.$main_lang[$editable_key].'</div><div class="text1">'.$editable_key.'</div>';
                                }
                                else{
                                    echo '<div class="textarea_container"><div class="text1"></div><div class="text2"></div>';
                                }
                                echo '<div class="textarea2"><textarea rows=2 data-expandable form="form_save1" name="lang['.$editable_key.']" class="textarea_content" disabled>'.$editable_value.'</textarea></div></div>'; 
                            }
                        } else {
                            echo '<div class="textarea_container">
                            <div>Выберите основной файл языка</div>
                            <div>Выберите редактируемый файл языка<div>
                            </div>';
                        }                        
                        ?>  
                        <input type="text" style="display:none;" value="<?=lang_files::$el?>" form="form_save1" name="res_file[<?=lang_files::$el?>]"> 
                        <div id="result_form"></div> 
                    </div>
                </div>                       
            </div>                 
        </div>
    </body>
</html>