<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add / Edit Subcategory</title>
</head>
<body>
    <?php
    include VIEW_PATH . '/components/_nav.php';
    ?>
    <header>
        <div class="header-container">

        </div>
    </header>
    <main>
        <div class="main-container">
            <form action="/subcategories/submit-form" method="POST">
                <input type="number" name="id" id="id">
                <input type="text" name="crud_op" id="crud_op" value="<?= $crud_op ?>">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id">
                    <?php foreach($categoryList as $category){ ?>
                        <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                    <?php } ?>
                </select>
                <label for="color">Color:</label>
                <input type="color" name="color" id="color">
                <input type="submit" value="<?= $crud_op ?> Subcategory">
            </form>
        </div>
    </main>
</body>
</html>