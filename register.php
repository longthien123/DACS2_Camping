
<!DOCTYPE HTML>
<html>
<head>
<title>Bụi Camp- Đăng ký</title>
<!-- Custom Theme files -->
<link href="../css1/stylelogin.css" rel="stylesheet" type="text/css"/>
<!-- for-mobile-apps -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="keywords" content="Classy Login form Responsive, Login form web template, Sign up Web Templates, Flat Web Templates, Login signup Responsive web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<!-- //for-mobile-apps -->
<!--Google Fonts-->
<link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>

<script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">
</head>
<body>

<?php
    
     if((isset($_POST['dangky']))&&($_POST['dangky'])){ 
        $username= $_POST['username'];
        $pass= $_POST['password'];
        $checkpass= $_POST['checkpass'];
        $name= $_POST['fullname'];
        $email= $_POST['email'];
        $phone= $_POST['phone'];
        $address= $_POST['address'];
        if($username=="Tên đăng nhập" || $pass=="password" || $name=="Họ tên" || $email=="Email" || $phone=="Số điện thoại" || $address=="Địa chỉ"){ ?>
        
        <script>
            Swal.fire({
  icon: "error",
  title: "Lỗi!",
  text: "Vui lòng điền đẩy đủ thông tin!",
});
        </script>
       <?php     
        } else if($pass!=$checkpass){ ?>

<script>
            Swal.fire({
  icon: "error",
  title: "Lỗi!",
  text: "Mật khẩu không chính xác!",
});
        </script>
<?php
        }else{
            include 'connect_db.php';
            $sql="INSERT INTO users(role_id,username,password,fullname,email,phone,address) values(2,'$username','$pass','$name','$email','$phone','$address')";
            $kq= mysqli_query($con,$sql);
        ?>
        <script>
        Swal.fire({
  title: "Bạn đã đăng ký thành công!",
  text: "Vui lòng chuyển đến trang chủ",
  icon: "success",
  confirmButtonColor: "#3085d6",
  confirmButtonText: "Chuyển đến trang chủ!"
}).then((result) => {
    window.location="index.php";
});
    </script>
        <?php

        
     }}
?>


<!--header start here-->
<div class="header">
	
		<div class="header-main">
			<a href="index.php">
			<img src="favicon.jpg" style="width: 150px; border-radius: 50%; margin-left:155px; margin-top:-70px;" alt="">
		    </a>   
			<h1>Đăng ký</h1>
			<div class="header-bottom">
				<div class="header-right w3agile">
					
					<div class="header-left-bottom agileinfo">
						
					 <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
						<input type="text"  value="Tên đăng nhập" name="username" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Tên đăng nhập';}"/>
					<input type="password"  value="password" name="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>
					<input type="password"  value="password" name="checkpass" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'password';}"/>

                    <input type="text"  value="Họ tên" name="fullname" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Họ tên';}"/>
                    <input type="text"  value="Email" name="email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}"/>
                    <input type="text"  value="Số điện thoại" name="phone" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Số điện thoại';}"/>
                    <input type="text"  value="Địa chỉ" name="address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Địa chỉ';}"/>
						
					   
						<input type="submit" name="dangky" value="Đăng ký">
					</form>	
					<div class="forgot">
						 	<h6><a href="login.php">Bạn đã có tài khoản?</a></h6>
						 </div>
						
				</div>
				</div>
			  
			</div>
		</div>
</div>
<!--header end here-->
<div class="copyright">
	<p>© 2016 Classy Login Form. All rights reserved | Design by  <a href="http://w3layouts.com/" target="_blank">  W3layouts </a></p>
</div>
<!--footer end here-->
</body>
</html>