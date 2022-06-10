var emailError = document.querySelector('#emailError');
var passwordError = document.querySelector('#passwordError');
var loginError = document.querySelector('#loginError');
var emailDiv = document.querySelector('#emailDiv');
var passwordDiv = document.querySelector('#passwordDiv');
var loginDiv = document.querySelector('#loginDiv');
var alert = document.querySelector('#alert');
var existLogin = document.querySelector('#existLogin');

function showErrors(result) {

}
var result = null;
var alertElement = document.getElementById("alertText");
$("#registerForm").submit(function(event) {
    event.preventDefault();
    $.ajax({
        type: "POST",
        charset:"utf-8",
        url: '../register',
        headers: {'X-CSRF-TOKEN': $('input[name="_token"]').val()},
        data: $(this).serialize(),
        success: function(respData) {
            alertElement.style.display = "none";
            window.location.replace('../login');
        },
        error: function(errorData) {
            result = JSON.parse(errorData.responseText)
            alertElement.style.display = "block";
            alertElement.textContent = "";
            if (result.errors.login)
            {
                alertElement.insertAdjacentHTML("afterbegin", "<div class='d-flex align-items-center gap-2'>" +
                    "<svg className=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\">\n" +
                    "   <use xlink:href=\"#exclamation-triangle-fill\"/>\n" +
                    "            </svg>\n" +
                    "            <div>\n" + result.errors.login +
                    "            </div></div>")
            }
            if (result.errors.email)
            {
                alertElement.insertAdjacentHTML("afterbegin", "<div class='d-flex align-items-center gap-2'>" +
                    "<svg className=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\">\n" +
                    "   <use xlink:href=\"#exclamation-triangle-fill\"/>\n" +
                    "            </svg>\n" +
                    "            <div>\n" + result.errors.email +
                    "            </div></div>")
            }
            if (result.errors.password)
            {
                alertElement.insertAdjacentHTML("afterbegin", "<div class='d-flex align-items-center gap-2'>" +
                    "<svg className=\"bi flex-shrink-0 me-2\" width=\"24\" height=\"24\" role=\"img\" aria-label=\"Danger:\">\n" +
                    "   <use xlink:href=\"#exclamation-triangle-fill\"/>\n" +
                    "            </svg>\n" +
                    "            <div>\n" + result.errors.password +
                    "            </div></div>")
            }
        }
    });
});
