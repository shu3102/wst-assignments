<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <body>
    <?php include "navbar.php" ?>
        <div class="row m-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="btn btn-primary w-100 m-3">Sign Up Form</div>
                <form id = "signup" action="/instagram/signup_action.php" method="post">
                    <input type="text" name="email" value="E-Mail" class="w-100 m-3 p-2 text-center text-secondary" onfocus="this.value=''"><br>
                    <input type="text" name="username" value="Username" class="w-100 m-3 p-2 text-center text-secondary" onfocus="this.value=''"><br>
                    <input type="password" name="password" value="Password" class="w-100 m-3 p-2 text-center text-secondary" onfocus="this.value=''"><br>
                    <input type="submit" value="Signup" class="btn btn-primary w-100 m-3">
                </form>
                <div class="text-center">Already have an account? <a href="/instagram//login.php">Login</a></div>
            </div>
            <div class="col-md-4"></div>
            
        </div>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                var form = $("#signup");
                $("#submit").click(function(){
                    $.ajax({
                        url: form.attr("action"),
                        type: "post",
                        data: $("#signup input").serialize()
                    })
                })
            })
        </script> 
    </body>
</html>