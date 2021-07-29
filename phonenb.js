window.onload=function () {
  render();
};
function render() {
    window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}
function aff() {
        var all = document.getElementById("row1");
        all.style.display = "none";
        var x = document.getElementById("veri");
         x.style.display = "block";
        
    }
function phoneAuth() {
    var number=document.getElementById('number').value;
    var password = document.getElementById("password").value;
      var username = document.getElementById("username").value;
var email = document.getElementById("email").value; 
     if(number !== null && number !== ''){
        if(password !== null && password !== ''){
         if(username !== null && username !== ''){
            if(email !== null && email !== ''){
                //remade number
     st = number.substring(0, 2);
 if((st==07)||(st==05)||(st==06)){
   if(number.toString().length==10){ 
       number = (number * 1).toString();
    number="+213"+number; 
    
  
     //phone number authentication function of firebase
    //it takes two parameter first one is number,,,second one is recaptcha
    firebase.auth().signInWithPhoneNumber(number,window.recaptchaVerifier).then(function (confirmationResult) {
        //s is in lowercase
        window.confirmationResult=confirmationResult;
        coderesult=confirmationResult;
        console.log(coderesult);
        alert("Message sent");
        aff();
    }).catch(function (error) {
        alert(error.message);
    });                           
}}
         }else{var err = document.getElementById("error");
         err.style.display = "block";}
            }else{var err = document.getElementById("error");
         err.style.display = "block";}
     }else{var err = document.getElementById("error");
         err.style.display = "block";}
        }else{var err = document.getElementById("error");
         err.style.display = "block";}
 
  
  
}

function post() { 
        
       var number=document.getElementById('number').value;
    var password = document.getElementById("password").value;
      var username = document.getElementById("username").value;
var email = document.getElementById("email").value;  
        
        
        
        $.ajax({
                url: 'PushData.php',
                method: 'post',
                data: {username:username,email:email,password:password,number:number},
                success:function(response){
                   $("#message").html(response);
                    window.scrollTo(0,0);
                    
                }
            });}

document.getElementById("verify").addEventListener("click", codeverify);

function codeverify() {
    var code=document.getElementById('verificationCode').value;
    coderesult.confirm(code).then(function (result) {
        alert("Successfully registered");
        var user=result.user;
        console.log(user);
        post();
        window.location = 'http://localhost/kerrili/login.php';
    }).catch(function (error) {
        alert(error.message);
    });
}