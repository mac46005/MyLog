<?php
$crud_op = $_GET['crud_op'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $crud_op ?> Category</title>
</head>
<body>
    <div class="body-container">
        <header>
            <div class="header-container">
                <h1><?php echo $crud_op ?> Category</h1>
            </div>
        </header>


        <main>
            <div class="main-container">
                <form action="/categories/submit-form" method="post">
                    <input type="text" name="crud_op" id="crud_op" value="<?= $crud_op ?>">
                    <input type="text" name="id" id="id">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name">
                    <label for="color">Color:</label>
                    <input type="color" name="color" id="color">
                    <input type="submit" value="<?= $crud_op ?> Category">
                </form>
            </div>
        </main>
    </div>
</body>
</html>