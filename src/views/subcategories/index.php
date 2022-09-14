<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>SubCategories</title>
</head>
<body>
    <div class="body-container">
        <?php

use MyLog_ClassLib\DB\Enums\CRUD_Enum;

        include_once VIEW_PATH . '/components/_nav.php';
        ?>
    </div>

    <header>
        <div class="header-container">
            <h1>
                SubCategories Data Manager
            </h1>
        </div>
    </header>


    <main>
        <div class="main-container">
            <!-- 
                TODO: Create a readonly text block
                TODO: Use php to get data from db
                TODO: Lets use sqlite for this proj
            -->
            <!-- *GET -->
            <div class="mini-header">
                <a href="/subcategories/form?crud_op=<?= CRUD_Enum::WRITE ?>">Add New SubCategory</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>id</th>
                        <th>data1</th>
                        <th>data2</th>
                        <th>data3</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($subcategoriesList as $subcategory){ ?>
                        <tr>
                            <td><?= $subcategory['id'] ?></td>
                            <td><?= $subcategory['name'] ?></td>
                            <td><?= $subcategory['category_id']?></td>
                            <td><?= $subcategory['color']?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>