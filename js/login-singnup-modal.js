function signupUserToggle(){
    var container = document.querySelector('.container');
    container.classList.toggle('active');

    var popup2 = document.querySelector('.signup-form-user');
    popup2.classList.toggle('active');
}

function signupCompanyToggle(){
    var container = document.querySelector('.container');
    container.classList.toggle('active');

    var popup = document.querySelector('.signup-form-company');
    popup.classList.toggle('active');
}

function loginToggle(){
    var container = document.querySelector('.container');
    container.classList.toggle('active');
    
    var popup = document.querySelector('.login-form');
    popup.classList.toggle('active');
}