<?php
include 'header.php';
// include 'light.css';
$config_name = "comment";
$config_title = "Bình luận";
if (!empty($_SESSION['current_user'])) {
    if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
        $_SESSION[$config_name.'_filter'] = $_POST;
        header('Location: '.$config_name.'_listing.php');exit;
    }
    if(!empty($_SESSION[$config_name.'filter'])){
        $where = "";
        foreach ($_SESSION[$config_name.'filter'] as $field => $value) {
            if(!empty($value)){
                switch ($field) {
                    case 'fullname':
                    $where .= (!empty($where))? " AND "."`".$field."` LIKE '%".$value."%'" : "`".$field."` LIKE '%".$value."%'";
                    break;
                    default:
                    $where .= (!empty($where))? " AND "."`".$field."` = ".$value."": "`".$field."` = ".$value."";
                    break;
                }
            }
        }
        extract($_SESSION[$config_name.'filter']);
    }
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    if(!empty($where)){
        $totalRecords = mysqli_query($con, "SELECT * FROM `comment` where (".$where.")");
    }else{
        $totalRecords = mysqli_query($con, "SELECT * FROM `comment`");
    }
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if(!empty($where)){
        $orders = mysqli_query($con, "SELECT * FROM `comment` where (".$where.") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }else{
        $orders = mysqli_query($con, "SELECT * FROM `comment` ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    $currentMenu = $orders->fetch_assoc();
    $result = mysqli_query($con, "SELECT * FROM users 
    INNER JOIN comment ON users.id = comment.user_id
    INNER JOIN products ON comment.product_id = products.id
    WHERE comment.user_id = '". $currentMenu['user_id'] . "' OR products.id = '" . $currentMenu['product_id']."'");
    mysqli_close($con);
    ?>
    <div class="main-content">
        <h1>Danh sách <?= $config_title ?></h1>
        <div class="listing-items">
            <!-- <div class="buttons">
                <a href="./<?= $config_name ?>_editing.php">Thêm <?= $config_title ?></a>
            </div> -->
            <div class="listing-search">
                <form id="<?= $config_name ?>-search-form" action="<?= $config_name ?>_listing.php?action=search" method="POST">
                    <fieldset>
                        <legend>Tìm kiếm <?= $config_title ?>:</legend>
                        ID: <input type="text" name="id" value="<?= !empty($id) ? $id : "" ?>" />
                        Tên khách hàng: <input type="text" name="fullname" value="<?= !empty($fullname) ? $fullname : "" ?>" />
                        <input type="submit" value="Tìm" />
                    </fieldset>
                </form>
            </div>
            <div class="total-items">
            <span>Có tất cả <strong>
                    <?=$totalRecords?>
                </strong>
                <?=$config_title?> trên <strong>
                    <?=$totalPages?>
                </strong> trang
            </span>
        </div>
            <table id="customers">
            <tr>
                <?php
                ?>
                <th>Tên khách hàng</th>
                <th>Tên sản phẩm</th>
                <th>Bình luận</th>
                <th>Đánh giá (sao)</th>
                <th>Xóa</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($result)) {
                    ?>
            <tr>
                <td><?= $row['fullname'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['note'] ?></td>
                <td><?=$row['rate_star'] ?></td>
                <!-- <td><a href="./<?=$config_name?>_delete.php?id=<?= $row['id'] ?>">Xóa</a></td> -->
                <td><a href="#">Xóa</a></td>
            </tr>
            <?php } ?>

            
          
        </table>
            <div class="clear-both"></div>
        </div>
    </div>
    <?php
}
include './footer.php';
?>