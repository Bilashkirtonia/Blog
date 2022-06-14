
<?php include"php/header.php"?>
<?php include"php/nav.php"?>

<?php 
    $db = new Database();
    $time = new Formate();
    if(!isset($_GET['id']) || $_GET['id'] == null){
      header('Location:404.php');
    }else{
    $url = $_GET['id'];
    }
    $query = "select * from post where cat = $url";
    $result1 = $db->select($query);
    
?>

<section class="py-5">
  <div class="row">
    <div class="col-lg-12">
      <div class="row ">
        <div class="col-lg-9">
        <?php include"navbar.php"?>
          <?php
          if($result1){

            while ($result = $result1->fetch_assoc()) {  ?>                          
         
         <div class="row">

<!-- Grid column -->
<div class="col-lg-5">

  <!-- Featured image -->
  <div class="view overlay rounded z-depth-2 mb-lg-0 mb-4">
   <img class="img-fluid" src="image/<?php echo $result['image'];?>" alt="Sample image">
    <a href="post.php?id=<?php echo $result['id']; ?>">
      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

</div>
<!-- Grid column -->
<!-- image/ -->
<!-- Grid column -->
<div class="col-lg-7">

  <!-- Category -->
  <a href="post.php?id=<?php echo $result['id']; ?>" class="green-text">
    <h6 class="font-weight-bold mb-3"><i class="fas fa-utensils pr-2"></i>Food</h6>
  </a>
  <!-- Post title -->
  <h3 class="font-weight-bold mb-3"><strong><?php echo $result['title']; ?></strong></h3>
  <!-- Excerpt -->
  <a href="post.php">
  <p><?php echo $time->read($result['body']);?>
  <p>by <a><strong><?php echo $result['tags']; ?></strong></a> <br><?php echo $time->Date($result['date']); ?></p><p><?php echo $result['author']; ?></p>
  </a>
  <!-- Read more button -->
  <a href="post.php?id=<?php echo $result['id']; ?>" class="btn btn-success btn-md">Read more</a>

</div>
<!-- Grid column -->

</div>
<hr class="my-5">

          <?php } 
          } else{
              
              // header("Location:404.php");
          } 
          ?>


            
          <!-- Card Dark -->
        </div>




<?php include"php/sider-menu.php"?>  
<?php include"php/footer-menu.php"?>
<!-- Footer -->
<?php include"php/footer.php"?>