<?php
$data = (array) json_decode(file_get_contents('php://input'));
// print_r(getType($data));
// exit();

// Подключиться к базе данных
$conn = mysqli_connect('localhost', 'root', '', 'storage');

// Проверить подключение к базе данных
if (!$conn) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}

// Получить данные из формы
// $ProductName = $_POST['ProductName'];

// $keys = array_keys($data);
// $values = array_values($data);
// print_r($keys);



$fields = array();
foreach ($data['data'] as $key => $value) {
    $newKey = trim($key);
    $fields[] = "`$newKey` = '$value'";
}

// print_r(implode(", ", $fields));
// print_r($data['productId']);
// exit();
// Создать запрос на добавление записи в базу данных
// print_r ($data);
// exit();
$sql = "DELETE FROM `employees` WHERE `Id` = '" . $data['employerId'] . "'";

// Выполнить запрос
if (mysqli_query($conn, $sql)) {
    echo "Запись успешно удалена";
} else {
    echo "Ошибка: " . mysqli_error($conn);
}

// Закрыть соединение с базой данных
mysqli_close($conn);
?>