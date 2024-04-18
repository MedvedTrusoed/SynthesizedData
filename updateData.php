<?php
require_once __DIR__.'/boot.php';


try{
    
    $newStatus = $_GET['newStatus'];
    $bankAccauntText = $_GET['bankAccauntText'];

    $updateStatus = $mysqli->query("UPDATE `clients` SET `Статус` = '$newStatus' WHERE `Номер счета` = '$bankAccauntText'");
     
    
      } catch (Exception $e) {
        echo 'Ошибка:'.$e ;
        die;
      }



    
?>