<?php session_start(); 
include 'connect_db.php';
$_SESSION['id_sp'] =$_GET['idsp']; 
?>
<!DOCTYPE html>
<!--[if IE 7]><html class="ie ie7"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="favicon.jpg" rel="icon">
    <meta name="author" content="Nghia Minh Luong">
    <meta name="keywords" content="Default Description">
    <meta name="description" content="Default keyword">
    <title>Bụi camp - Chi tiết sản phẩm</title>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/ps-icon/style.css">
    <!-- CSS Library-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="plugins/owl-carousel/assets/owl.carousel.css">
    <link rel="stylesheet" href="plugins/jquery-bar-rating/dist/themes/fontawesome-stars.css">
    <link rel="stylesheet" href="plugins/slick/slick/slick.css">
    <link rel="stylesheet" href="plugins/bootstrap-select/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="plugins/Magnific-Popup/dist/magnific-popup.css">
    <link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.min.css">
    <link rel="stylesheet" href="plugins/revolution/css/settings.css">
    <link rel="stylesheet" href="plugins/revolution/css/layers.css">
    <link rel="stylesheet" href="plugins/revolution/css/navigation.css">
    <!-- Custom-->
    <link rel="stylesheet" href="css/style.css">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
  <body class="ps-loading">
    <div class="header--sidebar"></div>
    <?php include 'header.php'; ?>
    <div class="header-services">
      <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Giao hàng miễn phí</strong>: Nhận giao hàng miễn phí cho mỗi đơn hàng với Bụi Camp</p>
        <p class="ps-service"><i class="bi bi-check2-circle"></i><strong>Sản phẩm chất lượng</strong>: Sản phẩm đảm bảo luôn mới và an toàn với người dùng</p>
        <p class="ps-service"><i class="bi bi-tags"></i><strong>Ưu đãi đặc biệt</strong>: Giảm giá sản phẩm vào khung giờ nhất định</p>
      </div>
    </div>
    <main class="ps-main">
      <div class="test">
        <div class="container">
          <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                </div>
          </div>
        </div>
      </div>
      <form action="cart.php" method="POST">
      <div class="ps-product--detail pt-60">
        <div class="ps-container">
          <div class="row">
            <div class="col-lg-10 col-md-12 col-lg-offset-1">
              <div class="ps-product__thumbnail">
                <div class="ps-product__preview">
                  <div class="ps-product__variants">
                    <?php include 'connect_db.php';
                     $sqlimg_product="SELECT*FROM products WHERE id=".$_GET['idsp'];
                     $kqimg_product= mysqli_query($con,$sqlimg_product);
                     while($rowimg_product=mysqli_fetch_array($kqimg_product)){
                      $image_product= $rowimg_product['image'];}
                    ?>
                  <div class="item"><img src="../<?php echo $image_product; ?>" alt=""></div>
                    <?php 
                    $sqlimg_detail="SELECT*FROM image_library WHERE product_id=".$_GET['idsp'];
                    $kqimg_detail= mysqli_query($con,$sqlimg_detail);
                    while($rowimg_detail=mysqli_fetch_array($kqimg_detail)):
                    ?>
                    <div class="item"><img src="../<?= $rowimg_detail['path'] ?>" alt=""></div>
                    <?php endwhile ?>
                  </div>
                  <a class="popup-youtube ps-product__video" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><img src="images/shoe-detail/1.jpg" alt=""><i class="fa fa-play"></i></a>
                </div>
                <div class="ps-product__image">
                <div class="item"><img class="zoom" src="../<?php echo $image_product; ?>" alt="" data-zoom-image="../<?php echo $image_product; ?>"></div>
                  <?php 
                  $sqlimg_detail1="SELECT*FROM image_library WHERE product_id=".$_GET['idsp'];
                  $kqimg_detail1= mysqli_query($con,$sqlimg_detail1);
                  while($rowimg_detail1=mysqli_fetch_array($kqimg_detail1)):
                  ?>
                  <div class="item"><img class="zoom" src="../<?= $rowimg_detail1['path'] ?>" alt="" data-zoom-image="../<?= $rowimg_detail1['path'] ?>"></div>
                  <?php endwhile ?> 
                </div>
              </div>
              <!-- hiển thị trên moblie -->
              <div class="ps-product__thumbnail--mobile">
                <div class="ps-product__main-img"><img src="../<?= $rowimg_detail1['path'] ?>" alt=""></div>
                <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
                <?php 
                $sqlimg_detail2="SELECT*FROM image_library WHERE product_id=".$_GET['idsp'];
                  $kqimg_detail2= mysqli_query($con,$sqlimg_detail2);
                  while($rowimg_detail2=mysqli_fetch_array($kqimg_detail2)): ?>  
                <img src="../<?= $rowimg_detail2['path'] ?>" alt="">
                  <?php endwhile ?>
                </div>
              </div>
              
              <div class="ps-product__info">
                <?php 
                  $sql_show_comment_count="SELECT* FROM comment WHERE product_id=".$_GET['idsp'];
                  $kq_show_comment_count=mysqli_query($con,$sql_show_comment_count);
                  $count=0;
                  $stars=0;
                  while($row_show_comment_count=mysqli_fetch_array($kq_show_comment_count)){$count++; $stars+=$row_show_comment_count['rate_star'];}
                  if($count==0){
                    $stars_average=0;
                  }else{
                  $stars_average=($stars/$count);}
                  ?>
                <div class="ps-product__rating" >
                <i><b style="size= 20px;"> <?php if($stars_average==0){echo "Chưa có đánh giá";} else{echo round($stars_average, 1); }?>*</b></i>
                  <select class="ps-rating" >
                  <?php for($i=0;$i<5;$i++){ if(($i+1)<=round($stars_average)){?>
                          <option value="<?php echo round($stars_average) ?>"><?php echo ($i+1); ?></option> <?php }else{  ?>
                            <option value="1"><?php echo ($i+1); ?></option>
                          <?php }} ?>
                  </select> 
                  <a href="#review">(Đọc tất cả <?php echo $count; ?> đánh giá)</a>
                </div>

                <?php 
                $sql_product="SELECT*FROM products WHERE id=".$_GET['idsp'];
                $kq_product= mysqli_query($con,$sql_product);
                while($row_product=mysqli_fetch_array($kq_product)){ $name_product=$row_product['name']; $price_product=$row_product['price'];
                 ?>
                <h1><?php echo $row_product['name']; ?></h1>
                <p class="ps-product__category"><a href="#"> 
                <?php 
                $category_id=$row_product['category_id'];
                  $sqlshowdm="SELECT*FROM category WHERE id=".$category_id;
                  $kqshowdm=mysqli_query($con,$sqlshowdm);
                  while($rowshowdm=mysqli_fetch_array($kqshowdm)){
                    echo $rowshowdm['name'];
                  }
                   ?>
                </a></p>
                <h3 class="ps-product__price"><?php echo $row_product['price'].' VND/Ngày';  ?> <del> <!--£ 330 --> </del></h3>
                <div class="ps-product__block ps-product__quickview">
                  <h4>MÔ TẢ</h4>
                  <p><?php echo $row_product['content'];} ?></p>
                </div>
                <div class="ps-product__block ps-product__quickview">
                  <h4>TỒN KHO</h4>
                  <?php 
                include 'connect_db.php';
                $sql_product_2= mysqli_query($con, "SELECT*FROM products WHERE id=".$_GET['idsp']);
                $product_3 = mysqli_fetch_assoc($sql_product_2);?>
                <p style="color:red"><?= $product_3['quantity']; ?></p>
                </div>
                <div class="ps-product__block ps-product__size">
                  <h4>SỐ NGÀY THUÊ ㅤㅤㅤㅤㅤㅤSỐ LƯỢNG</h4> 
                  <?php if($category_id==9 || $category_id==10) { echo '<select class="ps-select selectpicker" name="songaythue">
                    <option value="1">Không thể thuê</option></select>';}else{?>
                  <select class="ps-select selectpicker" name="songaythue">
                    <option value="1">1 ngày</option>
                    <option value="2">2 ngày</option>
                    <option value="3">3 ngày</option>
                    <option value="4">4 ngày</option>
                    <option value="5">5 ngày</option>
                    <option value="6">6 ngày</option>
                    <option value="7">7 ngày</option>
                  </select> <?php  }?>
                  <div class="form-group" >
                  <?php
                    include 'connect_db.php';
                     $result_2 = mysqli_query($con, "SELECT * FROM `products` WHERE `id` = " . $_GET['idsp']);
                     $product_2 = mysqli_fetch_assoc($result_2);?>
                    <input class="form-control" type="number" name="soluong" value="0" min="1" max="<?=$product_2['quantity'] ?>" style="border-radius:2px;">
                  </div>
                </div>
                <!-- Lấy thông tin từ sản phẩm -->
                <input type="hidden" name="idproduct" value="<?php echo $_GET['idsp']; ?>">
                <input type="hidden" name="hinhanhsp" value="<?php echo $image_product; ?>">
                <input type="hidden" name="tensp" value="<?php echo $name_product; ?>"> 
                <input type="hidden" name="gia" value="<?php echo $price_product; ?>"> 
                <!-- <div class="ps-product__shopping"><input  class="ps-btn mb-10" type="submit" name="addcart" value="Thêm vào giỏ hàng"> -->
                  <!-- <a class="ps-btn mb-10" href="cart.php">Thêm vào giỏ hàng<i class="ps-icon-next"></i></a> -->
                  <div class="ps-product__shopping">
                  <!-- CHECK TỒN KHO -->
                  <?php
                  include 'connect_db.php';
                   $result_1 = mysqli_query($con, "SELECT * FROM `products` WHERE `id` = " . $_GET['idsp']);
                   $product_1 = mysqli_fetch_assoc($result_1);
                  //  $product_1 = $result_1->fetch_assoc();
                  if($product_1['quantity'] > 0){?>
                  <input  class="ps-btn mb-10" type="submit" name="addcart" value="Thêm vào giỏ hàng">
                  <?php } else { ?>
                    <input  class="ps-btn mb-10" type="" name="" value="Hết hàng" style="background-color:red;cursor:pointer" readonly>
                    <?php } ?>           
                  <div class="ps-product__actions"><a class="mr-10" href=""><i class="ps-icon-heart"></i></a><a href=""><i class="ps-icon-share"></i></a></div>
                </div>
              </div></form>
              <div class="clearfix"></div>
              <div class="ps-product__content mt-50">
                <ul class="tab-list" role="tablist">
                  
                  <li class="active"><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab" id="review">ĐÁNH GIÁ</a></li>
                  <li><a href="#tab_03" aria-controls="tab_03" role="tab" data-toggle="tab">TỔNG QUAN</a></li>
                </ul>
              </div>
              <div class="tab-content mb-60">
                
                <div class="tab-pane active" role="tabpanel" id="tab_02">
                  <?php 
                  $sql_show_comment="SELECT* FROM comment WHERE product_id=".$_GET['idsp'];
                  $kq_show_comment=mysqli_query($con,$sql_show_comment); 
                  ?>
                  <p class="mb-20"><?php echo $count; ?> đánh giá cho <strong><?php echo $name_product; ?></strong></p>
                  <?php while($row_show_comment=mysqli_fetch_array($kq_show_comment)){
                    $iduser=$row_show_comment['user_id'];
                   ?>
                  <div class="ps-review">
                    <div class="ps-review__thumbnail"><img src="images/user/user.png" alt="" style="width: 150px;"></div>
                    <div class="ps-review__content">
                      <header>
                        <select class="ps-rating">
                          <?php for($i=0;$i<5;$i++){ if(($i+1)<=$row_show_comment['rate_star']){?>
                          <option value="<?php echo $row_show_comment['rate_star']; ?>"><?php echo ($i+1); ?></option> <?php }else{  ?>
                            <option value="1"><?php echo ($i+1); ?></option>
                          <?php }} ?>
                        </select>
                        <p> <a href=""> 
                          <?php $sql_user="SELECT *FROM users WHERE id=".$iduser;
                                $kq_user=mysqli_query($con, $sql_user);
                                while($row_user=mysqli_fetch_array($kq_user)){
                                  echo $row_user['fullname'];
                                }
                        ?></a> - <?php echo $row_show_comment['created_time']; ?></p>
                      </header>
                      <p><?php echo $row_show_comment['note']; ?></p>
                    </div>
                  </div><?php }?>
                  <form class="ps-product__review" action="thembinhluan.php" method="post">
                    <h4>THÊM ĐÁNH GIÁ CỦA BẠN</h4> <br>
                    <div class="row">
                          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                            
                            <div class="form-group">
                              <label>Đánh giá sao<span></span></label>
                              <select class="ps-rating" name="rating_star">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                              </select>
                            </div>
                          </div>
                            <input type="hidden" name="product_id" value="<?php echo $_GET['idsp']; ?>">
                            <input type="hidden" name="user_id" value="<?php if(isset($_COOKIE['idu'])){ echo $_COOKIE['idu']; }else{
                              echo 'NULL';
                            } ?>">
                          <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                            <div class="form-group">
                              <label>Đánh giá sản phẩm:</label>
                              <textarea class="form-control" rows="6" name="note_rate"></textarea>
                            </div>
                            
                            <div class="form-group">
                              <input class="ps-btn ps-btn--sm" type="submit" value="Gửi đánh giá" name="guidanhgia">
                            </div>
                          </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane" role="tabpanel" id="tab_03">
                <p>Caramels tootsie roll carrot cake sugar plum. Sweet roll jelly bear claw liquorice. Gingerbread lollipop dragée cake. Pie topping jelly-o. Fruitcake dragée candy canes tootsie roll. Pastry jelly-o cupcake. Bonbon brownie soufflé muffin.</p>
                  <p>Sweet roll soufflé oat cake apple pie croissant. Pie gummi bears jujubes cake lemon drops gummi bears croissant macaroon pie. Fruitcake tootsie roll chocolate cake Carrot cake cake bear claw jujubes topping cake apple pie. Jujubes gummi bears soufflé candy canes topping gummi bears cake soufflé cake. Cotton candy soufflé sugar plum pastry sweet roll..</p>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
        <div class="ps-container">
          <div class="ps-section__header mb-50">
            <div class="row">
                  <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                    <h3 class="ps-section__title" data-mask="Related item">- YOU MIGHT ALSO LIKE</h3>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
                  </div>
            </div>
          </div>
          <div class="ps-section__content">
            <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail">
                    <div class="ps-badge"><span>New</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/1.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                  </div>
                  <div class="ps-shoe__content">
                    <div class="ps-shoe__variants">
                      <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                      <select class="ps-rating ps-shoe__rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                      <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail">
                    <div class="ps-badge"><span>New</span></div>
                    <div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/2.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                  </div>
                  <div class="ps-shoe__content">
                    <div class="ps-shoe__variants">
                      <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                      <select class="ps-rating ps-shoe__rating">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                      </select>
                    </div>
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                      <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price">
                        <del>£220</del> £ 120</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail">
                    <div class="ps-badge"><span>New</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/3.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                  </div>
                  <div class="ps-shoe__content">
                    <div class="ps-shoe__variants">
                      <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                      <select class="ps-rating ps-shoe__rating">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="2">5</option>
                      </select>
                    </div>
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                      <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/4.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                  </div>
                  <div class="ps-shoe__content">
                    <div class="ps-shoe__variants">
                      <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                      <select class="ps-rating ps-shoe__rating">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="2">5</option>
                      </select>
                    </div>
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                      <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail">
                    <div class="ps-badge"><span>New</span></div><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/5.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                  </div>
                  <div class="ps-shoe__content">
                    <div class="ps-shoe__variants">
                      <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                      <select class="ps-rating ps-shoe__rating">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="2">5</option>
                      </select>
                    </div>
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                      <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="ps-shoes--carousel">
                <div class="ps-shoe">
                  <div class="ps-shoe__thumbnail"><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="images/shoe/6.jpg" alt=""><a class="ps-shoe__overlay" href="product-detail.html"></a>
                  </div>
                  <div class="ps-shoe__content">
                    <div class="ps-shoe__variants">
                      <div class="ps-shoe__variant normal"><img src="images/shoe/2.jpg" alt=""><img src="images/shoe/3.jpg" alt=""><img src="images/shoe/4.jpg" alt=""><img src="images/shoe/5.jpg" alt=""></div>
                      <select class="ps-rating ps-shoe__rating">
                        <option value="1">1</option>
                        <option value="1">2</option>
                        <option value="1">3</option>
                        <option value="1">4</option>
                        <option value="2">5</option>
                      </select>
                    </div>
                    <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detai.html">Air Jordan 7 Retro</a>
                      <p class="ps-shoe__categories"><a href="#">Men shoes</a>,<a href="#"> Nike</a>,<a href="#"> Jordan</a></p><span class="ps-shoe__price"> £ 120</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="ps-subscribe">
        <div class="ps-container">
          <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                  <h3><i class="fa fa-envelope"></i>Sign up to Newsletter</h3>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                  <form class="ps-subscribe__form" action="do_action" method="post">
                    <input class="form-control" type="text" placeholder="">
                    <button>Sign up now</button>
                  </form>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                  <p>...and receive  <span>$20</span>  coupon for first shopping.</p>
                </div>
          </div>
        </div>
      </div>
      <?php include 'footer.php' ?>
    </main>
    <!-- JS Library-->
    <script type="text/javascript" src="plugins/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="plugins/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
    <script type="text/javascript" src="plugins/owl-carousel/owl.carousel.min.js"></script>
    <script type="text/javascript" src="plugins/gmap3.min.js"></script>
    <script type="text/javascript" src="plugins/imagesloaded.pkgd.js"></script>
    <script type="text/javascript" src="plugins/isotope.pkgd.min.js"></script>
    <script type="text/javascript" src="plugins/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
    <script type="text/javascript" src="plugins/jquery.matchHeight-min.js"></script>
    <script type="text/javascript" src="plugins/slick/slick/slick.min.js"></script>
    <script type="text/javascript" src="plugins/elevatezoom/jquery.elevatezoom.js"></script>
    <script type="text/javascript" src="plugins/Magnific-Popup/dist/jquery.magnific-popup.min.js"></script>
    <script type="text/javascript" src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAx39JFH5nhxze1ZydH-Kl8xXM3OK4fvcg&amp;region=GB"></script><script type="text/javascript" src="plugins/revolution/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="plugins/revolution/js/extensions/revolution.extension.actions.min.js"></script>
    <!-- Custom scripts-->
    <script type="text/javascript" src="js/main.js"></script>
  </body>
</html>