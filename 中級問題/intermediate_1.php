<!-- 【中級】課題１ -->
<!-- 鉱石調査：覚えるべき特徴数の最小値を求める -->

<?php

function readInput() {
    $firstLine = trim(fgets(STDIN));
    $firstLineArr = explode(" ", $firstLine);
    $oreQuantity = (int)$firstLineArr[0]; // 鉱石種類の数

    // 1行目以降の入力は不必要なので、入力できるようにはしておき、その後に破棄：
    for ($i=0; $i < $oreQuantity; $i++) {
        fgets(STDIN);
    }

    echo findMinimumTraits($oreQuantity);
    echo "\n";
}

function findMinimumTraits($oreQuantity) {
    // 特徴数の最小値（の初期値）
    $minTraits = 0;

    // 覚えるべき特徴数の最小値をさがす
    while ((1 << $minTraits) < $oreQuantity) { 
        $minTraits++;
    }
    /*
    上記のwhile文について：
    (1 << $minTraits)： 数字「１」の2進数表現を、$minTraits回 左へシフトする。
    例：
        $oreQuantity = 3の場合、
        １ループ目：「１」の2進数表現を $minTraits回（０回）左にシフトする。結果：１（0001）
        ２ループ目：「１」の2進数表現を $minTraits回（１回）左にシフトする。結果：２（0010）
        ３ループ目：「１」の2進数表現を $minTraits回（２回）左にシフトする。結果：４（0100）-> 条件不成立につき、ループを抜ける。
        結果：$minTraits = 2
        （1種の特徴があれば、2種の鉱石を区別できる -> 足りない）
        （2種の特徴があれば、4種の鉱石を区別できる -> 足りる）
    */

    // 覚えるべき特徴数の最小値を返す
    return $minTraits;
}

readInput();

?>
