function isPassword() {  
    var pw1 = document.getElementById("psw").value;

    if(pw1 !== ""){
            document.getElementById("submitButton").className = "btn btn-primary"; 
        } else{
            document.getElementById("submitButton").className = "btn btn-primary disabled"; 
        }  
}

// kinda not needed really