<?php
$today = date("d-m-y-H-i");
$res_file = array_shift($_POST['res_file']);
$file_lang = '../lang_files/lang_files_' . $res_file . '.php';
if (file_exists($file_lang)) {
  include $file_lang;
  $edit_lang = $_lang;
}

if (isset($_POST["lang"])) {
  $new_lang = array_merge($edit_lang, $_POST['lang']);
  file_put_contents('../lang_files_result/lang_file_' . $res_file . '_' . $today . '.php', "<?php\n\$_lang = " . var_export($new_lang, true) . ";");
  echo "Языковой файл успешно записан";
} else {
  echo "Языковой файл не записан";
}
