<?php
include 'header.php';
$config_name = "member";
$config_title = "thành viên";
if (!empty($_SESSION['current_user'])) {
    if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
        $_SESSION['member_filter'] = $_POST;
        header('Location: member_listing.php');exit;
    }
    if(!empty($_SESSION['member_filter'])){
        $where = "";
        foreach ($_SESSION['member_filter'] as $field => $value) {
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
        extract($_SESSION['member_filter']);
    }
    $item_per_page = (!empty($_GET['per_page'])) ? $_GET['per_page'] : 10;
    $current_page = (!empty($_GET['page'])) ? $_GET['page'] : 1;
    $offset = ($current_page - 1) * $item_per_page;
    if(!empty($where)){
        $totalRecords = mysqli_query($con, "SELECT * FROM `Users` where (".$where.")");
    }else{
        $totalRecords = mysqli_query($con, "SELECT * FROM `Users`");
    }
    $totalRecords = $totalRecords->num_rows;
    $totalPages = ceil($totalRecords / $item_per_page);
    if(!empty($where)){
        $products = mysqli_query($con, "SELECT * FROM `Users` where (".$where.") ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }else{
        $products = mysqli_query($con, "SELECT * FROM `Users` ORDER BY `id` DESC LIMIT " . $item_per_page . " OFFSET " . $offset);
    }
    mysqli_close($con);
    ?>
<div class="main-content">
    <h1>Danh sách
        <?=$config_title?>
    </h1>
    <div class="listing-items">
        <div class="buttons">
            <a href="./<?=$config_name?>_editing.php">Thêm
                <?=$config_title?>
            </a>
        </div>
        <div class="listing-search">
            <form id="<?=$config_name?>-search-form" action="<?=$config_name?>_listing.php?action=search" method="POST">
                <fieldset>
                    <legend>Tìm kiếm
                        <?=$config_title?>:
                    </legend>
                    ID: <input type="text" name="id" value="<?=!empty($id)?$id:""?>" />
                    Tên
                    <?=$config_title?>: <input type="text" name="fullname" value="<?=!empty($fullname)?$fullname:""?>" />
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
                <th>Tên <?= $config_title ?></th>
                <th>Username</th>
                <th>Email</th>
                <th>Ngày tạo</th>
                <th>Ngày cập nhật</th>
                <th>Sửa</th>
                <th>Copy</th>
                <th>Xóa</th>
            </tr>
            <?php while ($row = mysqli_fetch_array($products)) {
                    ?>
            <tr>
                <td><?= $row['fullname'] ?></td>
                <td><?= $row['username'] ?></td>
                <td><?= $row['email'] ?></td>
                <td><?= date('d/m/Y H:i', $row['created_time']) ?></td>
                <td><?= date('d/m/Y H:i', $row['last_updated']) ?></td>
                <td><a href="./<?=$config_name?>_editing.php?id=<?= $row['id'] ?>">Sửa</a></td>
                <td><a href="./<?=$config_name?>_editing.php?id=<?= $row['id'] ?>&task=copy">Copy</a></td>
                <td><a href="./<?=$config_name?>_delete.php?id=<?= $row['id'] ?>">Xóa</a></td>
            </tr>
            <?php } ?>
        </table>
        <?php
            include './pagination.php';
            ?>
        <div class="clear-both"></div>
    </div>
</div>
<?php
}
include './footer.php';
?>