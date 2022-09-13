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
            <form action="">
                <input type="number" name="id" id="id">
                <input type="text" name="crud_op" id="crud_op">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name">
                <select name="category_id" id="category_id">
                    <option value="test">test</option>
                </select>
                <label for="color">Color:</label>
                <input type="color" name="color" id="color">
            </form>
        </div>
    </main>
</body>
</html>