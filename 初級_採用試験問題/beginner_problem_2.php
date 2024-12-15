<!-- 【初級】採用試験問題、課題２ -->
<!-- 得点集計自動化 -->

<?php

    // パネルの高さ・幅・状態・得点を取得：
    function readInput() {

        $firstLine = trim(fgets(STDIN));
        $firstLineArr = explode(" ", $firstLine);
        $height = (int)$firstLineArr[0];

        $hitOrMissArr = [];
        $panelNumbersArr = [];

        for ($i=0; $i<$height; $i++) {
            $hitOrMissStr = trim(fgets(STDIN));
            $hitOrMissArr = array_merge($hitOrMissArr, str_split($hitOrMissStr));
        }

        for ($i=0; $i<$height; $i++) {
            $panelNumbersStr = trim(fgets(STDIN));
            $panelNumbersArr = array_merge($panelNumbersArr, explode(" ", $panelNumbersStr));
        }

        return [$hitOrMissArr, $panelNumbersArr];

    }

    // 合計得点を計算：
    function calculateScore($hitOrMissArr, $panelNumbersArr) {
        
        $score = 0;
        $length = count($hitOrMissArr);

        for ($i=0; $i<$length; $i++) {
            if ($hitOrMissArr[$i] == "o") {
                $score += $panelNumbersArr[$i];
            }
        }
        return $score;

    }

    // パネル状態・パネル表示点数を取得
    list($hitOrMissArr, $panelNumbersArr) = readInput();

    // 合計得点を計算
    $results = calculateScore($hitOrMissArr, $panelNumbersArr);

    echo $results;
    echo "\n";

?>
