<h2>Зворотний зв'язок</h2>

<form method="post">
    <label>Ім'я:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Email:</label><br>
    <input type="text" name="email" required><br><br>

    <label>Повідомлення:</label><br>
    <textarea name="message" required></textarea><br><br>

    <button type="submit">Надіслати</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red;'>Невірний email</p>";
    }
    elseif (strlen($message) < 20) {
        echo "<p style='color:red;'>Повідомлення має бути не менше 20 символів</p>";
    }
    else {
        echo "<p style='color:green;'>Повідомлення успішно надіслано!</p>";
    }
}
?>