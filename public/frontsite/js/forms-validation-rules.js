var PASSWORD_MINLENGTH = 8;
window.sign_up_rules = {
    'user[email]': {
        email: true
    },
    'user[password]': {
        minlength: PASSWORD_MINLENGTH
    },
    'user[confirm_password]': {
        minlength: PASSWORD_MINLENGTH,
        equalTo: '#user[password]'
    }
};
