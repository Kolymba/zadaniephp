<?php 
    if (isset($_GET['main_file'])&&isset($_GET['editable_file'])) {
        lang_files::$ml = $_GET["main_file"];  
        lang_files::$el = $_GET["editable_file"];  
        
    include lang_files::get_arr(lang_files::$ml);
    $main_lang = $_lang;
    include lang_files::get_arr(lang_files::$el);    
    $editable_lang = $_lang;
    
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