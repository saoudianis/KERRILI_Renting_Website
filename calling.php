<form action="" id="call">
   <label for="pass">username</label><input type="text" id="username"  name="username" min="4"><br>
   
    <label for="email">email</label><input type="email" id="email"  name="email"><br>
    
    <label for="phone">phone</label><input type="text" id="phone"  name="phone"><br>
    
     <label for="pass">Password</label><input type="password" id="Password"  name="pass"><br>
     
   <input type="button" onclick="call();" value="call">
    
</form>


    <!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<script>
    function call() {
var username = document.getElementById("username").value;
var email = document.getElementById("email").value;
var password = document.getElementById("Password").value;
var phone = document.getElementById("phone").value;

 $.ajax({
                url: 'PushData.php',
                method: 'post',
                data: {username:username,email:email,password:password,phone:phone},
                success:function(response){
                   $("#message").html(response);
                    window.scrollTo(0,0);
                    
                }
            });}
</script>