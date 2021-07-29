function signin(){
    //pop-up 
  var provider = new firebase.auth.FacebookAuthProvider();
    //scopes is what kind of information you want to access
    provider.addScope('user_birthday');
    //use the user device language
    firebase.auth().useDeviceLanguage();
    
    //signUp pop
    
    firebase
  .auth()
  .signInWithPopup(provider)
  .then((result) => {
    /** @type {firebase.auth.OAuthCredential} */
    var credential = result.credential;

    // The signed-Up user info.
    var user = result.user;
    var email = user.email;
    var username = user.displayName;
    var profilepic = user.photoURL;
        $.ajax({
            //pass the user info to php ...
                url: 'PushData.php',
                method: 'post',
                data: {username:username,email:email,profilepic:profilepic},
                success:function(response){
                   $("#message").html(response);
                    window.scrollTo(0,0);
                    
                }
            });
     
        
        
    // This gives you a Facebook Access Token. You can use it to access the Facebook API.
    var accessToken = credential.accessToken;

    // ...
       
  })
  .catch((error) => {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    // The email of the user's account used.
    var email = error.email;
    // The firebase.auth.AuthCredential type that was used.
    var credential = error.credential;

    // ...
  });
    
    
    
}

function signinDB(){
    
      //pop-up 
  var provider = new firebase.auth.FacebookAuthProvider();
    //scopes is what kind of information you want to access
    provider.addScope('user_birthday');
    //use the user device language
    firebase.auth().useDeviceLanguage();
    //signin pop
    firebase
  .auth()
  .signInWithPopup(provider)
  .then((result) => {
    /** @type {firebase.auth.OAuthCredential} */
    var credential = result.credential;

    // The signed-in user info.
    var user = result.user;
    var email = user.email;
    var signin = "signin";
        $.ajax({
                url: 'PushData.php',
                method: 'post',
                data: {email:email,signin:signin},
                success:function(response){
                   $("#message").html(response);
                    window.scrollTo(0,0);
                    
                }
            });
    window.location = 'http://localhost/kerrili/hometest.php';
     //pass the user info to php ...
        
        
    // This gives you a Facebook Access Token. You can use it to access the Facebook API.
    var accessToken = credential.accessToken;

    // ...
       
  })
  .catch((error) => {
    // Handle Errors here.
    var errorCode = error.code;
    var errorMessage = error.message;
    // The email of the user's account used.
    var email = error.email;
    // The firebase.auth.AuthCredential type that was used.
    var credential = error.credential;

    // ...
  });
    
    
}
