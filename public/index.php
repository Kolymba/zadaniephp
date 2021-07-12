<?php
// подсказка
//<textarea name="lang_new[key]"></textarea>
//$_POST['lang_new'];
//$_lang['key'] = "text";
//$_lang['key2'] = "text2";
//var_dump(file_put_contents('lang_file_res.php', "<?php\n\$_lang = ".var_export($_POST['lang_new'], true).";"));
// array_merge();
//

$page = $_SERVER['REDIRECT_URL'];
$page = explode('/', $page);
$page = empty($page[1]) ? 'index' : $page[1];
$is_set_page = false;

spl_autoload_register(function($class){
    $file = '../libs/'.$class.'.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

$file = '../controllers/'.$page.'.php';
if (file_exists($file)) {
    $is_set_page = true;
    include $file;
}

$file = '../views/'.$page.'.php';
if (file_exists($file)) {
    $is_set_page = true;
    include $file;
}

 if (!$is_set_page) {
    header("HTTP/1.0 404 Not Found"); 
    die;
}