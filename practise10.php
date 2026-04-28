<?php
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $login = trim($_POST["login"]);
    $password = $_POST["password"];
    $confirm = $_POST["confirm"];

    // логін: тільки букви і цифри
    if (!filter_var($login, FILTER_VALIDATE_REGEXP, [
        "options" => ["regexp" => "/^[a-zA-Z0-9]+$/"]
    ])) {
        $message = "❌ Логін не може містити спецсимволи";
    }
    // перевірка паролів
    elseif ($password !== $confirm) {
        $message = "❌ Паролі не збігаються";
    }
    else {
        $message = "✅ Реєстрація успішна!";
    }
}
?>

<h2>Реєстрація</h2>

<form method="post">
    Логін: <input type="text" name="login"><br><br>
    Пароль: <input type="password" name="password"><br><br>
    Підтвердження: <input type="password" name="confirm"><br><br>
    <button type="submit">Зареєструватися</button>
</form>

<p><?= $message ?></p>