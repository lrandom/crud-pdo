<?php
require_once './../../dals/DalCategory.php';
$dalCategory = new DalCategory();
$id = $_GET['id'];

if (isset($_POST['name'])) {
    $payload = $_POST;
    if ($dalCategory->edit($id, $payload)) {
        //thông báo thành công;
        $noti = "Edit thành công";
    } else {
        //thông báo thất bại
        $noti = "Edit thất bại";
    }
}

$obj = $dalCategory->getOne($id);
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
            <input type="name" name="name" value="<?php echo $obj['name']; ?>"/>
            <button>Submit</button>
        </form>
    </section>

    <br>
    <div style="clear:both"></div>

    <?php require_once './../commons/footer.php'; ?>
</div>
</body>
</html>