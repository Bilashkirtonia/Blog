<?php include"database/databases.php"?> 
<?php include"database/dataconfig.php"?>
<?php include"formate/formateFunction.php";
     $db = new Database();
     $time = new Formate();

?> 
<?php include"php/header.php"?>
    <div class="row">
        <div class="col mt-5">
            <div class="d-flex ">
                
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $username = $time->validation(($_POST['username']));
        $email = $time->validation(($_POST['email']));
        $password = $time->validation(md5($_POST['password']));
        $cpassword = $time->validation(md5($_POST['cpassword']));
        if($password === $cpassword){
            $username = mysqli_real_escape_string($db->link,$username);
            $email = mysqli_real_escape_string($db->link,$email);
            $password = mysqli_real_escape_string($db->link,$password);
            
            $query = "INSERT INTO user (username,password,email,role) VALUES('$username','$password','$email','1')";
            $value = $db->insert($query);
            header("Location:login.php");
        }else{
            echo"Password dosen,t match";
        }
        
                    
    }

?>



                <form action="" method="post" class="text-center border border-light p-5 m-auto bg-light" action="post">

                <p class="h4 mb-4">Sign in</p>

                <!-- Email -->
                <input type="text" name="username" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="User name">
                <input type="email" name="email" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Email">
                <input type="password" name="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">
                <input type="password" name="cpassword" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Conform Password">

                <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

               
                <!-- Social login -->
                <p>or sign in with:</p>

                <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f light-blue-text"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-twitter light-blue-text"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in light-blue-text"></i></a>
                <a href="#" class="mx-2" role="button"><i class="fab fa-github light-blue-text"></i></a>

                </form>

            </div>
        </div>
    </div>

<?php include"php/footer.php"?>