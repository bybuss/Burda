<?php
// Проверка существования переменных
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['message'])) {
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);

        // Ваша почта
        $address = "babakapa729@gmail.com";

        // Тема письма
        $subject = "Новое сообщение с сайта";

        // Текст сообщения
        $mes = "Имя: $name \nE-mail: $email \nТекст: $message";

        // Заголовки
        $headers = "Content-type:text/plain; charset=utf-8\r\nFrom: $email";

        // Отправка письма
        $send = mail($address, $subject, $mes, $headers);

        if ($send) {
            echo "Сообщение отправлено";
        } else {
            echo "Сообщение не отправлено";
        }
    } else {
        echo "Заполните все поля формы";
    }
} else {
    echo "Неверный метод запроса";
}
?>