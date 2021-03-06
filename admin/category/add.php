<?php
require_once './../../dals/DalCategory.php';
$dalCategory = new DalCategory();
if (isset($_POST['name'])) {
    $payload = $_POST;
    if ($dalCategory->add($payload) > 0) {
        //thông báo thành công;
        $noti = "Thêm thành công";
    } else {
        //thông báo thất bại
        $noti = "Thêm thất bại";
    }
}

?>
<!doctype html>
<html lang="en">
<?php require_once './../commons/head.php'; ?>
<body>
<div class="container">
    <?php require_once './../commons/nav.php'; ?>
    <?php echo isset($noti) ? $noti : ''; ?>
    <section class="main-section">

        <form method="post">
            <input type="name" name="name"/>
            <button>Submit</button>
        </form>
    </section>

    <br>
    <div style="clear:both"></div>

    <?php require_once './../commons/footer.php'; ?>
</div>
</body>
</html>