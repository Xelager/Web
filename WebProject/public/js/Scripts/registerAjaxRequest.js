var emailError = document.querySelector('#emailError');
var passwordError = document.querySelector('#passwordError');
var loginError = document.querySelector('#loginError');
var emailDiv = document.querySelector('#emailDiv');
var passwordDiv = document.querySelector('#passwordDiv');
var loginDiv = document.querySelector('#loginDiv');
var alert = document.querySelector('#alert');
var existLogin = document.querySelector('#existLogin');

function showErrors(result) {
    if (result["model"]["validator"]["errMessages"]["emailError"] &&
        result["model"]["validator"]["errMessages"]["emailError"].replace(/\s/g, '').length !== 0) {
        emailDiv.classList.remove("some-form__line-succesfull");
        emailDiv.classList.add(result["model"]["validator"]["errMessages"]["email"]);
        emailError.textContent = result["model"]["validator"]["errMessages"]["emailError"];
    } else {
        emailDiv.classList.remove("some-form__line-required");
        emailDiv.classList.add(result["model"]["validator"]["errMessages"]["email"]);
        emailError.textContent = "";
    }

    if (result["model"]["validator"]["errMessages"]["passwordError"] &&
        result["model"]["validator"]["errMessages"]["passwordError"].replace(/\s/g, '').length !== 0) {
        passwordDiv.classList.remove("some-form__line-succesfull");
        passwordDiv.classList.add(result["model"]["validator"]["errMessages"]["password"]);
        passwordError.textContent = result["model"]["validator"]["errMessages"]["passwordError"];
    } else {
        passwordDiv.classList.remove("some-form__line-required");
        passwordDiv.classList.add(result["model"]["validator"]["errMessages"]["password"]);
        passwordError.textContent = "";
    }

    if (result["model"]["validator"]["errMessages"]["loginError"] &&
        result["model"]["validator"]["errMessages"]["loginError"].replace(/\s/g, '').length !== 0) {
        loginDiv.classList.remove("some-form__line-succesfull");
        loginDiv.classList.add(result["model"]["validator"]["errMessages"]["login"]);
        loginError.textContent = result["model"]["validator"]["errMessages"]["loginError"];
    } else {
        loginDiv.classList.remove("some-form__line-required");
        loginDiv.classList.add(result["model"]["validator"]["errMessages"]["login"]);
        loginError.textContent = "";
    }

    if (result['error'] && result['error'].replace(/\s/g, '').length !== 0) {
        alert.classList.remove("display-alert");
        existLogin.innerHTML = result['error'];
    } else {
        alert.classList.add("display-alert");
    }
}

function buildXmlFromForm(form) {
    var xml = $('<XMLDocument />');
    xml.append (
        $('<data-section />').append(
            $('<login />').text(form.find("input[name='login']").val())
        ).append(
            $('<email />').text(form.find("input[name='email']").val())
        ).append(
            $('<name />').text(form.find("input[name='name']").val())
        ).append(
            $('<password />').text(form.find("input[name='password']").val())
        )
    );

    return xml.html();
}

$("#registerForm").submit(function(event) {
    event.preventDefault();
    var xmlString = buildXmlFromForm($(this));
    $.ajax({
        type: "POST",
        charset:"utf-8",
        url: '../account/submitRegister',
        data: xmlString,
        success: function(respData) {
            if (respData && respData.replace(/\s/g, '').length !== 0)
            {
                console.log(respData);
                var result = JSON.parse(respData);
                console.log(result);
                if (result["redirect"])
                {
                    window.location.replace(result["redirect"]);
                }
                showErrors(result);
            }
        },
        error: function(errorData) {
            console.log(errorData);
        }
    });
});