function upload() {
    //get items values
    var user=document.getElementById('user').value;
    var titel=document.getElementById('titel').value;
    var discription=document.getElementById('discription').value;
    var pin=document.getElementById('pin').value;
    var price=document.getElementById('price').value;
    var wilaya=document.getElementById('wilaya').value;
    var type=document.getElementById('type').value;
    //get your select image
    var image=document.getElementById("image").files[0];
    if(user){
       if(titel){
       if(discription){
          if(pin){
           if(price){
              if(wilaya){
               if(type){
                  if(image){
                   
                      
                      //now get your image name
    var imageName=image.name;
    //firebase  storage reference
    //it is the path where yyour image will store
    var storageRef=firebase.storage().ref('images/'+imageName);
    //upload image to selected storage reference

    var uploadTask=storageRef.put(image);

    uploadTask.on('state_changed',function (snapshot) {
        //observe state change events such as progress , pause ,resume
        //get task progress by including the number of bytes uploaded and total
        //number of bytes
        var progress=(snapshot.bytesTransferred/snapshot.totalBytes)*100;
        console.log("upload is " + progress +" done");
    },function (error) {
        //handle error here
        console.log(error.message);
        if(error){var err = document.getElementById("error");
         err.style.display = "block";}
        
    },function () {
       //handle successful uploads on complete

        uploadTask.snapshot.ref.getDownloadURL().then(function (downlaodURL) {
             //get your upload image url here...
            var ppurl= downlaodURL;
            //
            $.ajax({
                url: 'Upost.php',
                method: 'post',
                data: {ppurl:ppurl,user:user,titel:titel,discription:discription,pin:pin,price:price,wilaya:wilaya,type:type},
                success:function(response){
                  if (ppurl) {
    // variable is undefined or null
            var secc = document.getElementById("seccess");
         secc.style.display = "block"; 
                location.reload();
}
                    
                }
            });
           
            console.log(downlaodURL);
            if (ppurl) {
    // variable is undefined or null
            var secc = document.getElementById("seccess");
         secc.style.display = "block"; 
                location.reload();
}
           
        });
    });
                      
                      
               }else{var err = document.getElementById("error");
         err.style.display = "block"; }
                  }else{var err = document.getElementById("error");
         err.style.display = "block";}
           }else{var err = document.getElementById("error");
         err.style.display = "block";}
              }else{var err = document.getElementById("error");
         err.style.display = "block";}
       }else{var err = document.getElementById("error");
         err.style.display = "block";}
          }else{var err = document.getElementById("error");
         err.style.display = "block";}
    }else{var err = document.getElementById("error");
         err.style.display = "block";}
}else{var err = document.getElementById("error");
         err.style.display = "block";}
    
}