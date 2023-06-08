<!DOCTYPE html>
<html>
<head>
 <meta charset="UTF-8">
 <title>Склад</title>
 <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
 <link rel="preconnect" href="https://fonts.googleapis.com">
 <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
 <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
 <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <?
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "storage";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);
    $tableColumnName = $conn->query("SHOW COLUMNS FROM products;");
    $columnName = [];
    while($row = $tableColumnName->fetch_assoc()){
        $columnName[] = $row['Field'];
        // print_r($row['Field']);
    }

    ?>
    <div class="body-wrapper">
        <header>
            <div class="header-wrapper container">
                <a class="logo" href='#'>
                    <img src="../images/Salvaged_Shelves_icon.png" alt="">
                </a>
                <div class="search">
                    <form action="">
                        <input type="search" class="search-bar" name="q" placeholder="Поиск по сайту">
                        <i class="fa fa-search"><img class="search-icon" src="../images/Magnifying_glass.png" alt=""></i>
                    </form>
                </div>
                <div class="tables-links">
                    <a href="">
                        Товары
                    </a>
                    <a href="">
                        Покупатели
                    </a>
                    <a href="">
                        Поставщики
                    </a>
                    <a href="">
                        Работники
                    </a>
                </div>
            </div>
        </header>
        <div class="content-wrapper">
            <div class="content container">
                <div class="table-title">
                    <img src="../images/cratecostume.png" alt="">
                    <div class="table-title__name">
                        Товары
                    </div>
                    <img src="../images/cratecostume.png" alt="">
                </div>
                <div class="detail-table">
                    <div id="change-record-form-container">
                        <form class="change-form" id="change-record-form" action="scripts/change_record.php" method="POST">
                            <?foreach($columnName as $name):?>
                                <div class='column'>
                                    <div class='column-name'> <?= $name ?> </div>
                                    <input type='text' id='name' name='ProductName' value='<?=$name  ?>'>
                                </div>
                            <?endforeach;?>
                            <button type="submit">Добавить</button>
                        </form>
                    </div>
                    <table class="full-table">
                        <tr>
                            <th>Название товара</th>
                            <th>Единицы измерения</th>
                            <th>Количество</th>
                            <th>Цена</th>
                            <th>Поставщик</th>
                            <th>Покупатель</th>
                            <th>Дата поступления</th>
                            <th>Дата продажи</th>
                            <th>Примечание</th>
                        </tr>
                            <? 
                            
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td class='table-td'>". $row["ProductName"] . "</td>";
                                    echo "<td class='table-td'>". $row["Units"] . "</td>";
                                    echo "<td class='table-td'>". $row["Quantity"] . "</td>";
                                    echo "<td class='table-td'>". $row["Price"] . "</td>";
                                    echo "<td class='table-td'>". $row["Provider"] . "</td>";
                                    echo "<td class='table-td'>". $row["CustomerName"] . "</td>";
                                    echo "<td class='table-td'>". $row["SellDate"] . "</td>";
                                    echo "<td class='table-td'>". $row["PurchaseDate"] . "</td>";
                                    echo "<td class='table-td'>". $row["Note"] . "</td>";
                                    echo "<td>";
                                    echo "<button class='change-button' data-uid='" . $row["Id"] . "' id='change-record-button'><img src='../images/gear.svg' alt=''></button>";
                                    echo "<button class='delite-button'><img src='../images/delite.svg' alt=''></button>";
                                    echo "</td>";
                                    echo "</tr>";
                                }
                            }
                            ?>
                      </table>
                </div>
                <div id="add-record-form-container">
                    <form class="add-form" id="add-record-form" action="scripts/add_record.php" method="POST">
                        <div class="column">
                            <div class="column-name">Название товара</div>
                            <input type="text" id="name" name="ProductName">
                        </div>
                        <div class="column">
                            <div class="column-name">Единицы измерения</div>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="column">
                            <div class="column-name">Количество</div>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="column">
                            <div class="column-name">Цена</div>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="column">
                            <div class="column-name">Поставщик</div>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="column">
                            <div class="column-name">Покупатель</div>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="column">
                            <div class="column-name">Дата поступления</div>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="column">
                            <div class="column-name">Дата продажи</div>
                            <input type="text" id="name" name="name">
                        </div>
                        <div class="column">
                            <div class="column-name">Примечание</div>
                            <input type="text" id="name" name="name">
                        </div>
                    
                        <button type="submit">Добавить</button>
                    </form>
                </div>
                <div class="add-button-container">
                    <button class="add-button" id="add-record-button">Добавить запись</button>
                </div>
                <div id="overlay"></div>
                <div id="overlay-2"></div>
            </div>
        </div>
        <footer>
            <div class="footer-wrapper container">
                <div class="footer-content">
                    <img src="../images/box.wooden.large.png" alt="">
                    <p>2023 Склад</p>
                    <img src="../images/box.wooden.large.png" alt="">
                </div>
            </div>
        </footer>
    </div>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
 <script src="scripts/script.js" type="text/javascript"></script>
</body>
</html>