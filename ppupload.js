function upload() {
    //get your select image
    var image=document.getElementById("image").files[0];
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
                url: 'updatepp.php',
                method: 'post',
                data: {ppurl:ppurl},
                success:function(response){
                  var secc = document.getElementById("seccess");
         secc.style.display = 'inline-block';
                    
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
}