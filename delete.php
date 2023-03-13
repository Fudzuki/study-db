<?php
require_once('module.php');

function delete($db): void
{
    $id = fgets_id(1);
    try{
        $flag = $db->delete($id);
        echo $flag . PHP_EOL;
    } catch (PDOException $e){
        echo 'カラムの削除に失敗しました' . PHP_EOL . 'ERROR: ' . $e->getMessage() . PHP_EOL;
    }
}