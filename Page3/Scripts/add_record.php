<?php
// Подключиться к базе данных
$conn = mysqli_connect('localhost', 'root', '', 'storage');

// Проверить подключение к базе данных
if (!$conn) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}

// Получить данные из формы
$CustomerName = $_POST['CustomerName'];
$SpeakTo = $_POST['SpeakTo'];
$Post = $_POST['Post'];
$Address = $_POST['Address'];
$Phone = $_POST['Phone'];

// Создать запрос на добавление записи в базу данных
$sql = "INSERT INTO `customers` (`CustomerName`, `SpeakTo`, `Post`, `Address`, `Phone`) VALUES ('$CustomerName', '$SpeakTo', '$Post', '$Address', '$Phone')";

// Выполнить запрос
if (mysqli_query($conn, $sql)) {
    echo "Запись успешно добавлена";
} else {
    echo "Ошибка: " . mysqli_error($conn);
}

// Закрыть соединение с базой данных
mysqli_close($conn);
?>