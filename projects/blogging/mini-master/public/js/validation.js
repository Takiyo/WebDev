function comparePasswords(){

    var pw = document.getElementById("password").value;
    var pw2 = document.getElementById("password2").value;

    if (pw !== pw2){
        document.getElementById("passError").style.display = "block";
        event.preventDefault();
        return false;
    } else if (pw === pw2){
        document.getElementById("passError").style.display = "none";
        return true;
    }
}

function validateUsername(){
    var un = document.getElementById("username").value;
    var noSpecialsOrSpaces = /^[_A-z0-9]*((-|\s)*[_A-z0-9])*$/;
    if (!noSpecialsOrSpaces.test(un)){
        document.getElementById("usernameSpecialError").style.display = "block";
        event.preventDefault();
        return false;
    } else{
        document.getElementById("usernameSpecialError").style.display = "none";
        return true;
    }
}

//function isValid(str){
//    return !/[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/g.test(str);
//}