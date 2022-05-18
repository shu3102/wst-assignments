<?php
    ob_start();
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: /instagram/signup.php");
    };
    $host = "localhost";
    $user = "root";
    $password = "";
    $db = "wst";
    $conn = new mysqli($host, $user, $password, $db);
    if ($conn -> connect_errno) {
        echo "Failed to connect to MySQL: " . $conn -> connect_error;
        exit();
    }
    $conn->select_db("info");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $bio = $_POST['bio'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $country = $_POST['country'];
    $edu = $_POST['edu'];
    $skills = $_POST['skills'];
    $interest = $_POST['interest'];
    $upvote = $_POST['upvote'];
    $downvote = $_POST['downvote'];

    $fetch_data = "SELECT * FROM info ORDER BY upvote DESC";
    $profiles = $conn->query($fetch_data);
    if($profiles->num_rows == 0){
        echo "No Profiles !!!";
        exit();
    }
    // echo "$profiles->num_rows";
?>


<html>
    <head>
        <title>
            Profiles
        </title>
        <style>
            html {
            margin: 0px;
            height: 100%;
            width: 100%;
            }

            body {
            margin: 0px;
            min-height: 100%;
            width: 100%;
            }
            #card{
                background-color: rgb(242, 242, 242);
                padding: 20px;
                border-radius: 5px;
                box-shadow: 20px 20px;
                margin-bottom: 50px;
                margin-top: 50px;
            }
            #image{
                max-width: 200px;
                border-radius: 200px;
                margin-top: 20%;
                text-align: center;
            }
        </style>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
    <?php include "navbar.php" ?>
    <div class="row">
	<div class="col-md-3"></div>
	<div class="col-md-6">
		<?php while ($row = $profiles->fetch_row()) {?>
			<div class="row" id="card">
				<div class="col-md-4"> <img id="image" src="<?php echo $row[3]?>" height="200px" width="200px"> </div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-6"> <b> Username:  </b><span><?php printf("%s", $row[2]); ?></span>
							<br> <b> Name:  </b><span><?php printf("%s", $row[0]); ?></span>
							<br> <b> E-mail:  </b> <span><?php printf("%s", $row[1]); ?></span>
							<br> <b> Phone:  </b> <span><?php printf("%s", $row[4]); ?></span>
							<br> </div>
						<div class="col-md-6"> <b> City:  </b><span><?php printf("%s", $row[6]); ?></span>
							<br> <b> State:</b><span><?php printf("%s", $row[7]); ?></span>
							<br> <b> Country:</b><span><?php printf("%s", $row[8]); ?></span>
							<br> <b> Education:  </b><span><?php printf("%s", $row[9]); ?></span>
							<br> </div> <b> About Me:  </b>
						<div>
							<?php printf("%s", $row[5]); ?>
						</div> <b> Skills:  </b>
						<div>
							<?php printf("%s", $row[10]); ?>
						</div> <b> Interest:  </b>
						<div>
							<?php printf("%s", $row[11]); ?>
        </div> <b> Likes:  </b>
						<span>
							<?php printf("%s", $row[13]); ?>
						</span> <b> Dislikes:  </b>
						<span>
							<?php printf("%s", $row[14]); ?>
						</span>
						<form action="/instagram/vote.php" id="vote" name="vote" method="post">
							<button type="submit" class="btn btn-success" name="upvote" value="<?php echo $row[12] ?>" id="upvote">Like</button>
							<button type="submit" class="btn btn-danger" name="downvote" value="<?php echo $row[12] ?>" id="downvote">Dislike</button>
						</form>
                        <form action="/instagram/profile.php" id="_profile" method="post">
                            <button href="/instagram/profile.php" type="submit" class="btn btn-primary w-50" name="profile" value="<?php echo $row[12] ?>" id="profile">View Profile</button>
                        </form>
					</div>
				</div>
                </div>
                        <?php }; ?>
                    </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </body>    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#upvote").click(function(){
                $.ajax({
                    url: $("#vote").attr("action"),
                    type: "post",
                    data: $("#upvote").attr('value')
                })
            })
            $("#downvote").click(function(){
                $.ajax({
                    url: $("#vote").attr("action"),
                    type: "post",
                    data: $("#downvote").attr('value')
                })
            })
            $("#profile").click(function(){
                $.ajax({
                    url: $("#_profile").attr("action"),
                    type: "post",
                    data: $("#profile").attr('value')
                })
            })
        })
    </script>   
</html>
