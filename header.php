<?php

if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}

?>

<header class="header">

   <div class="flex">
   <div class="navigation">
   <div class="menuToggle"></div>
    <ul>
        <li class="list">
            <a href="#">
                <span class="icon"><i class="fa fa-home" aria-hidden="true" style="color:#ee204d"></i></span>
                <span class="text">Home</span>
            </a>
        </li>
        <li class="list">
            <a href="kitchens.php">
                <span class="icon"><i class="fa fa-cutlery" style="color:#ee204d"></i></span>
                <span class="text">Kitchens</span>
            </a>
        </li>
        <li class="list">
            <a href="#">
                <span class="icon"><i class='fas fa-hamburger' style="color:#ee204d"></i></span>
                <span class="text">Today's Menu</span>
            </a>
        </li>
        <li class="list">
            <a href="modal.php">
                <span class="icon"><i class="fa fa-upload" aria-hidden="true" style="color:#ee204d"
                  ></i></span>
                <span class="text">Upload</span>
            </a>
        </li>
        
    </ul>
  </div>
      <a href="admin_page.php" class="logo">Groco<span>.</span></a>

      <nav class="navbar">
         <a href="home.php">home</a>
         <a href="shop.php">shop</a>
         <a href="orders.php">orders</a>
         <a href="about.php">about</a>
         <a href="contact.php">contact</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
         <a href="search_page.php" class="fas fa-search"></a>
         <?php
            $count_cart_items = $conn->prepare("SELECT * FROM `cart` WHERE user_id = ?");
            $count_cart_items->execute([$user_id]);
            $count_wishlist_items = $conn->prepare("SELECT * FROM `wishlist` WHERE user_id = ?");
            $count_wishlist_items->execute([$user_id]);
         ?>
         <a href="wishlist.php"><i class="fas fa-heart"></i><span>(<?= $count_wishlist_items->rowCount(); ?>)</span></a>
         <a href="cart.php"><i class="fas fa-shopping-cart"></i><span>(<?= $count_cart_items->rowCount(); ?>)</span></a>
      </div>

      <div class="profile">
         <?php
            $select_profile = $conn->prepare("SELECT * FROM `users` WHERE id = ?");
            $select_profile->execute([$user_id]);
            $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
         ?>
         <img src="uploaded_img/<?= $fetch_profile['image']; ?>" alt="">
         <p><?= $fetch_profile['name']; ?></p>
         <a href="user_profile_update.php" class="btn">update profile</a>
         <a href="logout.php" class="delete-btn">logout</a>
         <div class="flex-btn">
            <a href="login.php" class="option-btn">login</a>
            <a href="register.php" class="option-btn">register</a>
         </div>
      </div>

   </div>
</div>
</header>

