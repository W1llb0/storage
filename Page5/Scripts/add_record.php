<?php
// Подключиться к базе данных
$conn = mysqli_connect('localhost', 'root', '', 'storage');

// Проверить подключение к базе данных
if (!$conn) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}

// Получить данные из формы
$name = $_POST['name'];
$pasport = $_POST['pasport'];
$phone = $_POST['phone'];
$post = $_POST['post'];

// Создать запрос на добавление записи в базу данных
$sql = "INSERT INTO `employees` (`name`, `pasport`, `phone`, `post`) VALUES ('$name', '$pasport', '$phone', '$post')";

// Выполнить запрос
if (mysqli_query($conn, $sql)) {
    echo "Запись успешно добавлена";
} else {
    echo "Ошибка: " . mysqli_error($conn);
}

// Закрыть соединение с базой данных
mysqli_close($conn);
?>