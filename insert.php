<?php
require_once('module.php');

function insert($db): void
{
    $name = fgets_name();
    $price = fgets_price();
    try{
        $flag = $db->insert($name, $price);
        echo '登録が完了しました。' . PHP_EOL;
        echo '商品IDは' . $flag . 'です' . PHP_EOL;
    } catch (PDOException $e){
        echo 'カラムの追加に失敗しました' . PHP_EOL . 'ERROR: ' . $e->getMessage() . PHP_EOL;
    }
}
