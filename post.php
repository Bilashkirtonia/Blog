
<?php include"php/header.php"?>
<?php include"php/nav.php"?>

<?php 
    $db = new Database();
    $time = new Formate();
    if(!isset($_GET['id'])|| $_GET['id'] == null){
      header('Location:index.php');
    }else{
    $url = $_GET['id'];
    }
    $query = "select * from post where id = $url";
    $result = $db->select($query);
    
?>

<section class="py-5">
  <div class="row">
    <div class="col-lg-12">
      <div class="row ">
        <div class="col-lg-9">
          <!--Navbar-->
          <?php include"navbar.php"?>
          <?php
          while ($row =$result->fetch_assoc()) {
          ?>                          
         
          <div class="card">
      
            <div class="view overlay">
              <img class="card-img-top" src="image/<?php echo $row['image'];?>" alt="Card image cap">
              <!-- <a>
                <div class="mask rgba-white-slight"></div>
              </a> -->
            </div>

  <!-- Card content -->
            <div class="card-body elegant-color white-text rounded-bottom">

              <!-- Social shares button -->
              <a class="activator waves-effect mr-4"></a>
              <!-- Title -->
              <h4 class="card-title"><?php echo $row['title'] ?></h4>
              <hr class="hr-light">
              <p class="card-text white-text mb-4">Date: <?php echo $time->Date($row['date']) ?></p>
              <p class="card-text white-text mb-4">Author: <?php echo $row['author'] ?></p>
              <!-- Text -->
              <p class="card-text white-text mb-4">
              <?php echo $row['body'] ?>
              </p>
              <!-- Link -->
             

            </div>

          </div>
          <?php } ?>
          <!-- Card Dark -->
        </div>




<?php include"php/sider-menu.php"?>  
<?php include"php/footer-menu.php"?>
<!-- Footer -->
<?php include"php/footer.php"?>