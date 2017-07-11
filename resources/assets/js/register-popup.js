var ageInput;
var termsInput;
var inputs = [];
var loginButtons;
var registerTerms;
var buttonOpenRegisterPopup;

jQuery(document).ready(function () {
    inputs = ['#registerPopup-age', '#registerPopup-terms'];
    buttonOpenRegisterPopup = jQuery('#open-register-popup');
    ageInput = jQuery('#registerPopup-age');
    termsInput = jQuery('#registerPopup-terms');
    loginButtons = jQuery('.modal-body-welcome');
    registerTerms = jQuery('#register-terms');

    ageInput.click(checkAcceptedTerms);
    termsInput.click(checkAcceptedTerms);
    buttonOpenRegisterPopup.click(resetTerms);
});

function checkAcceptedTerms() {
    var areElementsValid = true;

    for (var i in inputs) {
        areElementsValid &= isElementValid(inputs[i]);
    }

    if (areElementsValid) {
        loginButtons.fadeIn(500);
        registerTerms.slideUp(300);
    }
}

function isElementValid(input) {
    var element = jQuery(input);
    var elementChecked = element.prop('checked');

    return elementChecked;
}

function resetTerms() {
    loginButtons.hide();
    registerTerms.show();

    for (var i in inputs) {
        jQuery(inputs[i]).prop('checked', false);
    }
}