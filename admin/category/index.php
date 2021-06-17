<?php
require_once './../../dals/DalCategory.php';
$dalCategory = new DalCategory();
$categoryList = $dalCategory->get();
''
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="./../../public/admin.css">

</head>
<body>
<div class="container">
    <nav>
        <div><a>PDO CMS</a></div>
        <div><a>Category</a></div>
        <div><a>Product</a></div>
        <div><a>User</a></div>
    </nav>

    <section>
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
                        <a>Delete</a>
                        <a>Update</a>
                    </td>
                </tr>
                <?php
            }
            ?>

        </table>
    </section>


    <footer>
        2021 @Luan
    </footer>
</div>
</body>
</html>