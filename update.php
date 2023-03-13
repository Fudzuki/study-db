<?php
require_once('module.php');

function update($db): void
{
    $id = fgets_id();
    $name = fgets_name(1);
    $price = fgets_price();
    try{
        $flag = $db->update($id, $name, $price);
        echo $flag . PHP_EOL;
    } catch (PDOException $e){
        echo 'カラムの変更に失敗しました' . PHP_EOL . 'ERROR: ' . $e->getMessage() . PHP_EOL;
    }
}