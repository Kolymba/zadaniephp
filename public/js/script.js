$(document).ready(function () {
    // Устанавливаем textarea disabled по умолчанию и снимаем по клику  
    $('.textarea2').click(function (event) {
        let $textarea = $('textarea', $(this));
        if ($textarea.prop('disabled')) {
            $textarea.prop("disabled", false);
        }
    });
    // Отправляем форму и получаем ответ  
    $("#form_save1").submit(function (e) { // Устанавливаем событие отправки для формы с id=form
        e.preventDefault();
        $.post('form_save', $("#form_save1").serialize(), function (data) {
            alert(data);
        });
    });
    // Устанавливаем авторазмер textarea
    $('body').on('keydown input', 'textarea[data-expandable]', function () {
        this.style.removeProperty('height');
        this.style.height = (this.scrollHeight + 2) + 'px';
    }).on('mousedown focus', 'textarea[data-expandable]', function () {
        this.style.removeProperty('height');
        this.style.height = (this.scrollHeight + 2) + 'px';
    });
});

