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
                    <tr>
                        <td>data 1</td>
                        <td>data 1</td>
                        <td>data 1</td>
                    </tr>
                    <tr>
                        <td>data 1</td>
                        <td>data 2</td>
                        <td>data 3</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>