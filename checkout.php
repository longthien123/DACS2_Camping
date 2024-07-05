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
    <title>Bụi Cammp - Thanh toán</title>
    <!-- Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Archivo+Narrow:300,400,700%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="plugins/ps-icon/style.css">

    <script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">
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

  <?php 
if(isset($_POST['thanhtoan'])&& ($_POST['thanhtoan'])){
  if(!isset($_COOKIE['user_cookie'])){
    
  
    echo '<input type="hidden"  value="">';
?> <script>
Swal.fire({
title: "Bạn chưa đăng nhập!",
text: "Vui lòng đăng nhập để sử dụng dịch vụ",
icon: "error",
confirmButtonColor: "#3085d6",
confirmButtonText: "Đăng nhập!"
}).then((result) => {
window.location="login.php";
});
</script><?php
  }?>
<?php 
    include 'connect_db.php';
    $id = $_SESSION['id_sp'];
    $soluongck=$_POST['soluongck'];
    $result_1 = mysqli_query($con, "SELECT * FROM `products` WHERE `id` = " . $id);
    $product_1 = mysqli_fetch_assoc($result_1);
    for($i=0; $i< sizeof($_SESSION['giohang']);$i++){
    $ton_kho = (int)$product_1['quantity'] - (int)$_POST['soluongck'];
      $result = mysqli_query($con, "UPDATE `products` SET `quantity` = '" . $ton_kho . "'WHERE `Products`.`id` = " . $id );
  }

?>
  
<?php
}
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
      <div class="ps-checkout pt-80 pb-80">
        <div class="ps-container">
          <form class="ps-checkout__form" action="bill.php" method="post">
            <div class="row">
                  <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__billing">
                      <h3>Chi tiết hóa đơn</h3>
                      <?php include 'connect_db.php';
                      $sql_users="SELECT*FROM users WHERE id=".$_COOKIE['idu'];
                      $kq_users=mysqli_query($con,$sql_users);
                      while($row_users=mysqli_fetch_array($kq_users)){
                       ?>
                            <div class="form-group form-group--inline">
                              <label>Họ và tên<span>*</span>
                              </label>
                              <input class="form-control" type="text" name="fullname_users" value="<?php echo $row_users['fullname']; ?>">
                            </div>
                            <div class="form-group form-group--inline">
                              <label>Địa chỉ Email<span>*</span>
                              </label>
                              <input class="form-control" type="email" name="email_users" value="<?php echo $row_users['email']; ?>">
                            </div>
                            <div class="form-group form-group--inline">
                              <label>Số điện thoại<span>*</span>
                              </label>
                              <input class="form-control" type="text" name="phone_users" value="<?php echo $row_users['phone']; ?>">
                            </div>
                            <div class="form-group form-group--inline">
                              <label>Điạ chỉ<span>*</span>
                              </label>
                              <input class="form-control" type="text" name="address_users" value="<?php echo $row_users['address']; ?>">
                            </div>
                      <h3 class="mt-40"> Thông tin bổ sung</h3>
                      <div class="form-group form-group--inline textarea" >
                        <label>Ghi chú đơn hàng</label>
                        <textarea class="form-control" name="thongtinbosung" rows="5" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                      </div> <?php }?>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 ">
                    <div class="ps-checkout__order" style="width: 450px;">
                      <header>
                        <h3>Đơn hàng của bạn</h3>
                      </header>
                      <div class="content">
                        <table class="table ps-checkout__products">
                          <thead>
                            <tr>
                              <th class="text-uppercase">Sản phẩm</th>
                              <th class="text-uppercase">Tổng</th>
                            </tr>
                          </thead>
                          <tbody>

                          <?php 
                          // $totalck=$_POST['total'];
                          $totalck=0;
                          for($i=0; $i< sizeof($_SESSION['giohang']);$i++){
                            $_SESSION['giohang'][$i][2] = $soluongck;
                            $totalck+=($_SESSION['giohang'][$i][1]*$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][4]);
                            if($_SESSION['giohang'][$i][0]!=NULL && $_SESSION['giohang'][$i][1]!=NULL && $_SESSION['giohang'][$i][2]!=NULL && $_SESSION['giohang'][$i][3]!=NULL && $_SESSION['giohang'][$i][4]!=NULL && $_SESSION['giohang'][$i][5]!=NULL){  ?>
                            <tr>
                              <?php ?>
                              <td><?php echo $_SESSION['giohang'][$i][0].' (x'.$_SESSION['giohang'][$i][2].' )('.$_SESSION['giohang'][$i][4].' ngày)' ?></td>
                              <td><?php echo ($_SESSION['giohang'][$i][1]*$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][4]).' VND' ?></td>
                            </tr>
          <?php }} ?>
                            <tr>
                              <td>Tổng tiền</td>
                              <td><?php echo $totalck.' VND'; ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <footer>
                        <h3>Phương thức thanh toán</h3>
                        <div class="form-group cheque">
                          <div class="ps-radio">
                            <input class="form-control" type="radio" id="rdo01" name="payment" value="Chưa thanh toán" checked>
                            <label for="rdo01">Thanh toán sau khi nhận hàng</label>
                          </div>
                        </div>
                        <div class="form-group paypal">
                          <div class="ps-radio ps-radio--inline">
                            <input class="form-control" type="radio" name="payment" id="rdo02" value="Đã Thanh Toán">
                            <label for="rdo02">Paypal</label>
                          </div>
                          <ul class="ps-payment-method">
                            <li><a href="#"><img src="images/payment/1.png" alt=""></a></li>
                            <li><a href="#"><img src="images/payment/2.png" alt=""></a></li>
                            <li><a href="#"><img src="images/payment/3.png" alt=""></a></li>
                          </ul>
                          <input type="submit" class="ps-btn ps-btn--fullwidth" value="Thanh toán" name="thanhtoanck">
                        </div>
                      </footer>
                    </div>
                    
                  </div>
            </div>
          </form>
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