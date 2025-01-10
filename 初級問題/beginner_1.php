<!-- 【初級】課題１ -->
<!-- SAPICA 残高・ポイント計算 -->

<?php

// 標準入力から初めのチャージ額・乗車回数・運賃額を取得
function readInput() { 
    
    $firstLine = trim(fgets(STDIN)); // 1行目を取得（初めのチャージ額・乗車回数）
    $firstLineArr = explode(" ", $firstLine);
    $initialBalance = (int)$firstLineArr[0]; // 初めのチャージ額
    $numFares = (int)$firstLineArr[1]; // 乗車回数
    
    $fares = [];

    for ($i = 0; $i < $numFares; $i++) { // 乗車回数分 標準入力から運賃額を取得
        $fares[] = (int)trim(fgets(STDIN)); // 各運賃額を配列に格納
    }
    
    return [$initialBalance, $fares]; // 初めのチャージ額・運賃額配列を返す
}


// 降車時カード残高・ポイントを計算
function calculateBalance($initialBalance, $fares) {
    $balance = $initialBalance;
    $points = 0;
    $results = [];
    
    foreach ($fares as $fare) { // 運賃額配列をループ

        if ($points >= $fare) { // ポイントが運賃額を上回るならば
            $points -= $fare;

        } else { // ポイントが運賃額を上回らないならば
            $balance -= $fare;
            $points += floor($fare * 0.1);
        }
        
        $results[] = [$balance, $points]; // 降車時カード残高・ポイントを配列に格納
    }
    
    return $results;
}


// 初めのチャージ額・運賃額を取得
list($initialBalance, $fares) = readInput(); 

// 降車時カード残高・ポイントを計算
$results = calculateBalance($initialBalance, $fares);

// 降車時カード残高・ポイントを出力。
for ($i = 0; $i < count($results); $i++) {
    echo $results[$i][0] . " " . $results[$i][1];
}

echo "\n";

?>