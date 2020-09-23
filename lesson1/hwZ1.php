<?php

$string = "[][(a + b)/ c - 2, 25, abc]";
$onlyBracketsString = mb_eregi_replace("[^\'()\]\[]", '', $string);
echo $onlyBracketsString;

if (strlen($onlyBracketsString) % 2 !== 0) {
    echo 'Баланс скобок не соблюден  1';
} else {
    $keysAndValues = array(
        "[" => "]",        "(" => ")"
    );
    $bracketsArray = str_split($onlyBracketsString);

    $stack = new SplStack;

    foreach ($bracketsArray as $bracket) {
        if (!$stack->isEmpty()) {
            $top = $stack->top();
            if (array_key_exists($top, $keysAndValues)) {
                if ($bracket === $keysAndValues[$top] || array_key_exists($bracket, $keysAndValues)) {
                    $stack->push($bracket);
                    echo "push" . "\n";
                } else {
                    echo "continue";
                    continue;
                }
            } else {
                $stack->push($bracket);
                echo "push" . "\n";
            }
        } else {
            $stack->push($bracket);
            echo "push" . "\n";
        }
    }

    if (count($bracketsArray) !== $stack->count()) {
        echo "Баланс скобок не соблюден  2";
    } else {
        $i = 0;
        foreach ($keysAndValues as $key => $value) {
            $i++;
            $keyCount = 0;
            $valueCount = 0;
            foreach ($stack as $item) {
                if ($item === $key) {
                    $keyCount++;
                }
                if ($item === $value) {
                    $valueCount++;
                }
            }

            if ($keyCount !== $valueCount) {
                echo "Баланс скобок не соблюден 3";
                break;
            } else {
                if ($i === count($keysAndValues)) {
                    echo "ВСЕ ОК";
                }
            }
        }
    }
}
