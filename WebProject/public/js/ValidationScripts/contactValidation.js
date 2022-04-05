let validationFio = false;
let validationMail = false;
let validationPhone = false;
let formInput = document.getElementById("formSubmit");

function fioValidation(value) {
  var fioExp = /^[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{0,}\s[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{1,}(\s[А-ЯA-Z][а-яa-zА-ЯA-Z\-]{1,})$/
  return fioExp.test(value)
}

function phoneValidation(value) {
  var phoneExp = /^[\+][3, 7][0-9]{8,10}$/im
  return phoneExp.test(value)
}

function mailValidation(value) {
  var mailExp = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/
  return mailExp.test(value)
}

function elementOnFocus(element) {
  var parentEl = element.parentNode;
  parentEl.classList.remove("some-form__line-required");
  parentEl.classList.remove("some-form__line-succesfull");
  parentEl.classList.remove("some-form__line-example");
}

function validationFioOnBlur() {
  var input = document.getElementById("FioId");
  var parentEl = input.parentNode;
  var value = input.value;
  validationFio = false;
  if (!value || value.replace(/\s/g, '').length === 0) {
    parentEl.classList.add('some-form__line-required');
  } else if (!fioValidation(value)) {
    parentEl.classList.add('some-form__line-example');
  } else {
    validationFio = true;
    parentEl.classList.add('some-form__line-succesfull');
    check();
  }
}

function validationPhoneOnBlur() {
  var input = document.getElementById("phone");
  var parentEl = input.parentNode;
  var value = input.value;
  validationPhone = false;
  if (!value || value.replace(/\s/g, '').length === 0) {
    parentEl.classList.add('some-form__line-required');
  } else if (!phoneValidation(value)) {
    parentEl.classList.add('some-form__line-example');
  } else {
    validationPhone = true;
    parentEl.classList.add('some-form__line-succesfull');
    check();
  }
}

function validationMailOnBlur() {
  var input = document.getElementById("mail");
  var parentEl = input.parentNode;
  var value = input.value;
  validationMail = false;
  if (!value || value.replace(/\s/g, '').length === 0) {
    parentEl.classList.add('some-form__line-required');
  } else if (!mailValidation(value)) {
    parentEl.classList.add('some-form__line-example');
  } else {
    validationMail = true;
    parentEl.classList.add('some-form__line-succesfull');
    check();
  }
}

$(function() {
$("#FioId").tooltip();
$("#mail").tooltip();
$("#phone").tooltip();
});

function check() {
  if (validationFio && validationMail && validationPhone){
    formInput.disabled = false;
  } else {
    formInput.disabled = true;
  }
}
