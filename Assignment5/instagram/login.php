<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <body>
        <?php include "navbar.php" ?>
        <div class="row m-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="btn btn-warning w-100 m-3">Log In Form</div>
                <form action="/instagram/login_action.php" method="post" id = "login">
                    <input type="text" name="username" value="Username" class="w-100 m-3 p-2 text-center text-secondary" onfocus="this.value=''"><br>
                    <input type="password" name="password" value="Password" class="w-100 m-3 p-2 text-center text-secondary" onfocus="this.value=''"><br>
                    <input type="submit" value="Login" id = "submit" class="btn btn-primary w-100 m-3">
                </form>
                <div class="text-center">Don't have an account? <a href="/instagram/signup.php">Signup</a></div>
                </div>
            <div class="col-md-4"></div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                var form = $("#login");
                $("#submit").click(function(){
                    $.ajax({
                        url: form.attr("action"),
                        type: "post",
                        data: $("#login input").serialize()+"&college=coep"
                    })
                })
            })
        </script> 
    </body>
</html>