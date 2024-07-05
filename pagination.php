<div class="ps-pagination">
    <ul class="pagination">
    <?php
//hiển thị trang đầu tiên
if ($current_page > 3) {
    $first_page = 1;?>
    <?php
            if(!empty($_SESSION['category_id'])){?>
            <li>
                <a class="" href="?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>&iddm=<?= $_SESSION['category_id']?>&field=<?=  $_SESSION['orderField'] ?>&sort=<?=  $_SESSION['orderSort'] ?>">Đầu</a>
            </li>
            <?php
            }else{?>
            <li>
            <a class="" href="?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>&field=<?=  $_SESSION['orderField'] ?>&sort=<?=  $_SESSION['orderSort'] ?>">Đầu</a>
            </li>
            <?php
            }?>
    <?php
}
// hiển thị trang đứng trước
if ($current_page > 1) {
    $prev_page = $current_page - 1;
    ?>
        <?php
            if(!empty($_SESSION['category_id'])){?>
            <li>
                <a class="" href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>&iddm=<?= $_SESSION['category_id'] ?>&field=<?=  $_SESSION['orderField'] ?>&sort=<?=  $_SESSION['orderSort'] ?>"><i class="fa fa-angle-left"></i></a>
            </li>
            <?php
            }else{?>
            <li>
            <a class="" href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>&field=<?=  $_SESSION['orderField'] ?>&sort=<?=  $_SESSION['orderSort'] ?>"><i class="fa fa-angle-left"></i></a>
            </li>
            <?php
            }?>
<?php }
?>
<?php for ($num = 1; $num <= $totalPages; $num++) { ?>
    <?php if ($num != $current_page) { ?>
        <!-- hiển thị 2 trang bên cạnh và ẩn các trang khác -->
        <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
            <!-- hiển thị số trang -->
            <?php
            if(!empty($_SESSION['category_id'])){?>
                <li>
            <a class="" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>&iddm=<?= $_SESSION['category_id'] ?>&field=<?=  $_SESSION['orderField'] ?>&sort=<?=  $_SESSION['orderSort'] ?>"><?= $num ?></a>
            </li>
            <?php
            }else{?>
            <li>
            <a class="" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>&field=<?=  $_SESSION['orderField'] ?>&sort=<?=  $_SESSION['orderSort'] ?>"><?= $num ?></a>
            </li>
            <?php
            }?>
            
        <?php } ?>
    <?php } else { ?>
        <!-- in đậm khi chọn vào -->
        <li class="active" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><a href="#"><?= $num ?></a></li>
        <!-- <strong class="active"></strong> -->
    <?php } ?>
<?php } 
 if ($current_page < $totalPages - 1) {
     $next_page = $current_page + 1;
     ?>
        <?php
            if(!empty($_SESSION['category_id'])){?>
            <li>
                <a class="" href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>&iddm=<?= $_SESSION['category_id'] ?>&field=<?=  $_SESSION['orderField'] ?>&sort=<?=  $_SESSION['orderSort'] ?>"><i class="fa fa-angle-right"></i></a>
            </li>
            <?php
            }else{?>
            <li>
            <a class="" href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>&field=<?=  $_SESSION['orderField'] ?>&sort=<?=  $_SESSION['orderSort'] ?>"><i class="fa fa-angle-right"></i></a>
            </li>
            <?php
            }?>
 <?php
 }
// hiển thị trang cuối -->
if ($current_page < $totalPages - 3) {
    $end_page = $totalPages;
    ?>
    <?php
            if(!empty($_SESSION['category_id'])){?>
            <li>
                <a class="" href="?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>&iddm=<?= $_SESSION['category_id'] ?>&field=<?=  $_SESSION['orderField'] ?>&sort=<?=  $_SESSION['orderSort'] ?>">Cuối</a>
            </li>
            <?php
            }else{?>
            <li>
            <a class="" href="?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>&field=<?=  $_SESSION['orderField'] ?>&sort=<?=  $_SESSION['orderSort'] ?>">Cuối</a>
            </li>
            <?php
            }?>
<?php
}
?>
</ul>
</div>