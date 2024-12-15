<!-- 【初級】採用試験問題、課題２ -->
<!-- 得点集計自動化 -->

<?php

    // パネルの高さ・幅・状態・得点を取得
    function readInput() {

        $firstLine = trim(fgets(STDIN)); // 1行目を取得（高さ・幅）
        $firstLineArr = explode(" ", $firstLine);
        $height = (int)$firstLineArr[0]; // パネルの高さ

        $hitOrMissArr = []; 
        $panelNumbersArr = [];

        // ゲーム終了後のパネル状態を配列へ格納
        for ($i=0; $i<$height; $i++) {
            $hitOrMissStr = trim(fgets(STDIN));
            $hitOrMissArr = array_merge($hitOrMissArr, str_split($hitOrMissStr));
        }

        // パネル表示点数を配列へ格納
        for ($i=0; $i<$height; $i++) {
            $panelNumbersStr = trim(fgets(STDIN));
            $panelNumbersArr = array_merge($panelNumbersArr, explode(" ", $panelNumbersStr));
        }

        // パネル状態配列・パネル点数配列を返す
        return [$hitOrMissArr, $panelNumbersArr];

    }

    // 合計得点を計算
    function calculateScore($hitOrMissArr, $panelNumbersArr) {
        
        $score = 0;
        $length = count($hitOrMissArr);

        // パネル状態配列をループ
        for ($i=0; $i<$length; $i++) {
            if ($hitOrMissArr[$i] == "o") { // パネル状態が撃ち抜かれた状態ならば
                $score += $panelNumbersArr[$i]; // 該当のパネル得点を合計変数へ足す
            }
        }

        // 合計得点を返す
        return $score;

    }

    // パネル状態・パネル表示点数を取得
    list($hitOrMissArr, $panelNumbersArr) = readInput();

    // 合計得点を計算
    $results = calculateScore($hitOrMissArr, $panelNumbersArr);

    echo $results;
    echo "\n";

?>
