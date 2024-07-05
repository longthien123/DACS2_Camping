<?php
        include '../connect_db.php';
        if (isset($_POST['update'])) {
    $status = $_POST['statuss'];
    $id = $_POST['xuly_id'];
    $result3 = mysqli_query($con, "UPDATE `oders` SET `status` = '".$status."' WHERE id = '$id'");

}
?>

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
    $result = mysqli_query($con, "SELECT*FROM products INNER JOIN oder_details ON products.id = oder_details.product_id WHERE  oder_details.order_id = ". $_GET['id']);     
    $result1 = mysqli_query($con, "SELECT*FROM `oders` WHERE  `id` = ". $_GET['id']);     
    $currentMenu = $result1->fetch_assoc();
    $_SESSION['user_id'] = $_GET['id'];
    ?>
    <div class="main-content">
    <h1 class="">Chi tiết đơn hàng</h1>
    <div class="">
							<form class="card" method="POST">
								<div class="card-body">
									<div class="form-floating">
                                        <input type="hidden" name="xuly_id" value="<?= $currentMenu['id'] ?>">
										<input type="text" class="form-control" id="floatingInput2" value="<?= $currentMenu['fullname'] ?>">
										<label for="floatingInput2">Tên khách hàng</label>
									</div>
                                    <div class="my-2"><span class="text-600 text-90">Trạng thái:</span> <span class="badge rounded-pill bg-warning"><?= $currentMenu['status'] ?></span></div>
                                    <div style="margin-top: 15px;"class="form-floating mb-3">
										<select name="statuss" class="form-select" id="floatingSelect" aria-label="Floating label select example">
                                        <option selected=""><?= $currentMenu['status'] ?></option>
                                        <option value="Chưa thanh toán">Chưa thanh toán</option>
                                        <option value="Đã thanh toán">Đã thanh toán</option>
                                        </select>
										<label for="floatingSelect">Tình trạng</label>
									</div>
								</div>
                                <div  style="text-align:end" class="">
                                <input style="margin: 0 21px 13px;" type="submit" class="btn btn-danger" name="update"></input>							
                                </div>
                            </form>
						</div>
        <table id="customers" style="background-color:white">
            <tr>
                <th>ID</th>
                <th>Ảnh sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Thành tiền</th>
                <th>Xóa</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($result)) {
                    ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td style="display: block;width: 100%;height: 90px;"><img style="width: 100px;padding: 5px;height: 80px;" src="../<?= $row['image'] ?>" alt="<?= $row['name'] ?>" title="<?= $row['name'] ?>" /></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['price'] ?></td>
                <td><?= $row['num'] ?></td>
                <td><?= $row['total_money'] ?></td>
                <td><a href="order_detail_del.php?id=<?= $row['id'] ?>">Xóa</a></td>
            </tr>
            <?php } ?>
        </table>

        <!-- <a style="margin-top: 10px" class="btn btn-success">+ Thêm sản phẩm</a> -->
    </div>
</body>
</html>