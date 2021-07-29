<?php
session_start();
if(isset( $_SESSION['id']))echo  $_SESSION['id'];

?>
<script>

 /*window.location = 'http://localhost/kerrili/login.php';
    
    fbpost(user);
    
    document.getElementById("fb-up").addEventListener("click", signin);
function fbpost() { 
        
        
        var email = user.email;
    var username = user.displayName;
    var profilepic = user.photoURL;
        
        
        $.ajax({
                url: 'PushData.php',
                method: 'post',
                data: {username:username,email:email,profilepic:profilepic},
                success:function(response){
                   $("#message").html(response);
                    window.scrollTo(0,0);
                    
                }
            });}
*/
</script>