
<?php include"php/header.php"?>
<?php include"php/nav.php";
$db = new Database();
$time = new Formate();
?>

<div id="carousel-example-2" class="carousel slide carousel-fade px-0" data-ride="carousel">
    <!--Indicators-->
    <ol class="carousel-indicators">
      <li data-target="#carousel-example-2" data-slide-to="0" class="active"></li>
      <li data-target="#carousel-example-2" data-slide-to="1"></li>
      <li data-target="#carousel-example-2" data-slide-to="2"></li>
    </ol>
    <!--/.Indicators-->
    <!--Slides-->
    
    <div class="carousel-inner" role="listbox">
      <?php 
      $query = "SELECT * FROM slider ORDER BY id DESC";
      $result = $db->select($query);
      $v = 0;
      
        foreach($result as $result){
          $active = '';
          if($v == 0){
            $active = 'active';
          }
      ?>
      <div class="carousel-item <?php echo $active;?> ">
        <div class="view">
          <img style="height: 90vh; object-fit: cover;" class="d-block w-100" src="image/<?php echo $result['image_name'];?>"
            alt="First slide">
          <div class="mask rgba-black-light"></div>
        </div>
        
        <div class="carousel-caption">
          <h3 class="h3-responsive">Light mask</h3>
          <p>First text</p>
        </div>
        
      </div>
      <?php 
         $v++; }
        ?>
    </div>
    
    <!--/.Slides-->
    <!--Controls-->
    <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    <!--/.Controls-->
</div>
<?php include"php/main.php"?> 




      
<?php include"php/sider-menu.php"?>         
<!-- Footer -->
<?php include"php/footer-menu.php"?>
<!-- Footer -->
<?php include"php/footer.php"?>
