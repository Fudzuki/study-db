<?php
require_once('module.php');

function select($db): void
{
    try{
        $flag = $db->select();
        echo '[一覧処理]' . PHP_EOL;
        echo '商品ID, 商品名, 価格' . PHP_EOL;
        while ($value = $flag->fetch()){
            echo $value['id'].' '.$value['name'].' '.$value['price'], PHP_EOL;
        }
        echo '一覧表示が完了しました。' . PHP_EOL;
    } catch (PDOException $e){
        echo 'カラムの取得に失敗しました' . PHP_EOL . 'ERROR: ' . $e->getMessage() . PHP_EOL;
    }
}
