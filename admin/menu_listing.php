<?php
include 'header.php';
$config_name = "menu";
$config_title = "danh mục";
if (!empty($_SESSION['current_user'])) {
    if (!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)) {
        $_SESSION[$config_name . '_filter'] = $_POST;
        header('Location: ' . $config_name . '_listing.php');
        exit;
    }
    if (!empty($_SESSION[$config_name . '_filter'])) {
        $where = "";
        foreach ($_SESSION[$config_name . '_filter'] as $field => $value) {
            if (!empty($value)) {
                switch ($field) {
                    case 'name':
                        $where .= (!empty($where)) ? " AND " . "`" . $field . "` = '" . $value . "'" : "`" . $field . "` = '" . $value . "'";
                        break;
                    default:
                        $where .= (!empty($where)) ? " AND " . "`" . $field . "` = " . $value . "" : "`" . $field . "` = " . $value . "";
                        break;
                }
            }
        }
        extract($_SESSION[$config_name . '_filter']);
    }
    if (!empty($where)) {}else{
        $danhmuc = mysqli_query($con, "SELECT * FROM `category`");
    }
    mysqli_close($con);
    ?>
    <div class="main-content">
        <h1>Danh sách <?= $config_title ?></h1>
        <div class="listing-items">
            <div class="buttons">
                <a href="./<?= $config_name ?>_editing.php">Thêm <?= $config_title ?></a>
            </div>
            <div class="listing-search">
                <form id="<?= $config_name ?>-search-form" action="<?= $config_name ?>_listing.php?action=search" method="POST">
                    <fieldset>
                        <legend>Tìm kiếm <?= $config_title ?>:</legend>
                        Tên <?= $config_title ?>: <input type="text" name="name" value="<?= !empty($name) ? $name : "" ?>" />
                        <input type="submit" value="Tìm" />
                    </fieldset>
                </form>
            </div>
            <ul id="<?= $config_name ?>-list">
                <li class="listing-item-heading">
                    <div class="listing-prop listing-name"  style="width:301px;">Tên <?= $config_title ?></div>
                    <!-- <div class="listing-prop"  style="width:30px;">Link</div> -->
                    <div class="listing-prop listing-button">
                        Sửa
                    </div>
                    <div class="listing-prop listing-button">
                        Copy
                    </div>
                    <div class="listing-prop listing-button">
                        Xóa
                    </div>
                    <div class="listing-prop listing-time">Ngày tạo</div>
                    <div class="listing-prop listing-time">Ngày cập nhật</div>
                    <div class="clear-both"></div>
                </li>
                <?php
                while ($row = mysqli_fetch_array($danhmuc)) {
                    ?>
                    <li>
                        <div class="listing-prop listing-name"><?= $row['name'] ?></div>
                        <div class="listing-prop listing-button">
                            <a href="./<?=$config_name?>_delete.php?id=<?= $row['id'] ?>">Xóa</a>
                        </div>
                        <div class="listing-prop listing-button">
                            <a href="./<?=$config_name?>_editing.php?id=<?= $row['id'] ?>">Sửa</a>
                        </div>
                        <div class="listing-prop listing-button">
                            <a href="./<?=$config_name?>_editing.php?id=<?= $row['id'] ?>&task=copy">Copy</a>
                        </div>
                        <div class="listing-prop listing-time"><?= date('d/m/Y H:i', $row['created_time']) ?></div>
                        <div class="listing-prop listing-time"><?= date('d/m/Y H:i', $row['last_updated']) ?></div>
                        <div class="clear-both"></div>
                    </li>
                <?php } ?>
            </ul>
            <div class="clear-both"></div>
        </div>
    </div>
    <?php
}
include './footer.php';
?>