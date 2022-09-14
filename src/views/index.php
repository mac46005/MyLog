<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/components/_table.css">
    <title>Home</title>
</head>
<body>
    <div class="body-container">
        <?php
        include_once VIEW_PATH . '/components/_nav.php';
        ?>
        <header>
            <div class="header-container">
                <h1>
                    My Daily Log
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
                    <thead class="tableHead">
                        <tr>
                            <th>Category</th>
                            <th>SubCategory</th>
                            <th>Description</th>
                            <th>TimeStamp</th>
                        </tr>
                    </thead>
                    <tbody class="tableBody">
                        <?php foreach($logitemsList as $logItem){ ?>
                            <tr>
                                <?php
                                foreach($categoriesList as $category){
                                    if($category['id'] == $logItem['category_id']){
                                        echo '<td style="color:'.$category['color'].';">';
                                        echo $category['name'];
                                        echo "</td>";
                                    }
                                }
                                ?>
                                <?php
                                foreach($subcategoriesList as $subcategory){
                                    if($subcategory['id'] == $logItem['subcategory_id']){
                                        echo '<td style="color:'.$subcategory['color'].';">';
                                        echo $subcategory['name'];
                                        echo "</td>";
                                    }
                                }
                                ?>
                                <td><?= $logItem['description'] ?></td>
                                <td><?= $logItem['timestamp'] ?></td>
                            </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>
        </main>
        <section>
            <div class="inputsection-container">
                <!-- TODO: Text box for user to input data -->
                <!-- POST -->
                <form action="/submit-form" method="POST">
                    <!-- 
                        TODO: Make it to where the user can enter a category
                        TODO: AutoComplete
                        TODO: If category not found add new category
                        TODO: when added use logic to mkshort
                    -->
                    <label for="category_id">Category:</label>
                    <select name="category_id" id="category_id">
                        <?php foreach($categoriesList as $category){ ?>
                            <option value="<?= $category['id'] ?>"><?= $category['name'] ?></option>
                        <?php } ?>
                    </select>
                    <label for="subcategory_id">SubCategory:</label>
                    <select name="subcategory_id" id="subcategory_id">
                        <?php foreach($subcategoriesList as $subcategory){ ?>
                            <option value="<?= $subcategory['id'] ?>"><?= $subcategory['name'] ?> </option>
                        <?php } ?>
                    </select>
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