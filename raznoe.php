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
$(document).ready(function(){
    $("#myBtn2").submit(function(event) {
        event.preventDefault();
        //$("#form_save1").serialize() - вернет все поля формы в понятном для функции $.post виде
        $.post('form_save.php', $("#form_save1").serialize(), function(data){
        //data - то что выведет страница по адресу /example-url
        var data = "Gbpltw";
        alert("data");
        });
    });
});

$(document).ready(function(){
    $("#form_save1").submit(function (e) { // Устанавливаем событие отправки для формы с id=form
        e.preventDefault();
        var form_data = $(this).serialize(); // Собираем все данные из формы
        $.ajax({
            type: "POST", // Метод отправки
            url: "controllers/form_save.php", // Путь до php файла отправителя
            data: form_data,
            success: function () {
                // Код в этом блоке выполняется при успешной отправке сообщения
                alert("Ваше сообщение отправлено!");
            }
        });
    });
 });   
