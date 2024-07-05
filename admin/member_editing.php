<?php
include 'header.php';
if (!empty($_SESSION['current_user'])) {
    ?>
    <div class="main-content">
        <h1><?= !empty($_GET['id']) ? ((!empty($_GET['task']) && $_GET['task'] == "copy") ? "Copy thành viên" : "Sửa thành viên") : "Thêm thành viên" ?></h1>
        <div id="content-box">
            <?php
            if (isset($_GET['action']) && ($_GET['action'] == 'add' || $_GET['action'] == 'edit')) {
                if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
                    if (empty($_POST['username'])) {
                        $error = "Bạn phải nhập username";
                    } elseif (empty($_POST['password'])) {
                        $error = "Bạn phải nhập password";
                    } 
                    // elseif (empty($_POST['position'])) {
                    //     $error = "Bạn phải nhập thứ tự danh mục";
                    // } 
                    if (!isset($error)) {
                        if ($_GET['action'] == 'edit' && !empty($_GET['id'])) { //Cập nhật lại thành viên                            
                            $result = mysqli_query($con, "UPDATE `Users` SET `username` = '".$_POST['username']."', `password` = '".$_POST['password']."',`fullname` = '".$_POST['fullname']."',`email` = '".$_POST['email']."',`phone` = '".$_POST['phone']."',`address` = '".$_POST['address']."',`role_id` =  '" . $_POST['idrole'] . "',`last_updated` = '".time()."' WHERE `Users`.`id` = ".$_GET['id'].";");
                        } else { //Thêm thành viên
                            $result = mysqli_query($con, "INSERT INTO `Users` (`id`,`username`, `password`,`fullname`,`email`, `phone`,`address`,`role_id`,`created_time`, `last_updated`) VALUES (NULL,'".$_POST['username']."', '".$_POST['password']."','".$_POST['fullname']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['address']."','".$_POST['idrole']."',".time().", ".time().");");
                        }
                        if (!$result) { //Nếu có lỗi xảy ra
                            $error = "Có lỗi xảy ra trong quá trình thực hiện.";
                        } 
                    }
                } else {
                    $error = "Bạn chưa nhập thông tin thành viên.";
                }
                ?>
                <div class = "container">
                    <div class = "error"><?= isset($error) ? $error : "Cập nhật thành công" ?></div>
                    <a href = "member_listing.php">Quay lại danh sách thành viên</a>
                </div>
                <?php
            } else {
                $result = mysqli_query($con, "SELECT * FROM `Users`");
                $menuList = mysqli_fetch_all($result, MYSQLI_ASSOC);
                //$menuTree = createMenuTree($menuList, 0);
                //Sửa danh mục
                if (!empty($_GET['id'])) {
                    $result = mysqli_query($con, "SELECT * FROM `Users` WHERE `id` = " . $_GET['id']);
                    $currentMenu = $result->fetch_assoc();
                }
                ?>
                <form id="editing-form" method="POST" action="<?= (!empty($currentMenu) && !isset($_GET['task'])) ? "?action=edit&id=" . $_GET['id'] : "?action=add" ?>"  enctype="multipart/form-data">
                    <input type="submit" title="Lưu danh mục" value="" />
                    <div class="clear-both"></div>
                    <div class="wrap-field">
                        <label>Tên đăng nhập: </label>
                        <input type="text" name="username" value="<?= (!empty($currentMenu) ? $currentMenu['username'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Mật khẩu: </label>
                        <input type="password" name="password" value="<?= (!empty($currentMenu) ? $currentMenu['password'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Tên đầy đủ: </label>
                        <input type="text" name="fullname" value="<?= (!empty($currentMenu) ? $currentMenu['fullname'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Email: </label>
                        <input type="text" name="email" value="<?= (!empty($currentMenu) ? $currentMenu['email'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>SĐT: </label>
                        <input type="text" name="phone" value="<?= (!empty($currentMenu) ? $currentMenu['phone'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <label>Địa chỉ: </label>
                        <input type="text" name="address" value="<?= (!empty($currentMenu) ? $currentMenu['address'] : "") ?>" />
                        <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                        <?php
                        if(!empty($currentMenu)){
                            $kq1 = mysqli_query($con, "SELECT * FROM `role`  WHERE `id` = " . (!empty($currentMenu) ? $currentMenu['role_id'] : ""));
                            while($row1 = mysqli_fetch_array($kq1)){?>
                            <label>Quyền hiện tại: </label>
                               <input type="text" name="" value="<?= $row1['name']?>" />
                               <?php
                           }
                        }?>
                                <div class="clear-both"></div>
                    </div>
                    <div class="wrap-field">
                    <label>Phân quyền: </label>
                        <select name="idrole" id="" style ="margin-bottom: 10px;line-height: 32px;float: left;padding: 9px 18px 9px 10px;">
                        <?php
                            $kq = mysqli_query($con, "SELECT * FROM `role`");
                             while($row = mysqli_fetch_array($kq)){
                                  echo '<option value = "' . $row['id'].'">'.$row['name'].'</option>';
                            }
                        ?>
                        </select>
                                <div class="clear-both"></div>
                    </div>
                </form>
                <div class="clear-both"></div>
            <?php } ?>
        </div>
    </div>

    <?php
}
include './footer.php';
?>