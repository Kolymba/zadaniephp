<?php 

//$res_file = '/lang_files_result/lang_file_res.php'; 
//if(isset($_POST['lang'])){
  //  $_POST['lang'] = $post_lang;
    //lang_files::$edit_arr = $edit_lang;
    //$new_lang = array_merge($post_lang, $edit_lang);
//}
$today = date("d-m-y-H-i"); 
$res_file = array_shift($_POST['res_file']);
$file_lang = '../lang_files/lang_files_'.$res_file.'.php';
if (file_exists($file_lang)) {
    include $file_lang;
    $edit_lang = $_lang;
}
$new_lang = array_merge($_POST['lang'], $edit_lang);
if(isset($_POST["lang"])) {       
      // file_put_contents('../lang_files_result/lang_files_'.$res_file.'.php', "<?php\n\$_lang = ".var_export($_POST['lang'], true).";");
      file_put_contents('../lang_files_result/lang_file_'.$res_file.'_'.$today.'.php', "<?php\n\$_lang = ".var_export($new_lang, true).";");
    } 
    
       
?>