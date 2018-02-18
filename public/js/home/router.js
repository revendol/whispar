$(".forgot-password").click(function (e) {
    e.preventDefault();
    $("#sign_in_portion").css('display','none');
    $("#forgot_password_portion").css('display','block');
    $("#create_account_portion").css('display','none');
});

$(".create-account").click(function (e) {
    e.preventDefault();
    $("#sign_in_portion").css('display','none');
    $("#forgot_password_portion").css('display','none');
    $("#create_account_portion").css('display','block');
});

$(".already_sign_in_button").click(function (e) {
    e.preventDefault();
    $("#sign_in_portion").css('display','block');
    $("#forgot_password_portion").css('display','none');
    $("#create_account_portion").css('display','none');
});
$('#sign-up-btn').click(function (e) {
    var name = $('#create_account_name').val();
    var email = $('#create_account_email').val();
    var pass = $('#create_account_password').val();
    var con = $('#create_account_confirm').val();
    var flag = false;
    if(name==''){
        $('.cname').text('Name required');
        flag = true;
    } else if(name.length <3){
        $('.cname').text("Name can not be smaller than 3 character ");
        flag = true;
    } else {
        $('.cname').text("");
    }
    if(pass==''){
        $('.cpass').text('Password required');
        flag = true;
    } else if(pass.length <6){
        $('.cpass').text("Password can not be smaller than 6 character ");
        flag = true;
    } else {
        $('.cpass').text("");
    }
    if(con !== pass){
        $('.cconp').text('Password and confirm password did not match.');
        flag = true;
    } else {
        $('.cconp').text('');
    }
    if(email==''){
        $('.cemail').text('Name required');
        flag = true;
    } else if(!validateEmail(email)){
        $('.cemail').text('Input is not an email.');
        flag = true;
    } else {
        $('.cemail').text('');
    }
    if(flag){
        e.preventDefault();
    }
});

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}