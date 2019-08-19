//create event submit function
function submitevent() {
    var form = document.getElementById('addevent');
    if(form.value == ""){
        return false;
    }
}

//add new admin submit function
function submitadminreg() {
    var form = document.getElementById('regadmin');
    if(form.value == ""){
        return false;
    }
}

//add new category function
function submitcategory() {
    var form = document.getElementById('addcategory');
        if(form.value == ""){
        return false;
    }
}
