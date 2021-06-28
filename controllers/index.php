<?php 

if (isset($_GET["main_file"])){
    $main_lang_list = $_GET["main_file"];
    lang_files::$ml = $main_lang_list;
}
if (isset($_GET["editable_file"])){
    $editable_lang_list = $_GET["editable_file"];
    lang_files::$el = $editable_lang_list;
}

$file_lang = '../lang_files/lang_files_'.$main_lang_list.'.php';
if (file_exists($file_lang)) {
    include $file_lang;
    $main_lang = $_lang;
}

$file_lang2 = '../lang_files/lang_files_'.$editable_lang_list.'.php';
if (file_exists($file_lang2)) {
    include $file_lang2;
    $editable_lang = $_lang;
}
if (isset($_GET['main_file'])&&isset($_GET['editable_file'])) {
    foreach ($main_lang as $main_key => $main_value) {
        if (!array_key_exists($main_key, $editable_lang)) {
            $editable_lang[$main_key] = '';
        } 
    }
    uasort($editable_lang, function($a, $b){
        if (!$a && !$b) return 0;
        if ($a && !$b) return 1;
        else return 	-1;
    });
} 

?>