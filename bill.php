<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">

<link href="favicon.jpg" rel="icon">
<title>Bụi Camp- Hóa đơn</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
<style type="text/css">
    	body{
    margin-top:20px;
    color: #484b51;
}
.text-secondary-d1 {
    color: #728299!important;
}
.page-header {
    margin: 0 0 1rem;
    padding-bottom: 1rem;
    padding-top: .5rem;
    border-bottom: 1px dotted #e2e2e2;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -ms-flex-align: center;
    align-items: center;
}
.page-title {
    padding: 0;
    margin: 0;
    font-size: 1.75rem;
    font-weight: 300;
}
.brc-default-l1 {
    border-color: #dce9f0!important;
}

.ml-n1, .mx-n1 {
    margin-left: -.25rem!important;
}
.mr-n1, .mx-n1 {
    margin-right: -.25rem!important;
}
.mb-4, .my-4 {
    margin-bottom: 1.5rem!important;
}

hr {
    margin-top: 1rem;
    margin-bottom: 1rem;
    border: 0;
    border-top: 1px solid rgba(0,0,0,.1);
}

.text-grey-m2 {
    color: #888a8d!important;
}

.text-success-m2 {
    color: #86bd68!important;
}

.font-bolder, .text-600 {
    font-weight: 600!important;
}

.text-110 {
    font-size: 110%!important;
}
.text-blue {
    color: #478fcc!important;
}
.pb-25, .py-25 {
    padding-bottom: .75rem!important;
}

.pt-25, .py-25 {
    padding-top: .75rem!important;
}
.bgc-default-tp1 {
    background-color: rgba(121,169,197,.92)!important;
}
.bgc-default-l4, .bgc-h-default-l4:hover {
    background-color: #f3f8fa!important;
}
.page-header .page-tools {
    -ms-flex-item-align: end;
    align-self: flex-end;
}

.btn-light {
    color: #757984;
    background-color: #f5f6f9;
    border-color: #dddfe4;
}
.w-2 {
    width: 1rem;
}

.text-120 {
    font-size: 120%!important;
}
.text-primary-m1 {
    color: #4087d4!important;
}

.text-danger-m1 {
    color: #dd4949!important;
}
.text-blue-m2 {
    color: #68a3d5!important;
}
.text-150 {
    font-size: 150%!important;
}
.text-60 {
    font-size: 60%!important;
}
.text-grey-m1 {
    color: #7b7d81!important;
}
.align-bottom {
    vertical-align: bottom!important;
}
    </style>




<?php if(isset($_POST['thanhtoanck'])&& ($_POST['thanhtoanck'])){
    include 'connect_db.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $user_id=$_COOKIE['idu'];
    $fullname=$_POST['fullname_users'];
    $email=$_POST['email_users'];
    $phone=$_POST['phone_users'];
    $address=$_POST['address_users'];
    $note=$_POST['thongtinbosung'];
    $oder_date=date('Y-m-d H:i:s');
    $status=$_POST['payment'];

    $sql_oder="INSERT INTO oders(user_id,fullname,email,phone,address,note,order_date,status) 
    values($user_id,'$fullname','$email','$phone','$address','$note','$oder_date','$status')";
    $kq_oder=mysqli_query($con,$sql_oder);
    $sql_oder1="SELECT*FROM oders WHERE user_id=".$user_id." AND order_date='".$oder_date."'";
    $kq_oder1=mysqli_query($con,$sql_oder1);

    while($row_oder=mysqli_fetch_array($kq_oder1)){
        $order_id= $row_oder['id'];
    }
    for($i=0; $i< sizeof($_SESSION['giohang']);$i++){
        if($_SESSION['giohang'][$i][0]!=NULL && $_SESSION['giohang'][$i][1]!=NULL && $_SESSION['giohang'][$i][2]!=NULL && $_SESSION['giohang'][$i][3]!=NULL && $_SESSION['giohang'][$i][4]!=NULL && $_SESSION['giohang'][$i][5]!=NULL){
        $sql_oderdetail="INSERT INTO oder_details(order_id,product_id,price,num,day_rent,total_money) 
        values($order_id,".$_SESSION['giohang'][$i][5].",".$_SESSION['giohang'][$i][1].",".$_SESSION['giohang'][$i][2].",".$_SESSION['giohang'][$i][4].",".($_SESSION['giohang'][$i][1]*$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][4]).")";
        $kq_oderdetail=mysqli_query($con,$sql_oderdetail);
    }}
} ?>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<div class="page-content container">
<div class="page-header text-blue-d2">
<h1 class="page-title text-secondary-d1">
Bụi Camp
<small class="page-info">
<i class="fa fa-angle-double-right text-80"></i>
<a href="index.php">Trang chủ</a>
</small>
</h1>
<div class="page-tools">
<div class="action-buttons">
<a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="Print">
<i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
Print
</a>
<a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
<i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
Export
</a>
</div>
</div>
</div>
<div class="container px-0">
<div class="row mt-4">
<div class="col-12 col-lg-12">
<div class="row">
<div class="col-12">
<div class="text-center text-150">
<span class="text-default-d3">HÓA ĐƠN</span>
</div>
</div>
</div>

