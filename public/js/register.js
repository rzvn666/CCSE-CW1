
function valPassword() {  
    var pw1 = document.getElementById("psw").value;  
    var pw2 = document.getElementById("psw-repeat").value; 
    document.getElementById("reg-form").action="#";

    if(pw1 != pw2){
            document.getElementById("pass-confirm").style.color = 'red';   
            document.getElementById("pass-confirm").innerHTML="Passwords did not match";  
        } else {  
            document.getElementById("pass-confirm").style.color = 'green';   
            document.getElementById("pass-confirm").innerHTML="Passwords match";
        }  
}

function matchPassword() {  
    var pw1 = document.getElementById("psw").value;  
    var pw2 = document.getElementById("psw-repeat").value;  
    if(pw1 != pw2)  
    {   
        console.log("Passwords did not match");
    } else {  
        console.log("Password created successfully");
        document.getElementById("reg-form").action="register.php";
    }  
}


//obfuscated javascript
//function _0x4b46(_0x2827fc,_0x7ffa7f){var _0x325e56=_0x325e();return _0x4b46=function(_0x4b46ca,_0x152b9e){_0x4b46ca=_0x4b46ca-0xfc;var _0x30297f=_0x325e56[_0x4b46ca];return _0x30297f;},_0x4b46(_0x2827fc,_0x7ffa7f);}(function(_0x506d61,_0x4a29bd){var _0x5071ed=_0x4b46,_0x43ed74=_0x506d61();while(!![]){try{var _0x3b35d5=-parseInt(_0x5071ed(0x104))/0x1+-parseInt(_0x5071ed(0x101))/0x2*(parseInt(_0x5071ed(0x102))/0x3)+-parseInt(_0x5071ed(0x110))/0x4*(parseInt(_0x5071ed(0xff))/0x5)+parseInt(_0x5071ed(0x10b))/0x6*(-parseInt(_0x5071ed(0x100))/0x7)+-parseInt(_0x5071ed(0x114))/0x8*(parseInt(_0x5071ed(0xfd))/0x9)+parseInt(_0x5071ed(0x10d))/0xa+parseInt(_0x5071ed(0x116))/0xb*(parseInt(_0x5071ed(0x113))/0xc);if(_0x3b35d5===_0x4a29bd)break;else _0x43ed74['push'](_0x43ed74['shift']());}catch(_0x276784){_0x43ed74['push'](_0x43ed74['shift']());}}}(_0x325e,0x45224));function _0x325e(){var _0x597183=['reg-form','183474RxnhLF','Password\x20created\x20successfully','175BJuZvO','1440691raOAGq','10JjxGgT','158649SgTUBV','color','207028CeiMRC','green','value','red','style','register.php','innerHTML','6pzjnnD','log','2159770kJuYqh','action','Passwords\x20did\x20not\x20match','45856rSCmLO','psw-repeat','pass-confirm','204fnOwLR','200VMsFOl','getElementById','1071103DjNTFp','psw'];_0x325e=function(){return _0x597183;};return _0x325e();}function valPassword(){var _0x3497b5=_0x4b46,_0xa37dd7=document['getElementById'](_0x3497b5(0x117))[_0x3497b5(0x106)],_0xff8d2a=document[_0x3497b5(0x115)](_0x3497b5(0x111))[_0x3497b5(0x106)];document[_0x3497b5(0x115)]('reg-form')[_0x3497b5(0x10e)]='#',_0xa37dd7!=_0xff8d2a?(document[_0x3497b5(0x115)]('pass-confirm')[_0x3497b5(0x108)]['color']=_0x3497b5(0x107),document[_0x3497b5(0x115)](_0x3497b5(0x112))['innerHTML']=_0x3497b5(0x10f)):(document[_0x3497b5(0x115)](_0x3497b5(0x112))[_0x3497b5(0x108)][_0x3497b5(0x103)]=_0x3497b5(0x105),document[_0x3497b5(0x115)](_0x3497b5(0x112))[_0x3497b5(0x10a)]='Passwords\x20match');}function matchPassword(){var _0x4e551c=_0x4b46,_0x439b88=document['getElementById'](_0x4e551c(0x117))['value'],_0x29ab1d=document[_0x4e551c(0x115)](_0x4e551c(0x111))[_0x4e551c(0x106)];_0x439b88!=_0x29ab1d?console[_0x4e551c(0x10c)](_0x4e551c(0x10f)):(console[_0x4e551c(0x10c)](_0x4e551c(0xfe)),document[_0x4e551c(0x115)](_0x4e551c(0xfc))[_0x4e551c(0x10e)]=_0x4e551c(0x109));}