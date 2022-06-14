
<?php include"php/header.php"?>
<?php include"php/nav.php"?>
<section class="py-5">
  <div class="row">
    <div class="col-lg-12">
      <div class="row ">
        <div class="col-lg-9">
          <!--Navbar-->
          <?php include"navbar.php";?>

          <?php

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $f_name = $_POST['f_name'];
    $l_name = $_POST['l_name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $f_name =$time->validation($f_name);
    $l_name =$time->validation($l_name);
    $email =$time->validation($email);
    $message =$time->validation($message);

    $f_name = mysqli_real_escape_string($db->link , $f_name);
    $l_name  = mysqli_real_escape_string($db->link , $l_name );      
    $email = mysqli_real_escape_string($db->link , $email);
    $message = mysqli_real_escape_string($db->link , $message);
    
    
    

    if($f_name == '' ||$l_name == '' ||$email == '' || $message == ''){
        echo"Can't add now";
    }else{

            $query = "INSERT INTO  contact(f_name,l_name,email,message,status)
            VALUES('$f_name','$l_name','$email','$message','1')";
            $insert = $db->insert($query);
        
            if($insert){
                echo"Data insert successfully";
                //header("Location:add_post.php");
            }else{
                echo"Data not insert successfully";
                //header("Location:add_post.php");
            }
        }
       

        
        
    }



?>



<section class="mb-4 p-5">

<!--Section heading-->
<h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>
<!--Section description-->
<p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
    a matter of hours to help you.</p>

<div class="row">

    <!--Grid column-->
    <div class="col-md-9 mb-md-0 mb-5">
        <form id="contact-form" name="contact-form" action="" method="POST">

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="name" name="f_name" class="form-control">
                        <label for="name" class="">Your name</label>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="md-form mb-0">
                        <input type="text" id="name" name="l_name" class="form-control">
                        <label for="name" class="">Last name</label>
                    </div>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                
                <!--Grid column-->

            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">
                <div class="col-md-12">
                    <div class="md-form mb-0">
                        <input type="text" id="email" name="email" class="form-control">
                        <label for="email" class="">Your email</label>
                    </div>
                </div>
            </div>
            <!--Grid row-->

            <!--Grid row-->
            <div class="row">

                <!--Grid column-->
                <div class="col-md-12">

                    <div class="md-form">
                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                        <label for="message">Your message</label>
                    </div>

                </div>
            </div>
            <!--Grid row-->

        </form>

        <div class="text-center text-md-left">
            <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
        </div>
        <div class="status"></div>
    </div>
    <!--Grid column-->

    <!--Grid column-->
    <div class="col-md-3 text-center">
        <ul class="list-unstyled mb-0">
            <li><i class="fas fa-map-marker-alt fa-2x"></i>
                <p>San Francisco, CA 94126, USA</p>
            </li>

            <li><i class="fas fa-phone mt-4 fa-2x"></i>
                <p>+ 01 234 567 89</p>
            </li>

            <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                <p>contact@mdbootstrap.com</p>
            </li>
        </ul>
    </div>
    <!--Grid column-->

</div>

</section>
<!--Section: Contact v.2-->
          
          
          
        </div>





















<?php include"php/sider-menu.php"?>  
<?php include"php/footer-menu.php"?>
<!-- Footer -->
<?php include"php/footer.php"?>