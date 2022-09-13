
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Categories</title>
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
                Categories Data Manager
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
            <div>
                <h4>Current Listing</h4>
                <a href="/categories/form?crud_op=<?= CRUD_Enum::WRITE ?>">Add New Category</a>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Color</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($categoryList as $category){ ?>
                        <tr>
                            <td><?= $category['id']?></td>
                            <td><?= $category['name']?></td>
                            <td><?= $category['color']?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>