<!-- 【初級】採用試験問題、課題４ -->
<!-- 幸運日の捜索 -->

<?php

function readInput() {
    $happyNumber = trim(fgets(STDIN));
    $happyNumberArr = str_split($happyNumber); 
    $digitCount = count($happyNumberArr);

    $dayMatchArr = [];
    
    
    if ($digitCount == 3) { // Xが3桁の場合。3桁の数字のみループする：
        for ($i=101; $i<364; $i++) {

            if ($happyNumber == $i) {
                $dayMatchArr[] = $i; 
            } else {
                continue;
            }

        }
    } elseif ($digitCount == 2) { // Xが2桁の場合。2桁の数字のみループする：
        for ($i=10; $i<365; $i++) {

            if (strpos((string)$i, $happyNumber) !== false) { 
                $dayMatchArr[] = $i; 
            } else {
                continue;
            }

        }
    } else { // Xが1桁の場合。1~365日全てループする：
        for ($i=1; $i<365; $i++) { 

            if (strpos((string)$i, $happyNumber) !== false) { 
                $dayMatchArr[] = $i; 
            } else {
                continue;
            }

        }
    }

    $dayMatchCount = count($dayMatchArr);
    echo $dayMatchCount;
    echo "\n";
    
}

readInput();

?>