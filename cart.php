<?php 
session_start();
if(isset($_POST['addcart'])&& ($_POST['addcart'])){
  $tensp=$_POST['tensp'];
  $gia=$_POST['gia'];
  $soluong=$_POST['soluong'];
  $hinhanh=$_POST['hinhanhsp'];
  $songay=$_POST['songaythue'];
  $idproduct=$_POST['idproduct'];
  $sp=[$tensp,$gia,$soluong,$hinhanh,$songay,$idproduct];
  $_SESSION['giohang'][]=$sp;
  
  header("location: cart.php");
}

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
    <title>Bụi Camp-Giỏ hàng</title>
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
    <header class="header">
      <div class="header__top">
        <div class="container-fluid">
          <div class="row">
                <div class="col-lg-6 col-md-8 col-sm-6 col-xs-12 ">
                  <p>254/K1 Trần Cao Vân, Thanh Khê, Đà Nẵng  -  Hotline: 804-377-3580 - 804-399-3580</p>
                </div>
                <?php if(isset($_COOKIE['user_cookie'])){ ?>
                  <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                  <div class="header__actions"><a href=""><i class="bi bi-person"></i> <?php 
                  include 'connect_db.php';
                  $sqlu="SELECT*FROM USERS WHERE id=".$_COOKIE['idu'];
                  $kqu= mysqli_query($con,$sqlu);
                  while($row=mysqli_fetch_array($kqu)){
                    echo 'Xin chào '.$row['fullname'].',';
                  }
                   ?> </a>
                  <div class="header__actions"><a href="logout.php"><i class="bi bi-box-arrow-right"></i> Đăng xuất</a>
<?php
    }else{
                ?>
                <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12 ">
                  <div class="header__actions"><a href="login.php"><i class="bi bi-person"></i> Đăng nhập</a>
                  <div class="header__actions"><a href="register.php"><i class="bi bi-person-plus"></i> Đăng ký</a>

                  <?php
    }
                  ?><div class="btn-group ps-dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="bi bi-globe"></i>  Ngôn ngữ<i class="fa fa-angle-down"></i></a>
                      <ul class="dropdown-menu">
                        <li><a href="#">English</a></li>
                        <li><a href="#">Tiếng Việt</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
          </div>
        </div>
      </div>
      <nav class="navigation">
        <div class="container-fluid">
          <div class="navigation__column left">
            <div class="header__logo"><a class="ps-logo" href="index.php"><img src="images/logo1.png" alt=""></a></div>
          </div>
          <div class="navigation__column center">
                <ul class="main-menu menu">
                  <li class="menu-item menu-item-has-children dropdown"><a href="index.php">Trang chủ</a>
                    
                  </li>
                  <li class="menu-item menu-item-has-children has-mega-menu"><a href="#">Địa điểm cắm trại</a>
                    
                  </li>
                  <li class="menu-item"><a href="product-listing.php">Sản phẩm</a></li>
                  <li class="menu-item menu-item-has-children dropdown"><a href="#">Danh mục</a>
                  <ul class="sub-menu">
                    <?php
                    include 'connect_db.php';
                    $sqldm="SELECT*FROM category";
                    $kqdm=mysqli_query($con,$sqldm);
                    while($row=mysqli_fetch_array($kqdm)){
                    ?>
                          <li class="menu-item menu-item-has-children dropdown"><a href="<?php echo 'product-listing.php?iddm='.$row['id']; ?>"> <?php  echo $row['name']; ?></a>
                          </li>
                          <?php
                          }
                          ?>
                  </li></ul>
                  <li class="menu-item menu-item-has-children dropdown"><a href="contact-us.php">Liên hệ</a>
                        
                  </li>
                </ul>
          </div>
          <div class="navigation__column right">
            <form class="ps-search--header" action="do_action" method="post">
              <input class="form-control" type="text" placeholder="Tìm kiếm sản phẩm...">
              <button><i class="ps-icon-search"></i></button>
            </form>
            <div class="ps-cart"><a class="ps-cart__toggle" href="cart.php"><span><i><?php  $_SESSION['soluongcart']=(int)sizeof($_SESSION['giohang']);
            for($i=0; $i< sizeof($_SESSION['giohang']);$i++){
              if($_SESSION['giohang'][$i][0]==NULL && $_SESSION['giohang'][$i][1]==NULL && $_SESSION['giohang'][$i][2]==NULL && $_SESSION['giohang'][$i][3]==NULL && $_SESSION['giohang'][$i][4]==NULL && $_SESSION['giohang'][$i][5]==NULL){
                $_SESSION['soluongcart']-=1;
              }}
            echo $_SESSION['soluongcart']; 
            ?></i></span><i class="ps-icon-shopping-cart"></i></a>
            
              </div>
            </div>
            <div class="menu-toggle"><span></span></div>
          </div>
        </div>
      </nav>
    </header>
    <div class="header-services">
      <div class="ps-services owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="7000" data-owl-gap="0" data-owl-nav="true" data-owl-dots="false" data-owl-item="1" data-owl-item-xs="1" data-owl-item-sm="1" data-owl-item-md="1" data-owl-item-lg="1" data-owl-duration="1000" data-owl-mousedrag="on">
        <p class="ps-service"><i class="ps-icon-delivery"></i><strong>Giao hàng miễn phí</strong>: Nhận giao hàng miễn phí cho mỗi đơn hàng với Bụi Camp</p>
        <p class="ps-service"><i class="bi bi-check2-circle"></i><strong>Sản phẩm chất lượng</strong>: Sản phẩm đảm bảo luôn mới và an toàn với người dùng</p>
        <p class="ps-service"><i class="bi bi-tags"></i><strong>Ưu đãi đặc biệt</strong>: Giảm giá sản phẩm vào khung giờ nhất định</p>
      </div>
    </div>
    <main class="ps-main">
    <form action="checkout.php" method="POST">
      <div class="ps-content pt-80 pb-80">
        <div class="ps-container">
          <div class="ps-cart-listing">
            <table class="table ps-cart__table">
              <thead>
                <tr>
                  <th>Tất cả sản phẩm</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Tổng tiền</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                
              <?php if(isset($_SESSION['giohang']) && (is_array($_SESSION['giohang']))){
                $total=0;
                for($i=0; $i< sizeof($_SESSION['giohang']);$i++){
                  $idcart=$i;
                  $_SESSION['a']=$_SESSION['giohang'][$i][2];
                  $total+=($_SESSION['giohang'][$i][1]*$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][4]);
                  if($_SESSION['giohang'][$i][0]!=NULL && $_SESSION['giohang'][$i][1]!=NULL && $_SESSION['giohang'][$i][2]!=NULL && $_SESSION['giohang'][$i][3]!=NULL && $_SESSION['giohang'][$i][4]!=NULL && $_SESSION['giohang'][$i][5]!=NULL){
                ?>
                <tr>
                  <td><a class="ps-product__preview" href="product-detail.php?idsp=<?php  echo $_SESSION['giohang'][$i][5]; ?>"><img class="mr-15" style="width: 100px; height: 100px;" src="../<?php  echo $_SESSION['giohang'][$i][3];  ?>" alt=""> <?php echo $_SESSION['giohang'][$i][0].'(x'.$_SESSION['giohang'][$i][4].' ngày)'; ?></a></td>
                  <td><?php echo $_SESSION['giohang'][$i][1]; ?></td>
                  <td>
                  <div class="form-group--number" >
                    <input class="form-control" type="number" name="soluongck" value="<?php echo $_SESSION['giohang'][$i][2]; ?>" min="1" max="10" style="border-radius:2px;">
                  </div>
                  </td>
                  <td><?php echo ($_SESSION['giohang'][$i][1]*$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][4]).' VND'; ?></td>
                  <td>
                    <a class="ps-remove" href="deletecart.php?id=<?php echo $i;?>"></a>
                  </td>
                </tr>
                <?php  }}}  ?>
              </tbody>
            </table>
            <div class="ps-cart__actions">
              <div class="ps-cart__promotion">
                <input type="hidden" name="total" value="<?php echo $total; ?>">
              </div>
              <div class="ps-cart__total">
                <h3>Tổng tiền: <span> <?php echo $total; ?> VND</span></h3>
                <input type="submit" name="thanhtoan" class="ps-btn" href="checkout.php" value="Thanh toán sản phẩm">
              </div>
            </div>
          </div>
        </div>
      </div></form>
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