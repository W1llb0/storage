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
    
    $sql = "SELECT * FROM suppliers";
    $result = $conn->query($sql);
    $tableColumnName = $conn->query("SHOW COLUMNS FROM suppliers;");
    $columnName = [];
    while($row = $tableColumnName->fetch_assoc()){
        $columnName[] = $row['Field'];
        // print_r($row['Field']);
    }

    array_shift($columnName);

    ?>
    <div class="body-wrapper">
        <header>
            <div class="header-wrapper container">
                <a class="logo" href='../Page1/Page1.html'>
                    <img src="../images/Salvaged_Shelves_icon.png" alt="">
                </a>
                <div class="search">
                    <form action="">
                        <input type="search" class="search-bar" name="q" placeholder="Поиск по сайту">
                        <i class="fa fa-search"><img class="search-icon" src="../images/Magnifying_glass.png" alt=""></i>
                    </form>
                </div>
                <div class="tables-links">
                    <a href="../Page2/Page2.php">
                        Товары
                    </a>
                    <a href="../Page3/Page3.php">
                        Покупатели
                    </a>
                    <a href="../Page4/Page4.php">
                        Поставщики
                    </a>
                    <a href="../Page5/Page5.php">
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
                        Поставщики
                    </div>
                    <img src="../images/cratecostume.png" alt="">
                </div>
                <div class="detail-table">
                    <div id="change-record-form-container">
                        <form class="change-form" id="change-record-form" onsubmit="submitForm(event)" action="scripts/change_record.php" method="POST">
                            <?foreach($columnName as $name):?>
                                <div class='column'>
                                    <div class='column-name'> <?= $name ?> </div>
                                    <input class="column-value" type='text' id='name' name='ProductName' value=''>
                                </div>
                            <?endforeach;?>
                            <button class="change-form-send" id = "change-form-send" data-uid='<?echo $row["id"]?>' type="submit">Добавить</button>
                        </form>
                        <script type="text/JavaScript">
                            function submitForm(event){
                                event.preventDefault();
                            }
                        </script>
                    </div>
                    <table class="full-table">
                        <tr>
                            <th>Поставщик</th>
                            <th>Телефон</th>
                            <th>Адрес</th>
                        </tr>
                            <? 
                            
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td class='table-td'>". $row["SupplierName"] . "</td>";
                                    echo "<td class='table-td'>". $row["Phone"] . "</td>";
                                    echo "<td class='table-td'>". $row["Adress"] . "</td>";
                                    echo "<td>";
                                    echo "<button class='change-button' data-uid='" . $row["id"] . "' id='change-record-button'><img src='../images/gear.svg' alt=''></button>";
                                    echo "
                                        <form class='delete-form' id='delete-record-form' onsubmit='submitForm(event)' action='scripts/delete_record.php' method='POST'>
                                            <button class='delite-button' id='delete-button' data-uid='" . $row["id"] . "' type='submit'><img src='../images/delite.svg' alt=''></button>
                                        </form>
                                    ";
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
                            <div class="column-name">Поставщик</div>
                            <input type="text" id="name" name="SupplierName">
                        </div>
                        <div class="column">
                            <div class="column-name">Телефон</div>
                            <input type="text" id="name" name="Phone">
                        </div>
                        <div class="column">
                            <div class="column-name">Адрес</div>
                            <input type="text" id="name" name="Adress">
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