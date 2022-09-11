<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <div class="body-container">
        <?php
        include_once VIEW_PATH . '/components/_nav.php';
        ?>

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
        <section>
            <div class="inputsection-container">
                <!-- TODO: Text box for user to input data -->
                <!-- POST -->
                <form action="">
                    <!-- 
                        TODO: Make it to where the user can enter a category
                        TODO: AutoComplete
                        TODO: If category not found add new category
                        TODO: when added use logic to mkshort
                    -->
                    <label for="category">Category:</label>
                    <input type="text" name="category" id="category">
                    <label for="description">Description</label>
                    <input type="text" name="description" id="description">
                    <button type="submit">Add</button>
                </form>
            </div>
        </section>
        <footer>
            <footer class="footer-container">
                FOOTER
            </footer>
        </footer>
    </div>
</body>
</html>