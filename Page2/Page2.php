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
                    <table>
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
                        <tr>
                            <td>Строка 1, ячейка 1</td>
                            <td>Строка 1, ячейка 2</td>
                            <td>Строка 1, ячейка 3</td>
                            <td>Строка 1, ячейка 4</td>
                            <td>Строка 1, ячейка 5</td>
                            <td>Строка 1, ячейка 6</td>
                            <td>Строка 1, ячейка 7</td>
                            <td>Строка 1, ячейка 8</td>
                            <td>Строка 1, ячейка 9</td>
                        </tr>
                        <tr>
                            <td>Строка 2, ячейка 1</td>
                            <td>Строка 2, ячейка 2</td>
                            <td>Строка 2, ячейка 3</td>
                            <td>Строка 2, ячейка 4</td>
                            <td>Строка 2, ячейка 5</td>
                            <td>Строка 2, ячейка 6</td>
                            <td>Строка 2, ячейка 7</td>
                            <td>Строка 2, ячейка 8</td>
                            <td>Строка 2, ячейка 9</td>
                        </tr>
                        <tr>
                            <td>Строка 3, ячейка 1</td>
                            <td>Строка 3, ячейка 2</td>
                            <td>Строка 3, ячейка 3</td>
                            <td>Строка 3, ячейка 4</td>
                            <td>Строка 3, ячейка 5</td>
                            <td>Строка 3, ячейка 6</td>
                            <td>Строка 3, ячейка 7</td>
                            <td>Строка 3, ячейка 8</td>
                            <td>Строка 3, ячейка 9</td>
                        </tr>
                        <tr>
                            <td>Строка 4, ячейка 1</td>
                            <td>Строка 4, ячейка 2</td>
                            <td>Строка 4, ячейка 3</td>
                            <td>Строка 4, ячейка 4</td>
                            <td>Строка 4, ячейка 5</td>
                            <td>Строка 4, ячейка 6</td>
                            <td>Строка 4, ячейка 7</td>
                            <td>Строка 4, ячейка 8</td>
                            <td>Строка 4, ячейка 9</td>
                        </tr>
                        <tr>
                            <td>Строка 5, ячейка 1</td>
                            <td>Строка 5, ячейка 2</td>
                            <td>Строка 5, ячейка 3</td>
                            <td>Строка 5, ячейка 4</td>
                            <td>Строка 5, ячейка 5</td>
                            <td>Строка 5, ячейка 6</td>
                            <td>Строка 5, ячейка 7</td>
                            <td>Строка 5, ячейка 8</td>
                            <td>Строка 5, ячейка 9</td>
                        </tr>
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