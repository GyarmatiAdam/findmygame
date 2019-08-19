// onclick the user will be registered
function submitreg() {
    var form = document.getElementById('reg');
    if(form.first_name.value == ""){
    alert( "Enter first name." );
    return false;
    }
    else if(form.last_name.value == ""){
    alert( "Enter last name." );
    return false;
    }
    else if(form.username.value == ""){
    alert( "Enter username." );
    return false;
    }
    else if(form.dob.value == ""){
    alert( "Enter date of borth." );
    return false;
    }
    else if(form.pass.value == ""){
    alert( "Enter password." );
    return false;
    }
    else if(form.email.value == ""){
    alert( "Enter email." );
    return false;
    }
}

// on submit user can login either with username or with email
function submitlogin() {
    var form = document.getElementById('login');
    if(form.email.value == ""){
        alert( "Enter email." );
        return false;
    }
    else if(form.password.value == ""){
        alert( "Enter password." );
        return false;
    }
}