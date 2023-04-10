function passcheck(){
    var pass = document.getElementById("password").value;
    var pass1 = document.getElementById("con_password").value;
    var passmsg = "**Password is not matching";

    if (pass != pass1){
        document.getElementById("ver").innerHTML = passmsg;
        return false;
    }

}