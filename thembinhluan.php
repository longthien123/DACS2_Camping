<script src="https://code.jquery.com/jquery-1.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.5/dist/sweetalert2.min.css">
<?php
if(isset($_POST['guidanhgia'])&& ($_POST['guidanhgia'])){
  if(!isset($_COOKIE['user_cookie'])){
    
  
    echo '<input type="hidden"  value="">';
?> <script>
Swal.fire({
title: "Bạn chưa đăng nhập!",
text: "Vui lòng đăng nhập để đánh giá sản phẩm",
icon: "error",
confirmButtonColor: "#3085d6",
confirmButtonText: "Đăng nhập!"
}).then((result) => {
window.location="login.php";
});
</script><?php
  }else{
    $user_id=$_POST['user_id'];
    $product_id=$_POST['product_id'];
    $rating= $_POST['rating_star'];
    $note_rate= $_POST['note_rate'];
    include 'connect_db.php';
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $date= date('Y-m-d H:i:s');
    $sql_comment="INSERT INTO comment(user_id,product_id,note,rate_star) 
    values($user_id,$product_id,'$note_rate',$rating)";
    $kq_comment=mysqli_query($con,$sql_comment);
    header("location: product-detail.php?idsp=$product_id#tab_01");
  }}
?>