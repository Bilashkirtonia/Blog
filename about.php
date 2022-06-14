
<?php include"php/header.php"?>
<?php include"php/nav.php"?>


<?php 
$db = new Database();
$time = new Formate();

?>
<section class="py-5">
  <div class="row">
    <div class="col-lg-12">
      <div class="row ">
        <div class="col-lg-9">
          <!--Navbar-->
            
          <?php include"navbar.php";
          
          ?>
          <div class="card">
           
          
          </div>
          
          <div class="card">

            <!-- Card image -->
          <?php 
          
          if(!isset($_GET['page'])|| $_GET['page'] == null){
            header('Location:index.php');
          }else{
            $db = new Database();
            $page = $_GET['page'];

            $e_query = "select * from pages where id = $page order by id desc";
            $e_ersult = $db->select($e_query);
            while($row = $e_ersult->fetch_assoc()){ 
            ?> 

  
            <div class="card-body elegant-color white-text rounded-bottom">

              <!-- Social shares button -->
              <a class="activator waves-effect mr-4"></a>
              <!-- Title -->
              <h4 class="card-title"><?php echo $row['title'];?></h4>
              <hr class="hr-light">
              <!-- Text -->
              <p class="card-text white-text mb-4"><?php echo $row['body'];?></p>
              <!-- Link -->
              <a href="#!" class="white-text d-flex justify-content-end">
                
              </a>

            </div>
            <?php 
             }}
            ?> 

          </div>
          <!-- Card Dark -->
        </div>





















<?php include"php/sider-menu.php"?>  
<?php include"php/footer-menu.php"?>

<?php include"php/footer.php"?>