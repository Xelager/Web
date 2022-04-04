function fioValidation(value) {
  var fioExp = /^[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{0,}\s[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{1,}(\s[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{1,})$/
  return fioExp.test(value)
}

function definitionValidation(value) {
  var definitionExp = /([A-Za-zА-Яа-я\S]+(\s)){30,}$/;
  return definitionExp.test(value)
}

$(document).ready(function() {
  $('.js-form-validate').submit(function() {
    var form = $(this);
    var field = [];
    var focusCheck = true;
    form.find('input[data-validate]').each(function() {
      field.push('input[data-validate]');
      var value = $(this).val(),
        line = $(this).closest('.some-form__line');
      for (var i = 0; i < field.length; i++) {
        if (!value || value.replace(/\s/g, '').length === 0) {
          line.addClass('some-form__line-required');
          line.removeClass('some-form__line-succesfull');
          line.removeClass('some-form__line-example');
          if (focusCheck) {
            $(this).focus();
            focusCheck = false;
          }
          event.preventDefault();
        } else if (value !== null) {
          line.removeClass('some-form__line-required');
          line.removeClass('some-form__line-succesfull');
          line.removeClass('some-form__line-example');
          if ($(this).attr('name') === 'FIO' && !fioValidation(value)) {
            if (focusCheck) {
              $(this).focus();
              focusCheck = false;
            }
            line.addClass('some-form__line-example');
          } else
            line.addClass('some-form__line-succesfull');
          event.preventDefault();
        }
      }
    });
    form.find('textarea[data-validate]').each(function() {
      field.push('textarea[data-validate]');
      var value = $(this).val(),
        line = $(this).closest('.some-form__line');
      for (var i = 0; i < field.length; i++) {
        if (!value || value.replace(/\s/g, '').length === 0) {
          line.addClass('some-form__line-required');
          line.removeClass('some-form__line-succesfull');
          line.removeClass('some-form__line-example');
          if (focusCheck) {
            $(this).focus();
            focusCheck = false;
          }
          event.preventDefault();
        } else if (value !== null) {
          line.removeClass('some-form__line-required');
          line.removeClass('some-form__line-succesfull');
          line.removeClass('some-form__line-example');
          if (!definitionValidation(value)) {
            if (focusCheck) {
              $(this).focus();
              focusCheck = false;
            }
            line.addClass('some-form__line-example');
          } else
            line.addClass('some-form__line-succesfull');
          event.preventDefault();
        }
      }
    });
  });
});
