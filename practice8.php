<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Практична робота PHP</title>
</head>
<body>

<?php
echo "<h1>Практична робота</h1>";

echo "<h2>Варіант 1</h2>";

// 1
$name = "Басалик";
$age = 10;
$is_student = true;

echo "<p>Мене звати $name, мені $age років. Студент: " . ($is_student ? "Так" : "Ні") . "</p>";

// 2
$numbers = [1, 2, 3, 4, 5];
echo "<p>Сума: " . array_sum($numbers) . "</p>";

// 3
$user = [
    "name" => "Басалик",
    "email" => "basalik@example.com",
    "phone" => "+380123456789"
];

echo "<ul>";
foreach ($user as $key => $value) {
    echo "<li>$key: $value</li>";
}
echo "</ul>";

// 4
echo ($age > 18) ? "<p>Вік більше 18</p>" : "<p>Вік 18 або менше</p>";

// 5
$grade = 85;
if ($grade >= 90) echo "<p>Відмінно</p>";
elseif ($grade >= 70) echo "<p>Добре</p>";
elseif ($grade >= 50) echo "<p>Задовільно</p>";
else echo "<p>Незадовільно</p>";



echo "<h2>Варіант 2</h2>";

// 1
$a = 5; $b = 10;
echo "<p>Сума: " . ($a+$b) . "</p>";
echo "<p>Різниця: " . ($a-$b) . "</p>";
echo "<p>Добуток: " . ($a*$b) . "</p>";
echo "<p>Ділення: " . ($a/$b) . "</p>";

// 2
$days = ["Monday","Tuesday","Wednesday","Thursday","Friday","Saturday","Sunday"];
echo "<p>3-й день: $days[2]</p>";
echo "<p>5-й день: $days[4]</p>";

// 3
$products = ["вода"=>25,"кола"=>40,"сік"=>120];
foreach ($products as $name=>$price) {
    echo "<p>$name: $price грн</p>";
}

// 4
$day = "Monday";
switch ($day) {
    case "Monday": echo "<p>Початок тижня</p>"; break;
    case "Friday": echo "<p>Кінець тижня</p>"; break;
    default: echo "<p>Звичайний день</p>";
}

// 5
$x = 15;
echo ($x % 2 == 0) ? "<p>Парне</p>" : "<p>Непарне</p>";
echo "<h2>Варіант 3</h2>";

// 1
$p1=200; $p2=150; $p3=300;
$total = $p1+$p2+$p3;
echo "<p>Сума: $total грн</p>";

// 2
$movies = ["Inception","Matrix","Interstellar","Titanic","Avatar"];
foreach ($movies as $movie) echo "<p>$movie</p>";

// 3
$user = ["login"=>"admin","password"=>"1234","email"=>"mail@test.com"];
foreach ($user as $k=>$v) echo "<p>$k: $v</p>";

// 4
if ($total > 500) {
    $total *= 0.9;
    echo "<p>Зі знижкою: $total грн</p>";
}

// 5
if ("admin" === $user["login"] && "1234" === $user["password"]) {
    echo "<p>Вхід успішний</p>";
}



echo "<h2>Варіант 4</h2>";

// 1
$n1=7; $n2=12;
echo "<p>Макс: " . max($n1,$n2) . ", Мін: " . min($n1,$n2) . "</p>";

// 2
$arr=[10,20,30,40,50];
echo "<p>Середнє: " . array_sum($arr)/count($arr) . "</p>";

// 3
$students=["саша"=>85,"маша"=>75,"даша"=>90];
foreach ($students as $n=>$s) if ($s>80) echo "<p>$n: $s</p>";

// 4
$num=12;
if ($num%3==0 || $num%5==0) echo "<p>Кратне 3 або 5</p>";

// 5
for ($i=1;$i<=10;$i++) echo "<p>7 x $i = ".(7*$i)."</p>";



echo "<h2>Варіант 5</h2>";

// 1
$first="ваня"; $last="іванов"; $birth=2005;
$age=date("Y")-$birth;
echo "<p>$first $last, $age років</p>";

// 2
$countries=["Україна","Польща","Німеччина","Франція"];
echo "<ol>";
foreach ($countries as $c) echo "<li>$c</li>";
echo "</ol>";

// 3
$cities=["Київ"=>3000000,"Львів"=>720000,"Одеса"=>1000000];
foreach ($cities as $c=>$p) if ($p>1000000) echo "<p>$c: $p</p>";

// 4
echo (8%2==0) ? "<p>Парне</p>" : "<p>Непарне</p>";

// 5
echo (date("Y")%4==0) ? "<p>Високосний рік</p>" : "<p>Не високосний</p>";
?>

</body>
</html>