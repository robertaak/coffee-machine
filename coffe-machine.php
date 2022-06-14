<?php

$wallet = [
    1 => 10,
    2 => 10,
    5 => 10,
    10 => 10,
    20 => 10,
    50 => 10,
    100 => 10,
    200 => 10
];
$choice = [
    'Americano: 1' => 300,
    'Flat White: 2' => 350,
    'Latte: 3' => 450,
    'Cappuccino: 4' => 450,
    'Hot Chocolate: 5' => 200
];

foreach ($choice as $item => $price)
{
    echo "$item ($price) ";
}
echo PHP_EOL;

foreach ($wallet as $coin => $amount)
{
    echo "$coin ($amount) ";
}
echo PHP_EOL;

$insertedAmount = 0;

while (true) {
    $insertedCoin = (int) readline ('Insert coin ');
    if ($insertedCoin == null) {
        $drink = (int)readline('Choose drink ');


    if (!isset($wallet[$insertedCoin])) {
        echo 'Enter valid coin '.PHP_EOL;
        continue;
    }

    if ($wallet[$insertedCoin] <= 0) {
        echo 'Insufficient funds';
        exit;
    }

    $wallet[$insertedCoin] -= 1;
    $insertedAmount += $insertedCoin;
    echo "Balance: $insertedAmount".PHP_EOL;
}


