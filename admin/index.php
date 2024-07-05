<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TRANG QUẢN TRỊ</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="light.css">
        <style>
            .box-content{
                margin: 0 auto;
                width: 800px;
                border: 1px solid #ccc;
                text-align: center;
                padding: 20px;
            }
            #user_login form{
                width: 200px;
                margin: 40px auto;
            }
            #user_login form input{
                margin: 5px 0;
            }
        </style>
    </head>
    <body>
        <?php
        session_start();
        include '../connect_db.php';
        $error = false;
        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $result = mysqli_query($con, "Select `id`,`username`,`fullname`,`birthday` from `Users` WHERE (`username` ='" . $_POST['username'] . "' AND `password` = '" . $_POST['password'] . "' AND `role_id` = '1')");
            if (!$result) {
                $error = mysqli_error($con);
            } else {
                $user = mysqli_fetch_assoc($result);
                $_SESSION['current_user'] = $user;
            }
            mysqli_close($con);
            if ($error !== false || $result->num_rows == 0) {
                ?>
                <div id="login-notify" class="box-content">
                    <h1>Thông báo</h1>
                    <h4><?= !empty($error) ? $error : "Bạn không phải ADMIN! Vui lòng đăng nhập lại." ?></h4>
                    <a href="./index.php">Quay lại</a>
                </div>
                <?php
                exit;
            }
            ?>
        <?php } ?>
        <?php if (empty($_SESSION['current_user'])) { ?>
            <div class="container d-flex flex-column">
				<div class="row h-100">
					<div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
						<div class="d-table-cell align-middle">

							<div class="text-center mt-4">
								<h1 class="h2">Chào mừng đến với TRANG QUẢN TRỊ!</h1>
								<p class="lead">
									Vui lòng đăng nhập để tiếp tục
								</p>
							</div>

							<div class="card">
								<div class="card-body">
									<div class="m-sm-3">
										
                                        <form action="./index.php" method="Post" autocomplete="off">
											<div class="mb-3">
												<label class="form-label">Tên đăng nhập</label>
												<input class="form-control form-control-lg" type="text" name="username" placeholder="Nhập tên đăng nhập">
											</div>
											<div class="mb-3">
												<label class="form-label">Mật khẩu</label>
												<input class="form-control form-control-lg" type="password" name="password" placeholder="Nhập mật khẩu">
											</div>
											<div>
												<div class="form-check align-items-center">
													<input id="customControlInline" type="checkbox" class="form-check-input" value="remember-me" name="remember-me" checked="">
													<label class="form-check-label text-small" for="customControlInline">Remember me</label>
												</div>
											</div>
											<div class="d-grid gap-2 mt-3">
												<input type="submit" value="Đăng nhập" class="btn btn-primary"></input>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
            <?php
        } else {
            $currentUser = $_SESSION['current_user'];
            ?>
            <!-- <div id="login-notify" class="box-content">
                Xin chào <?= $currentUser['fullname'] ?><br/>
                <a href="./product_listing.php">Quản lý sản phẩm</a><br/>
                <a href="./edit.php">Đổi mật khẩu</a><br/>
                <a href="./logout.php">Đăng xuất</a>
            </div> -->
            <?php header('Location: home.php'); ?>
        <?php } ?>
    </body>
</html>