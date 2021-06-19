<?php
require_once './../../dals/DalCategory.php';
$dalCategory = new DalCategory();

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'update':
            header('location:update.php?id='.$_GET['id']);
            break;


        case 'delete':
            $id = $_GET['id'];
            $dalCategory->delete($id);
            break;
    }
}

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$categoryList = $dalCategory->get($page);

//tính ra tổng số trang
$totalPage = ceil($dalCategory->getTotalRows()/DalCategory::displayPerPage);


?>
<!doctype html>
<html lang="en">
<?php require_once './../commons/head.php'; ?>
<body>
<div class="container">
    <?php require_once './../commons/nav.php'; ?>

    <section class="main-section">
        <table>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Operation</td>
            </tr>

            <?php
            foreach ($categoryList as $categoryItem) {
                ?>
                <tr>
                    <td><?php echo $categoryItem['id']; ?></td>
                    <td><?php echo $categoryItem['name']; ?></td>
                    <td>
                        <a onclick="return confirm('Bạn chắc chắn muốn xoá ?')"
                           href="?action=delete&id=<?php echo $categoryItem['id']; ?>">Delete</a>
                        <a href="?action=update&id=<?php echo $categoryItem['id']; ?>">Update</a>
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>

        <br>
        <br>
        <ul class="pagination">
            <?php for ($i = 1;
                       $i <= $totalPage;
                       $i++) {
                ?>
                <li><a <?php if ($i == $page) {
                        echo 'class="active"';
                    } ?> href="?page=<?php echo $i; ?>"><?php echo $i ?></a></li>
                <?php
            } ?>
        </ul>

    </section>

    <br>
    <div style="clear:both"></div>

    <?php require_once './../commons/footer.php'; ?>
</div>
</body>
</html>