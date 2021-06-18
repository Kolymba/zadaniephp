<?php 
var_dump($_POST);
if(isset($_POST["send"])) {
    file_put_contents('lang_file_res.php', "<?php\n\$_lang = ".var_export($_POST, true).";");
}
?>