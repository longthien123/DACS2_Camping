<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANG QUẢN TRỊ</title>
    <link rel="stylesheet" href="light.css">
</head>
<body>
    <?php include 'header.php';
 ?>
   <div class="main-content" style="height: 80vh">
    <!-- <h1>XIN CHÀO ADMIN</h1> -->
   <div class="row">
        <div class="col-12 col-sm-6 col-xxl-3 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <?php 
                            include '../connect_db.php';
                            $result = mysqli_query($con, "SELECT COUNT(*) AS total FROM products");
                            $currentMenu = $result->fetch_assoc();
                            ?>
                            <h3 class="mb-2"><?= $currentMenu['total'] ?></h3>
                            <p class="mb-2">Sản phẩm</p>
                            <div class="mb-0">
                                <span class="badge badge-soft-success me-2"> +5.35% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                        <div class="d-inline-block ms-3">
                            <div class="stat">
                                <a href="product_listing.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag align-middle me-2"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>                            
                                </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl-3 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                            <?php 
                            include '../connect_db.php';
                            $result = mysqli_query($con, "SELECT COUNT(*) AS total FROM oders");
                            $currentMenu = $result->fetch_assoc();
                            ?>
                            <h3 class="mb-2"><?= $currentMenu['total'] ?></h3>
                            <p class="mb-2">Đơn hàng</p>
                            <div class="mb-0">
                                <span class="badge badge-soft-success me-2"> +7.85% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                        <div class="d-inline-block ms-3">
                            <div class="stat">
                                <a href="order_listing.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart align-middle me-2"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>                            
                                </a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl-3 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                        <?php 
                            include '../connect_db.php';
                            $result = mysqli_query($con, "SELECT COUNT(*) AS total FROM users");
                            $currentMenu = $result->fetch_assoc();
                            ?>
                            <h3 class="mb-2"><?= $currentMenu['total'] ?></h3>
                            <p class="mb-2">Thành viên</p>
                            <div class="mb-0">
                                <span class="badge badge-soft-success me-2"> +8.65% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                        <div class="d-inline-block ms-3">
                            <div class="stat">
                                <a href="member_listing.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity align-middle me-2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>                            
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-xxl-3 d-flex">
            <div class="card flex-fill">
                <div class="card-body py-4">
                    <div class="d-flex align-items-start">
                        <div class="flex-grow-1">
                        <?php 
                            include '../connect_db.php';
                            $result = mysqli_query($con, "SELECT COUNT(*) AS total FROM comment");
                            $currentMenu = $result->fetch_assoc();
                            ?>
                            <h3 class="mb-2"><?= $currentMenu['total'] ?></h3>
                            <p class="mb-2">Bình luận</p>
                            <div class="mb-0">
                                <span class="badge badge-soft-success me-2"> +0.6% </span>
                                <span class="text-muted">Since last week</span>
                            </div>
                        </div>
                        <div class="d-inline-block ms-3">
                            <div class="stat">
                                <a href="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity align-middle me-2"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg>                            
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xl-3 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0 mt-2">TỔNG DOANH THU</h5>
								</div>
								<div class="card-body my-0 pt-0">
									<div class="row d-flex align-items-center mb-3">
                                    <?php 
                                    include '../connect_db.php';
                                    $result = mysqli_query($con, "SELECT SUM(oder_details.total_money) AS tong_tien FROM oder_details
                                    INNER JOIN oders ON oder_details.order_id = oders.id
                                    WHERE oders.status = 'Đã thanh toán'");
                                    $currentMenu = $result->fetch_assoc();
                                ?>
										<div class="col-8">
											<h3 class="d-flex align-items-center mb-0 fw-light">
                                            <?= $currentMenu['tong_tien'] ?>
											</h3>
										</div>
										<div class="col-4 text-end">
											<span class="text-muted">VND</span>
										</div>
									</div>

									<div class="progress progress-sm shadow-sm mb-1">
										<div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
									</div>
								</div>
							</div>
						</div>
        <div class="col-lg-6 col-xl-3 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0 mt-2">ĐƠN HÀNG ĐÃ THANH TOÁN</h5>
								</div>
								<div class="card-body my-0 pt-0">
									<div class="row d-flex align-items-center mb-3">
                                    <?php 
                            include '../connect_db.php';
                            $result = mysqli_query($con, "SELECT COUNT(*) AS total FROM oders WHERE status = 'Đã thanh toán'");
                            $currentMenu = $result->fetch_assoc();
                            ?>
										<div class="col-8">
											<h3 class="d-flex align-items-center mb-0 fw-light">
                                            <?= $currentMenu['total'] ?>
											</h3>
										</div>
										<div class="col-4 text-end">
											<span class="text-muted">Đơn</span>
										</div>
									</div>

									<div class="progress progress-sm shadow-sm mb-1">
										<div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
									</div>
								</div>
							</div>
						</div>
        <div class="col-lg-6 col-xl-3 d-flex">
							<div class="card flex-fill">
								<div class="card-header">
									<h5 class="card-title mb-0 mt-2">ĐƠN HÀNG CHƯA THANH TOÁN</h5>
								</div>
								<div class="card-body my-0 pt-0">
									<div class="row d-flex align-items-center mb-3">
                                    <?php 
                            include '../connect_db.php';
                            $result = mysqli_query($con, "SELECT COUNT(*) AS total FROM oders WHERE status = 'Chưa thanh toán'");
                            $currentMenu = $result->fetch_assoc();
                            ?>
										<div class="col-8">
											<h3 class="d-flex align-items-center mb-0 fw-light">
                                            <?= $currentMenu['total'] ?>
											</h3>
										</div>
										<div class="col-4 text-end">
											<span class="text-muted">Đơn</span>
										</div>
									</div>

									<div class="progress progress-sm shadow-sm mb-1">
										<div class="progress-bar bg-primary" role="progressbar" style="width: 100%"></div>
									</div>
								</div>
							</div>
						</div>
        <div class="card">
								<div class="card-header">
									<h5 class="card-title mb-0">Trang web Cho Thuê Đồ Dã Ngoại </h5>
									<div class="badge bg-info my-2">Đang hoạt động</div>
								</div>
								<div class="card-body pt-0">
									<h5>Miêu tả</h5>

									<p class="text-muted">
                                    Chào mừng bạn đến với Trang web Cho Thuê Đồ Dã Ngoại - nơi cung cấp trải nghiệm dã ngoại hoàn hảo cho mọi người! Chúng tôi tự hào là điểm đến đáng tin cậy để bạn có được mọi thứ cần thiết cho chuyến phiêu lưu ngoại ô của mình.
									<p class="text-muted">
                                    Đa dạng Sản Phẩm Dã Ngoại <br>Dễ Dàng Cho Thuê và Đặt Hàng <br>Chất Lượng và Bảo Dưỡng <br> Hỗ Trợ Khách Hàng Nhanh Chóng <br>

									</p>

									<div>
										<h5>Thành viên</h5>
										<img src="img/avatars/avatar-3.jpg" class="rounded-circle me-1" alt="Thanh Tuấn" width="34" height="34">
										<img src="img/avatars/avatar-2.jpg" class="rounded-circle me-1" alt="Long Thiên" width="34" height="34">
									</div>
								</div>
							</div>
    </div>
   </div>
</body>
</html>