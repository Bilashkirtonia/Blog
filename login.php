<?php include"database/session.php";
    Session::checklogin();
?> 
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
        $password = $time->validation(md5($_POST['password']));
        $username = mysqli_real_escape_string($db->link,$username);
        $password = mysqli_real_escape_string($db->link,$password);
        $query = "SELECT * FROM user WHERE username = '$username' AND password ='$password'";
        $value = $db->select($query);
        if($value != false){
            $result = mysqli_fetch_assoc($value);
            $row = mysqli_num_rows($value);

            if($row > 0){
                Session::set('login',true);
                Session::set('username',$result['username']);
                Session::set('userId',$result['id']);
                Session::set('userRole',$result['role']);
                
                    if(Session::get('userRole' == '0')){
                        header('Location:Admin/index.php');
                    }elseif(Session::get('userRole' == '1')){
                        header('Location:Admin/index.php');
                    }else{
                        header('Location:index.php');
                    }
                }else{
                    echo "no result found";
                }

            }else{
                header('Location:login.php');
            }

    }

?>



                <form action="login.php" method="post" class="text-center border border-light p-5 m-auto bg-light" action="#!">

                <p class="h4 mb-4">Sign in</p>

                <!-- Email -->
                <input type="text" name="username" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

                <!-- Password -->
                <input type="password" name="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Password">

                <div class="d-flex justify-content-around">
                    <div>
                        <!-- Remember me -->
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                            <label class="custom-control-label" for="defaultLoginFormRemember">Remember me</label>
                        </div>
                    </div>
                    <div>
                        <!-- Forgot password -->
                        <a href="">Forgot password?</a>
                    </div>
                </div>

                <!-- Sign in button -->
                <button class="btn btn-info btn-block my-4" type="submit">Sign in</button>

                <!-- Register -->
                <p>Not a member?
                    <a href="">Register</a>
                </p>

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