<?php
function fgets_id($mode = 0): int
{
    do{
        echo match ($mode) {
            0 => '更新対象の商品IDを入力してください: ',
            1 => '削除対象の商品IDを入力してください: ',
        };
        $id = intval(fgets(STDIN));
    }while(!is_numeric($id));
    return $id;
}

function fgets_name($mode = 0): string
{
    echo match ($mode) {
        0 => '商品名を入力してください: ',
        1 => '新しい商品名を入力してください: ',
    };
    return rtrim(fgets(STDIN));
}

function fgets_price($mode = 0): int
{
    do{
        echo match ($mode) {
            0 => '価格を入力してください: ',
            1 => '新しい価格を入力してください: ',
        };
        $price = intval(fgets(STDIN));
    }while(!is_numeric($price));
    return $price;
}