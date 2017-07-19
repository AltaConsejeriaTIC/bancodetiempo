var ageInput;
var termsInput;
var inputs = [];
var loginButtons;
var registerTerms;
var buttonOpenRegisterPopup;
var buttonOpenRegisterPopup2;

jQuery(document).ready(function () {
    inputs = ['#registerPopup-age', '#registerPopup-terms'];
    buttonOpenRegisterPopup = jQuery('#open-register-popup');
    buttonOpenRegisterPopup2 = jQuery('#open-register-popup2');
    ageInput = jQuery('#registerPopup-age');
    termsInput = jQuery('#registerPopup-terms');
    loginButtons = jQuery('.modal-body-welcome');
    registerTerms = jQuery('#register-terms');

    ageInput.click(checkAcceptedTerms);
    termsInput.click(checkAcceptedTerms);
    buttonOpenRegisterPopup.click(resetTerms);
    buttonOpenRegisterPopup2.click(resetTerms);

    disableButtons();
});

function checkAcceptedTerms() {
    var areElementsValid = true;

    for (var i in inputs) {
        areElementsValid &= isElementValid(inputs[i]);
    }

    if (areElementsValid) {
        enableButtons();
    } else {
        disableButtons();
    }
}

function isElementValid(input) {
    var element = jQuery(input);
    var elementChecked = element.prop('checked');

    return elementChecked;
}

function resetTerms() {
    disableButtons();
    uncheckTerms();
}

function uncheckTerms() {
    for (var i in inputs) {
        jQuery(inputs[i]).prop('checked', false);
    }
}


function disableButtons() {
    var elements = loginButtons.find('a.social-button');

    for (var i = 0; i < elements.length; i++) {
        var element = jQuery(elements[i]);
        element.addClass('button-disabled');
        disableEnterKey(element);
    }
}

function disableEnterKey(element) {
    element.keydown(function (event) {
        if (event.which === 13) {
            event.preventDefault();
        }
    })
}

function enableButtons() {
    var elements = loginButtons.find('a.social-button');

    for (var i = 0; i < elements.length; i++) {
        var element = jQuery(elements[i]);
        element.removeClass('button-disabled');
        element.off('keydown');
    }
}