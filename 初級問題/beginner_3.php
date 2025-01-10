<!-- 【初級】課題３ -->
<!-- RPG道具屋シミュレーション -->

<?php

    // 道具の単価、所持金、注文回数を取得
    function readInput() {

        $firstLine = trim(fgets(STDIN)); // 道具の個数(変数使わず)

        $secondLine = trim(fgets(STDIN));
        $toolPriceArr = explode(" ", $secondLine); // 各道具単価を配列へ

        $thirdLine = trim(fgets(STDIN));
        $thirdLineArr = explode(" ", $thirdLine);
        $cashHoldings = (int)$thirdLineArr[0]; // 最初の所持金
        $transactionCount = (int)$thirdLineArr[1]; // 注文回数

        return [$toolPriceArr, $cashHoldings, $transactionCount];

    }

    // 注文を計算
    function processTransactions($toolPriceArr, $cashHoldings, $transactionCount) {

        // 注文を、注文回数分ループ
        for ($i=0; $i<$transactionCount; $i++) {
            $purchaseAttempt = trim(fgets(STDIN));
            $purchaseAttemptArr = explode(" ", $purchaseAttempt);
            $productNumber = (int)$purchaseAttemptArr[0]; // 購入したい道具番号
            $quantity = (int)$purchaseAttemptArr[1]; // 購入したい個数

            $productCost = $toolPriceArr[$productNumber - 1]; // 道具番号に該当する単価
            $transactionTotal = $productCost * $quantity; // その注文の合計額

            if ($cashHoldings >= $transactionTotal) { // 所持金が足りる場合
                $cashHoldings -= $transactionTotal;
            } else {
                continue; // 足りなければ、その注文をスキップ
            }
        }
        return $cashHoldings; // 最終残金
    }

    // 道具の単価、所持金、注文回数を取得
    list($toolPriceArr, $cashHoldings, $transactionCount) = readInput();

    // 注文を計算
    $amountRemaining = processTransactions($toolPriceArr, $cashHoldings, $transactionCount);

    echo $amountRemaining;
    echo "\n";

?>