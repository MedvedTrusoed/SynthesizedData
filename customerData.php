<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клиенты</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="data-table">
<table>
<tr class="table-head">
    <th>Номер счета</th>
    <th>Фамилия</th>
    <th>Имя</th>
    <th>Отчество</th>
    <th>Дата рождения</th>
    <th>ИНН</th>
    <th>ФИО ответственного</th>
    <th>Статус</th>
</tr> 

    <?php 
    require_once __DIR__.'/boot.php';

    $newStatus = '';
   $bankAccauntText = '';

    //Вывод таблицы для залогиненного пользователя
    $login = $_SESSION['user_id'];

    $FioQuery = $mysqli->query("SELECT `ФИО ответственного` FROM `users` where `Логин` = '$login'");
    $FioArr = $FioQuery->fetch_assoc();
    $Fio = $FioArr['ФИО ответственного'];

    $clientsTable = $mysqli->query("SELECT * FROM `clients` where `ФИО ответственного` = '$Fio'");

    $count = 0;
    while ($row = $clientsTable->fetch_assoc()){
        echo "<tr>";
        foreach($row as $item => $item_value) {
    
            if($item == 'Статус'){
            ?>
            <td class='element'>
            <select name="status" id = "selectStatus<?php echo $count;?>">
                <option value="Не в работе" >Не в работе</option>
                <option value="Завершено" >Завершено</option>
                <option value="Отказ" >Отказ</option>
            </select> 
            </td>
            
            <script>
                //Отображение значения статуса из Базы данных
                statusOption = document.querySelector('#selectStatus<?php echo $count; $count++;?>').getElementsByTagName('option');
            
                for (let i = 0; i < statusOption.length; i++) 
                {
                    if (statusOption[i].value == "<?php echo $item_value ?>") statusOption[i].selected = true;
                
                }

            </script>

            <?php
            }else if($item == 'Номер счета'){
                echo "<td class='bank_accaunt'>". $item_value."</td>";
            }else{
                echo "<td>". $item_value."</td>";
            }
        }
    echo "</tr>";
    }   

    $clientsTable->close();
   
    ?>

</table>
</div>
<script src="updateDataScript.js"></script>
</body>
</html>