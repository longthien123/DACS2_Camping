<div class="ps-footer bg--cover" data-background="images/background/parallax.png">
        <div class="ps-footer__content">
          <div class="ps-container">
            <div class="row">
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--info">
                      <header><a class="ps-logo" href="index.php"><img src="images/logo1.png" alt=""></a>
                        <h3 class="ps-widget__title">Địa chỉ</h3>
                      </header>
                      <footer>
                        <p><strong>254/K1 Trần Cao Vân, Thanh Khê, Đà Nẵng </strong></p>
                        <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                        <p>Số điện thoại: 804-377-3580 </p>
                        <p>Số Fax: 804-399-3580</p>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--info second">
                      <header>
                        <h3 class="ps-widget__title">Thành viên</h3>
                      </header>
                      <footer>
                        <p><strong>Nhóm xây dựng trang web</strong></p>
                        <p>Lê Long Thiên-22IT275</p>
                        <p>Ngô Thanh Tuấn-22IT328</p>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Dịch vụ thuê</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--link">
                          <li><a href="#">Đăng nhập</a></li>
                          <li><a href="#">Đăng ký</a></li>
                          <li><a href="#">Giỏ hàng</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Truy cập</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--line">
                          <li><a href="index.php">Trang chủ</a></li>
                          <li><a href="#">Địa điểm cắm trại</a></li>
                          <li><a href="product-listing.php">Sản phẩm</a></li>
                          <li><a href="contact-us.php">Liên hệ</a></li>
                        </ul>
                      </footer>
                    </aside>
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                    <aside class="ps-widget--footer ps-widget--link">
                      <header>
                        <h3 class="ps-widget__title">Sản phẩm</h3>
                      </header>
                      <footer>
                        <ul class="ps-list--line">
                          <?php include 'connect_db.php';
                    $sqlshowdm="SELECT*FROM category";
                    $kqshowdm=mysqli_query($con,$sqlshowdm);
                    while($rowshowdm=mysqli_fetch_array($kqshowdm)){ ?>
                          <li><a href="<?php echo 'product-listing.php?iddm='.$rowshowdm['id']; ?>"><?php  echo $rowshowdm['name']; ?></a></li>
                          <?php } ?>
                        </ul>
                      </footer>
                    </aside>
                  </div>
            </div>
          </div>
        </div>
        <div class="ps-footer__copyright">
          <div class="ps-container">
            <div class="row">
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <p>&copy; <a href="#">Bụi Camp</a>, Đã đăng ký bản quyền. </p>
                  </div>
                  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                    <ul class="ps-social">
                      <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                      <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                  </div>
            </div>
          </div>
        </div>
      </div>