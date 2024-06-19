<?php
// Проверяем, что запрос был отправлен методом POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, что все поля формы существуют и не пусты
    if (isset($_POST['product-name']) && isset($_POST['buyer-name']) && isset($_POST['buyer-email']) && isset($_POST['buyer-address'])) {
        // Получаем значения полей формы
        $productName = htmlspecialchars($_POST['product-name']);
        $buyerName = htmlspecialchars($_POST['buyer-name']);
        $buyerEmail = htmlspecialchars($_POST['buyer-email']);
        $buyerAddress = htmlspecialchars($_POST['buyer-address']);
        
        // Адрес электронной почты, на который будет отправлено письмо
        $adminEmail = "babakapa729@gmail.com";
        
        // Тема письма
        $subject = "Новый заказ на шишечку";
        
        // Текст письма
        $message = "Название шишечки: $productName\n";
        $message .= "Имя покупателя: $buyerName\n";
        $message .= "Email покупателя: $buyerEmail\n";
        $message .= "Адрес покупателя: $buyerAddress\n";
        
        // Заголовки письма
        $headers = "From: $buyerEmail\r\n";
        $headers .= "Content-type: text/plain; charset=utf-8\r\n";
        
        // Отправляем письмо
        $send = mail($adminEmail, $subject, $message, $headers);
        
        // Проверяем, успешно ли отправлено письмо
        if ($send) {
            echo "Ваш заказ успешно отправлен.";
        } else {
            echo "Ошибка при отправке заказа. Попробуйте еще раз.";
        }
    } else {
        echo "Заполните все поля формы.";
    }
} else {
    echo "Неверный метод запроса.";
}
?>