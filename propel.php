<?php
function fibonacci($n) {
    if ($n < 1 || $n > 20) {
        return "Invalid input. Please enter an integer value between 1 and 20.";
    }

    $fibonacciArray = array(0, 1);
    for ($i = 2; $i < $n; $i++) {
        $fibonacciArray[$i] = $fibonacciArray[$i - 1] + $fibonacciArray[$i - 2];
    }
    return implode(', ', $fibonacciArray);
}

for ($i = 1; $i <= 20; $i++) {
    echo "Fibonacci($i) = " . fibonacci($i) . "<br>";
}
?>
