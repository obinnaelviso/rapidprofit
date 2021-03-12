/*
 *  Document   : readyRegister.js
 *  Author     : pixelcave
 *  Description: Custom javascript code used in Register page
 */

var ReadyRegister = function() {

    return {
        init: function() {
            /*
             *  Jquery Validation, Check out more examples and documentation at https://github.com/jzaefferer/jquery-validation
             */

            /* Register form - Initialize Validation */
            $('#form-register').validate({
                errorClass: 'help-block animation-slideUp', // You can change the animation class for a different entrance animation - check animations page
                errorElement: 'div',
                errorPlacement: function(error, e) {
                    e.parents('.form-group > div').append(error);
                },
                highlight: function(e) {
                    $(e).closest('.form-group').removeClass('has-success has-error').addClass('has-error');
                    $(e).closest('.help-block').remove();
                },
                success: function(e) {
                    if (e.closest('.form-group').find('.help-block').length === 2) {
                        e.closest('.help-block').remove();
                    } else {
                        e.closest('.form-group').removeClass('has-success has-error');
                        e.closest('.help-block').remove();
                    }
                },
                rules: {
                    'first_name': {
                        required: true
                    },
                    'last_name': {
                        required: true
                    },
                    'address': {
                        required: true
                    },
                    'phone': {
                        required: true
                    },
                    'country': {
                        required: true
                    },
                    'email': {
                        required: true,
                        email: true
                    },
                    'password': {
                        required: true,
                        minlength: 6
                    },
                    'password_confirmation': {
                        required: true,
                        equalTo: '#password'
                    },
                    'terms': {
                        required: true
                    }
                },
                messages: {
                    'first_name': {
                        required: 'Please enter your first name',
                    },
                    'last_name': {
                        required: 'Please enter your last name',
                    },
                    'address': {
                        required: 'Please enter your address',
                    },
                    'phone': {
                        required: 'Please enter your phone number',
                    },
                    'country': {
                        required: 'Please enter your country',
                    },
                    'email': 'Please enter a valid email address',
                    'password': {
                        required: 'Please provide a password',
                        minlength: 'Your password must be at least 6 characters long'
                    },
                    'password_confirmation': {
                        required: 'Please retype password to confirm',
                        minlength: 'Your password must be at least 6 characters long',
                        equalTo: 'Password do not match'
                    },
                    'terms': {
                        required: 'Please accept the terms and conditions!'
                    }
                }
            });
        }
    };
}();
