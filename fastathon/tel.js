function imblur1(){
var contactPers = document.getElementById('contactPers').value;
    if(contactPers==''){
    document.getElementById('contactPers').className = "weve";
    }  
    else{document.getElementById('contactPers').className = "sdf";} 
}
function imblur2(){
var contactPers2 = document.getElementById('contactPers2').value;
    if(contactPers2==''){
    document.getElementById('contactPers2').className = "weve";
    }  
    else{document.getElementById('contactPers2').className = "sdf";} 
}
function imblur3(){
var emailAddres = document.getElementById('emailAddres').value;
    if(emailAddres==''){
    document.getElementById('emailAddres').className = "weve";
    }
    else{document.getElementById('emailAddres').className = "sdf";}
}
function imblur4(){
var phone = document.getElementById('phoneNum').value;
    if(phone==''){
    document.getElementById('phoneNum').className = "weve";
    }
    else{document.getElementById('phoneNum').className = "sdf";}
}

function downlload(){
document.getElementById('downloadDoc').style.display="none";
document.getElementById('registrationForm').style.display="block";
window.location.hash='#downloaded';
}
