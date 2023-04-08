function passcheck(){
    var pass = document.getElementById("password").value;
    var pass1 = document.getElementById("con_password").value;
    var text = "**Password is not matching";

    if (pass != pass1){
        document.getElementById("ver").innerHTML = text;
        return false;
    }

}