<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: /instagram/login.php");
    }
?>
<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <body>
    <?php include "navbar.php" ?>
        <div class="row m-5">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="btn btn-warning w-100 m-2">Enter Details :</div>
                <form action="/instagram/form_handler.php" method="post" id = "form" class="text-center">
                <div class="form-group">    
                    <input type="text" name="name" id="name" class="form-control w-100 m-2 p-2 text-center text-secondary" onfocus="this.value=''" value="Name">
                </div>
                <div class="form-group"> 
                    <input type="text" name="email" id="email" class="form-control w-100 m-2 p-2 text-center text-secondary" onfocus="this.value=''" value="E-mail">
                    </div>
                <div class="form-group"> 
                    <input type="text" name="username" id="username" class="form-control w-100 m-2 p-2 text-center text-secondary" onfocus="this.value=''" value="Username">
                    </div>
                <div class="form-group">     
                    <input type="text" name="image" id="image" class="form-control w-100 m-2 p-2 text-center text-secondary" onfocus="this.value=''" value="Image Link">
                    </div>
                <div class="form-group"> 
                    <input type="text" name="phone" id="phone" class="form-control w-100 m-2 p-2 text-center text-secondary" onfocus="this.value=''" value="Phone Number">
                    </div>
                <div class="form-group"> 
                    <textarea name="bio" id="bio" rows="4" class="form-control w-100 m-2 p-2 text-center text-secondary" onfocus="this.value=''">About Youself</textarea>
                </div>
                <div class="form-group"> 
                    <input type="text" name="city" id="city" class="form-control w-100 m-2 p-2 text-center text-secondary" onfocus="this.value=''" value="City">
                </div>
                <div class="form-group">     
                    <input type="text" name="state" id="state" class="form-control w-100 m-2 p-2 text-center text-secondary" onfocus="this.value=''" value="State">
                </div>
                <div class="form-group">
                    <input type="text" name="country" id="country" class="form-control w-100 m-2 p-2 text-center text-secondary" onfocus="this.value=''" value="Country">
                </div>
                <div class="form-group"> 
                    <input type="text" name="edu" id="edu" class="form-control w-100 m-2 p-2 text-center text-secondary" onfocus="this.value=''" value="Highest Education">
                </div>
                <div class="form-group"> 
                    <textarea name="skills" id="skills" rows="4" class="form-control w-100 m-2 p-2 text-center text-secondary" onfocus="this.value=''">Skills</textarea>
                    </div>
                <div class="form-group"> 
                    <textarea name="interest" id="interest" rows="4" class="form-control w-100 m-2 p-2 text-center text-secondary" onfocus="this.value=''">Interest</textarea>
                </div>
                    <input type="submit" name="submit" class="w-20 btn btn-success text-center">
                    <input type="reset" class="w-20 btn btn-danger text-center">
                </form>
                </div>
            <div class="col-md-4"></div>
        </div>
    </body>
    <script src="https://cdn.rawgit.com/PascaleBeier/bootstrap-validate/v2.2.5/dist/bootstrap-validate.js" ></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                var form = $("#form");
                $("#submit").click(function(){
                    $.ajax({
                        url: form.attr("action"),
                        type: "post",
                        data: $("#form input, textarea").serialize()
                    })
                })
            })
        </script> 
        <script>
            bootstrapValidate("#name", "required:Please fill out this field");
            bootstrapValidate("#email", "required:Please fill out this field");
            bootstrapValidate("#email", "email:Enter valid email");
            bootstrapValidate("#image", "required:Please fill out this field");
            bootstrapValidate("#image", "url:Enter valid url");
            bootstrapValidate("#phone", "required:Please fill out this field");
            bootstrapValidate("#phone", "numeric:Enter valid phone number");
            bootstrapValidate("#phone", "max:10:Enter 10 digit number");
            bootstrapValidate("#phone", "min:10:Enter 10 digit number");
            bootstrapValidate("#bio", "required:Please fill out this field");
            bootstrapValidate("#city", "required:Please fill out this field");
            bootstrapValidate("#state", "required:Please fill out this field");
            bootstrapValidate("#country", "required:Please fill out this field");
            bootstrapValidate("#edu", "required:Please fill out this field");
            bootstrapValidate("#skills", "required:Please fill out this field");
            bootstrapValidate("#interest", "required:Please fill out this field");
        </script>
</html>