<hr class="row brc-default-l1 mx-n1 mb-4" />
<div class="row">
<div class="col-sm-6">
<div>
<span class="text-sm text-grey-m2 align-middle">Người nhận:</span>
<span class="text-600 text-110 text-blue align-middle"><?php echo $fullname;?></span>
</div>
<div class="text-grey-m2">
<div class="my-1">
Địa chỉ:
</div>
<div class="my-1">
<?php echo $address; ?>
</div>
<div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600"><?php echo $phone; ?></b></div>
</div>
</div>

<div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
<hr class="d-sm-none" />
<div class="text-grey-m2">
<div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
Đơn hàng
</div>
<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> <?php echo $order_id; ?></div>
<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Ngày đặt:</span> <?php echo $oder_date; ?></div>
<div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Trạng thái:</span> <span class="badge badge-warning badge-pill px-25"><?php echo $status; ?></span></div>
</div>
</div>

</div>
<div class="mt-4">
<div class="row text-600 text-white bgc-default-tp1 py-25">
<div class="d-none d-sm-block col-1">STT</div>
<div class="col-9 col-sm-5">Sản phẩm</div>
<div class="d-none d-sm-block col-4 col-sm-2">Số lượng</div>
<div class="d-none d-sm-block col-sm-2">Số ngày thuê</div>
<div class="col-2">Giá</div>
</div>
<?php for($i=0; $i< sizeof($_SESSION['giohang']);$i++){if($_SESSION['giohang'][$i][0]!=NULL && $_SESSION['giohang'][$i][1]!=NULL && $_SESSION['giohang'][$i][2]!=NULL && $_SESSION['giohang'][$i][3]!=NULL && $_SESSION['giohang'][$i][4]!=NULL && $_SESSION['giohang'][$i][5]!=NULL){ ?>
<div class="text-95 text-secondary-d3">
<div class="row mb-2 mb-sm-0 py-25">
<div class="d-none d-sm-block col-1"><?php echo ($i+1); ?></div>
<div class="col-9 col-sm-5"><?php echo $_SESSION['giohang'][$i][0]; ?></div>
<div class="d-none d-sm-block col-2"><?php echo $_SESSION['giohang'][$i][2]; ?></div>
<div class="d-none d-sm-block col-2 text-95"><?php echo $_SESSION['giohang'][$i][4]; ?></div>
<div class="col-2 text-secondary-d2"><?php echo $_SESSION['giohang'][$i][1]; ?></div>
</div>
</div>
<?php }}?>
<div class="row border-b-2 brc-default-l2"></div>

<div class="row mt-3">
<div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
Thông tin bổ sung: <?php echo $note;?>
</div>
<div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
<div class="row my-2">
</div>
<div class="row my-2">


</div>
<div class="row my-2 align-items-center bgc-primary-l3 p-2">
<div class="col-7 text-right">
Tổng tiền
</div>
<div class="col-5">
<span class="text-150 text-success-d3 opacity-2"><?php $totalbill=0; for($i=0; $i< sizeof($_SESSION['giohang']);$i++){ $totalbill+=($_SESSION['giohang'][$i][1]*$_SESSION['giohang'][$i][2]*$_SESSION['giohang'][$i][4]); } echo $totalbill;?> VND</span>
</div>
</div>
</div>
</div>
<hr/>
<div>
<span class="text-secondary-d1 text-105">Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi.</span>
</div>
</div>
</div>
</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
	
</script>
</body>
</html>