<aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="index.php"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h5 class="centered">Sam Soffes</h5>
          <li class="mt">
           
              <i class="fa fa-users"></i>
              <span>Site options</span>
              
          </li>
          <li class="mt">
            <a class="active" href="index.php">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
            <i class="fa-solid fa-marker"></i>
              <span>Title & slogan</span>
              </a>
            <ul class="sub">
              <li><a href="logo.php">Add Logo</a></li>
              <li><a href="title.php">show logo</a></li>
              
             
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
            <i class="fa-brands fa-facebook-f"></i>
              <span>Slider image</span>
              </a>
            <ul class="sub">
              <li><a href="add_image.php">Add image</a></li>
              <li><a href="show_image.php">Show image</a></li>
                            
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
            <i class="fa-solid fa-copyright"></i>
              <span>Create page</span>
            </a>

            <ul class="sub">
              <li><a href="add_new_page.php">Add new page</a></li>
              
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa-solid fa-pen-to-square"></i>
              <span>Pages</span>
            </a>
            <ul class="sub">
            <?php 
            $e_query = "select * from pages order by id desc";
            $e_ersult = $db->select($e_query);
            while($e_row = $e_ersult->fetch_assoc()){ 
            ?>   
              <li><a href="create_page.php?c_page=<?php echo $e_row['id'];?>"><?php echo $e_row['title'];?></a></li>

            <?php }?>  
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
            <i class="fa-solid fa-gears"></i>
              <span>Category options</span>
              </a>
            <ul class="sub">
              <li><a href="add_category.php">Add category list</a></li>
              <li><a href="show_category.php">Show category</a></li>

            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;">
            <i class="fa-solid fa-blog"></i>
              <span>Post options</span>
              </a>
            <ul class="sub">
              <li><a href="add_post.php">Add post</a></li>
              <li><a href="show_post.php">Show post</a></li>
            </ul>
          </li>

        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
 
    <section id="main-content">
      <section class="wrapper">
        <div class="container">
         <div class="row">
           <div class="d-flex justify-content-center align-items-center mx-auto">