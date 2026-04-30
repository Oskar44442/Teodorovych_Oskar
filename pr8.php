<?php
function e($s){return htmlspecialchars(trim($s),ENT_QUOTES,'UTF-8');}

$name=$age=$gender=$desc="";
$hobbies=[];
$errors=[];

if($_SERVER["REQUEST_METHOD"]==="POST"){
    $name=$_POST["name"]??"";
    $age=$_POST["age"]??"";
    $gender=$_POST["gender"]??"";
    $hobbies=$_POST["hobbies"]??[];
    $desc=$_POST["desc"]??"";

    if($name==="") $errors["name"]="Введіть ім’я";

    if($age===""||!ctype_digit($age)||$age<10||$age>100){
        $errors["age"]="Вік 10–100";
    }

    if($gender==="") $errors["gender"]="Оберіть стать";

    if(empty($errors)){
        $safeName=e($name);
        $safeAge=e($age);
        $safeGender=e($gender);
        $safeDesc=e($desc);
        $safeHobbies=array_map("e",$hobbies);

        echo "<h2>Дані</h2>";
        echo "Ім’я: $safeName<br>";
        echo "Вік: $safeAge<br>";
        echo "Стать: $safeGender<br>";
        echo "Хобі: ".implode(", ",$safeHobbies)."<br>";
        echo "Опис: $safeDesc<br>";
        exit;
    }
}
?>

<form method="post">
    Ім’я: <input type="text" name="name" value="<?=e($name)?>">
    <span style="color:red"><?= $errors["name"]??"" ?></span><br><br>

    Вік: <input type="text" name="age" value="<?=e($age)?>">
    <span style="color:red"><?= $errors["age"]??"" ?></span><br><br>

    Стать:
    <input type="radio" name="gender" value="Ч" <?= $gender==="Ч"?"checked":"" ?>>Ч
    <input type="radio" name="gender" value="Ж" <?= $gender==="Ж"?"checked":"" ?>>Ж
    <span style="color:red"><?= $errors["gender"]??"" ?></span><br><br>

    Хобі:
    <input type="checkbox" name="hobbies[]" value="Спорт" <?= in_array("Спорт",$hobbies)?"checked":"" ?>>Спорт
    <input type="checkbox" name="hobbies[]" value="Музика" <?= in_array("Музика",$hobbies)?"checked":"" ?>>Музика
    <input type="checkbox" name="hobbies[]" value="Ігри" <?= in_array("Ігри",$hobbies)?"checked":"" ?>>Ігри<br><br>

    Опис:<br>
    <textarea name="desc"><?=e($desc)?></textarea><br><br>

    <button type="submit">Надіслати</button>
</form>