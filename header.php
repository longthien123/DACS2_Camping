
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
                  <li class="menu-item"><a href="product-listing.php?iddm=0">Sản phẩm</a></li>
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