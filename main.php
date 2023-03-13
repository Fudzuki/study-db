<?php
require_once('db.class.php');
require_once('insert.php');
require_once('update.php');
require_once('delete.php');
require_once('select.php');

try{
    $db = new DB();
} catch(Exception $e){
    exit('DBの接続に失敗しました' . PHP_EOL . 'ERROR: '. $e->getMessage());
}

while (true){
    do{
        echo 'メニューを入力してください。(1:登録, 2:更新, 3:削除, 4:一覧, 0:終了): ';
        $menu = intval(fgets(STDIN));
    }while(!is_numeric($menu) && !(0 <= $menu && $menu <= 4));

    switch ($menu){
        case 0:
            exit('終了します。');
        case 1:
            insert($db);
            break;
        case 2:
            update($db);
            break;
        case 3:
            delete($db);
            break;
        case 4:
            select($db);
    }
}
