(function ($) {

    var typingTimer;                //timer identifier
    var doneTypingInterval = 1000;  //time in ms, 5 second for example
    var $input = $('[data-validate]');
    //on keyup, start the countdown
    $input.on('keyup', function () {
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    //on keydown, clear the countdown
    $input.on('keydown', function () {
        clearTimeout(typingTimer);
    });
    //user is "finished typing," do something
    function doneTyping() {
        validate($input)
    }
    function validate(elm) {
        const url = elm.attr('data-validate-url').replace('VALUE', elm.val())
        $.ajax({
            method: "get",
            url: url
        }).then(function (response) {
            $('.validate-msg').remove()
            if (response) {
                $('#first_name').val(response.first_name);
                $('#last_name').val(response.last_name);
                $('#email').val(response.email);
                $('#country_name').val(response.country);
                $('#country_name').html(response.country);
                $('#postal_code').val(response.postal_code);
                $('#address').val(response.address);
            } 
        });
    }
})(jQuery)
