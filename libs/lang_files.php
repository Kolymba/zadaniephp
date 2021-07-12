<?php

class lang_files
{
    static public $langs_list = [    
        'en' => 'Английский',
        'ru' => 'Русский',        
        'fr' => 'Французский',
    ];
    static public $el;
    static public $ml;
    static public $edit_arr;

   static function get_arr($title_file_lang){
        $file_lang = '../lang_files/lang_files_'.$title_file_lang.'.php';
        if (file_exists($file_lang)) {
        return $file_lang;
        }
    }
}

?>