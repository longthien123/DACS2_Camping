<?php session_start(); ?>
<!DOCTYPE html>
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
    <title>Bụi Camp - Danh sách sản phẩm</title>
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
    <link rel="stylesheet" href="css1/style.css">
    <!--HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries-->
    <!--WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script><![endif]-->
  </head>
  <!--[if IE 7]><body class="ie7 lt-ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 8]><body class="ie8 lt-ie9 lt-ie10"><![endif]-->
  <!--[if IE 9]><body class="ie9 lt-ie10"><![endif]-->
  <?php 
   include 'connect_db.php';
   if (isset($_GET['iddm'])) {
      $_SESSION['category_id'] = $_GET['iddm'];
   }
   if(!empty($_SESSION['category_id'])){
        $where = "";
        $where .= (!empty($where))? " AND "."`category_id` = ".$_SESSION['category_id']."": "`category_id` = ".$_SESSION['category_id']."";
       // extract($_SESSION['category_id']);
      }
    $param = "";
    $orderConditon = "";
    //Sắp xếp
    $_SESSION['orderField'] = isset($_GET['field']) ? $_GET['field'] : "";
    $_SESSION['orderSort'] = isset($_GET['sort']) ? $_GET['sort'] : "";
    if(!empty($_SESSION['orderField'])
        && !empty($_SESSION['orderSort'])){
        $orderConditon = "ORDER BY `products`.`".$_SESSION['orderField']."` ".$_SESSION['orderSort'];
        $param .= "field=".$_SESSION['orderField']."&sort=".$_SESSION['orderSort']."&";
    }

   $item_per_page = !empty($_GET['per_page'])?$_GET['per_page']:8;//hiển thị bao nhiêu sản phẩm trên 1 trang
   $current_page = !empty($_GET['page'])?$_GET['page']:1; //Trang hiện tại
   $offset = ($current_page - 1) * $item_per_page;//bắt đầu từ sản phẩm thứ bao nhiêu
   if(!empty($where)){
    $totalRecords = mysqli_query($con, "SELECT * FROM `Products` where (".$where.")");
}else{
    $totalRecords = mysqli_query($con, "SELECT * FROM `Products`");
}
   $totalRecords = $totalRecords->num_rows;//tổng số sản phẩm
   $totalPages = ceil($totalRecords / $item_per_page);//số trang cần có
   if(!empty($where)){
    $products = mysqli_query($con, "SELECT * FROM `Products` where (".$where.") ".$orderConditon." LIMIT " . $item_per_page . " OFFSET " . $offset);
}else{
    $products = mysqli_query($con, "SELECT * FROM `Products` ".$orderConditon." LIMIT " . $item_per_page . " OFFSET " . $offset);
}
mysqli_close($con);
  ?>
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
      <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
          <div class="ps-product-action" style="flex-direction: column;align-items: flex-end;">
            <div class="ps-product__filter">
              <select class="ps-select selectpicker" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
                <option value="">Sắp xếp giá</option>
                <?php if(!isset($_GET['iddm'])){?>
                  <option <?php if(isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="product-listing.php?field=price&sort=desc">Cao đến thấp</option>
                <option <?php if(isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="product-listing.php?field=price&sort=asc">Thấp đến cao</option>
                         <?php }else{?>
                          <option <?php if(isset($_GET['sort']) && $_GET['sort'] == "desc") { ?> selected <?php } ?> value="?iddm=<?= $_SESSION['category_id'] ?>&field=price&sort=desc">Cao đến thấp</option>
                <option <?php if(isset($_GET['sort']) && $_GET['sort'] == "asc") { ?> selected <?php } ?> value="?iddm=<?= $_SESSION['category_id'] ?>&field=price&sort=asc">Thấp đến cao</option>                          
                          <?php }?>
                
              </select>
            </div>
            <!-- <div class="ps-pagination">
              <ul class="pagination">
                <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">...</a></li>
                <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
              </ul>
            </div> -->
          </div>
          <div class="ps-product__columns">
<?php
            //hiển thị tất cả sản phẩm
               
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            while($row=mysqli_fetch_array($products)){
             
              $date=(String)date('m', $row['created_time']);
              $idsp=$row['id'];
            ?>
            <div class="ps-product__column">
            <div class="ps-shoe mb-30">
              <div class="ps-shoe__thumbnail">
                <?php if($date==date('m')){ ?>
                <div class="ps-badge"><span>New</span></div><?php }?>
                <!--<div class="ps-badge ps-badge--sale ps-badge--2nd"><span>-35%</span></div>--><a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a><img src="../<?= $row['image'] ?>" alt=""><a class="ps-shoe__overlay" href="product-detail.php?idsp=<?php echo $idsp; ?>"></a>
              </div>
              <div class="ps-shoe__content">
                <div class="ps-shoe__variants">
                  <div class="ps-shoe__variant normal">
                    <img src="../<?= $row['image']?>" alt="">
                    <?php
                    $sqlimg="SELECT*FROM image_library WHERE product_id=".$idsp;
                    $kqimg=mysqli_query($con,$sqlimg); 
                    while($row_img=mysqli_fetch_array($kqimg)):
                    ?>
                    <img src="../<?= $row_img['path'] ?>" alt="">
                    <?php endwhile ?>
                  </div>

                  <?php 
                  $sql_show_comment_count="SELECT* FROM comment WHERE product_id=".$idsp;
                  $kq_show_comment_count=mysqli_query($con,$sql_show_comment_count);
                  $count=0;
                  $stars=0;
                  while($row_show_comment_count=mysqli_fetch_array($kq_show_comment_count)){$count++; $stars+=$row_show_comment_count['rate_star'];}
                  if($count==0){
                    $stars_average=0;
                  }else{
                  $stars_average=($stars/$count);}
                  if($stars_average==0){echo "<b>Chưa có đánh giá</b>";}else{
                  ?>
                  <select class="ps-rating ps-shoe__rating" >
                  <?php 
                          
                          for($i=0;$i<5;$i++){ if(($i+1)<=round($stars_average)){?>
                          <option value="<?php echo round($stars_average) ?>"><?php echo ($i+1); ?></option> <?php }else{  ?>
                            <option value="1"><?php echo ($i+1); ?></option>
                          <?php }}} ?>
                  </select>
                </div>
                <div class="ps-shoe__detail"><a class="ps-shoe__name" href="product-detail.php?idsp=<?php echo $idsp; ?>"><?php echo $row['name']; ?></a>
                  <p class="ps-shoe__categories"> <?php 
                  $sqlshowdm="SELECT*FROM category WHERE id=".$row['category_id'];
                  $kqshowdm=mysqli_query($con,$sqlshowdm);
                  while($rowshowdm=mysqli_fetch_array($kqshowdm)){
                    echo $rowshowdm['name'];
                  }
                   ?></p><span class="ps-shoe__price">
                    <del style="font-size:15px;margin-top:15px;"></del> <?php echo '<br>'.$row['price'].' VND/Ngày'; ?></span>
                </div>
              </div>
            </div>
          </div>
            <?php
          }?>
                          <div style="clear: both" class=""></div>
          <?php
                include './pagination.php';
                ?>
          </div>
          <div class="ps-product-action">
            <!-- <div class="ps-product__filter">
              <select class="ps-select selectpicker">
                <option value="1">Shortby</option>
                <option value="2">Name</option>
                <option value="3">Price (Low to High)</option>
                <option value="3">Price (High to Low)</option>
              </select>
            </div> -->
            <?php
            ?>
          </div>
        </div>
        <div class="ps-sidebar" data-mh="product-listing">
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3>Danh mục</h3>
            </div>
            <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <!-- xứ lý danh mục bên trái màn hình -->
                <?php if(!isset($_GET['iddm'])){?>
                    <li class="current"><a href="product-listing.php?iddm=0">Tất cả</a>
                          </li>
                         <?php }else{?>
                          <li class=""><a href="product-listing.php?iddm=0">Tất cả</a>
                          </li>
                          <?php }?>
              <?php
                    include 'connect_db.php';
                    $sqldm="SELECT*FROM category";
                    $kqdm=mysqli_query($con,$sqldm);
                    while($row=mysqli_fetch_array($kqdm)){
                    ?>
                          <?php if(isset($_GET['iddm'])  && $_GET['iddm'] == $row['id']){?>
                            <li class="current"><a href="<?php echo 'product-listing.php?iddm='.$row['id']; ?>"> <?php echo $row['name']; ?></a>
                          </li>
                         <?php }else{?>
                          <li class=""><a href="<?php echo 'product-listing.php?iddm='.$row['id']; ?>"> <?php echo $row['name']; ?></a>
                          </li>
                        <?php } ?>
                          <?php
                          }
                          ?>
                  </li>
                <!-- <li class="current"><a href="">Tất cả</a></li>               
                 <li><a href="product-listing.html">Lều</a></li>
                <li><a href="product-listing.html">Vật dụng</a></li>
                <li><a href="product-listing.html">Thức ăn</a></li>
                <li><a href="product-listing.html">Đồ uống</a></li>
                <li><a href="product-listing.html">Vật liệu</a></li> -->
              </ul>
            </div>
          </aside>
         
          
          <aside class="ps-widget--sidebar ps-widget--category">
            <div class="ps-widget__header">
              <h3></h3>
            </div>
            <!-- <div class="ps-widget__content">
              <ul class="ps-list--checked">
                <li class="current"><a href="product-listing.html">Narrow</a></li>
                <li><a href="product-listing.html">Regular</a></li>
                <li><a href="product-listing.html">Wide</a></li>
                <li><a href="product-listing.html">Extra Wide</a></li>
              </ul>
            </div> -->
          </aside>
          <!-- <div class="ps-sticky desktop">
            <aside class="ps-widget--sidebar">
              <div class="ps-widget__header">
                <h3>Size</h3>
              </div>
              <div class="ps-widget__content">
                <table class="table ps-table--size">
                  <tbody>
                    <tr>
                      <td class="active">3</td>
                      <td>5.5</td>
                      <td>8</td>
                      <td>10.5</td>
                      <td>13</td>
                    </tr>
                    <tr>
                      <td>3.5</td>
                      <td>6</td>
                      <td>8.5</td>
                      <td>11</td>
                      <td>13.5</td>
                    </tr>
                    <tr>
                      <td>4</td>
                      <td>6.5</td>
                      <td>9</td>
                      <td>11.5</td>
                      <td>14</td>
                    </tr>
                    <tr>
                      <td>4.5</td>
                      <td>7</td>
                      <td>9.5</td>
                      <td>12</td>
                      <td>14.5</td>
                    </tr>
                    <tr>
                      <td>5</td>
                      <td>7.5</td>
                      <td>10</td>
                      <td>12.5</td>
                      <td>15</td>
                    </tr>
                  </tbody>
                </table>
              </div> -->
            </aside>
            <aside class="ps-widget--sidebar">
              
              
            </aside>
          </div>
          <!--aside.ps-widget--sidebar-->
          <!--    .ps-widget__header: h3 Ads Banner-->
          <!--    .ps-widget__content-->
          <!--        a(href='product-listing'): img(src="images/offer/sidebar.jpg" alt="")-->
          <!---->
          <!--aside.ps-widget--sidebar-->
          <!--    .ps-widget__header: h3 Best Seller-->
          <!--    .ps-widget__content-->
          <!--        - for (var i = 0; i < 3; i ++)-->
          <!--            .ps-shoe--sidebar-->
          <!--                .ps-shoe__thumbnail-->
          <!--                    a(href='#')-->
          <!--                    img(src="images/shoe/sidebar/"+(i+1)+".jpg" alt="")-->
          <!--                .ps-shoe__content-->
          <!--                    if i == 1-->
          <!--                        a(href='#').ps-shoe__title Nike Flight Bonafide-->
          <!--                    else if i == 2-->
          <!--                        a(href='#').ps-shoe__title Nike Sock Dart QS-->
          <!--                    else-->
          <!--                        a(href='#').ps-shoe__title Men's Sky-->
          <!--                    p <del> £253.00</del> £152.00-->
          <!--                    a(href='#').ps-btn PURCHASE-->
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