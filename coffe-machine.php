<?php

$wallet = [
    1 => 10,
    2 => 10,
    5 => 10,
    10 => 10,
    20 => 10,
    50 => 10,
    100 => 10,
    200 => 2
];

$drink1 = new stdClass();
$drink1->index = '1';
$drink1->name = 'Americano';
$drink1->price = 300;

$drink2 = new stdClass();
$drink2->index = '2';
$drink2->name = 'Flat white';
$drink2->price = 400;

$drink3 = new stdClass();
$drink3->index = '3';
$drink3->name = 'Cappuccino';
$drink3->price = 450;

$drink4 = new stdClass();
$drink4->index = '4';
$drink4->name = 'Latte';
$drink4->price = 500;

$drink5 = new stdClass();
$drink5->index = '5';
$drink5->name = 'Hot chocolate';
$drink5->price = 200;

$menu = [$drink1, $drink2, $drink3, $drink4, $drink5];

echo "Menu: ";
foreach ($menu as $drink)
{   $formatted = ($drink->price/100);
    $inUSD = number_format($formatted, 2);
    echo "$drink->name,price: $$inUSD; ";
}
echo PHP_EOL;

echo "Your wallet: ";
foreach ($wallet as $coin => $amount)
{
    echo "$coin ($amount) ";
}
echo PHP_EOL;

$insertedAmount = 0;

while (true) {
    $insertedCoin = (int)readline('Insert coins: ');

    if ($insertedCoin == null) {
        $choice = readline('Choose drink: ');
        foreach($menu as $drink) {
            if ($choice === $drink->index) {
                if($insertedAmount < $drink->price) {
                    echo "Please insert enough money!".PHP_EOL;

                } else {
                    echo "$drink->name is being prepared".PHP_EOL;
                    $change = $insertedAmount - $drink->price;
                    function getChange(int $change): array
                    {
                        $denominations = [200, 2, 5, 10, 20, 50, 100, 1];
                        $result = [];

                        while ($change > 0) {
                            sort($denominations);
                            $coin = array_pop($denominations);
                            $count = intdiv($change, $coin);
                            $change -= $count * $coin;
                            if ($count > 0) {
                                $result[] = "$coin($count)";
                            }
                        }
                        return $result;
                    }
                    die("Please take your change. Your change: " . implode(',', getChange($change)) .PHP_EOL);
                }

            }
        }
    }

    if (!isset($wallet[$insertedCoin])) {
        echo 'Enter valid coin ' . PHP_EOL;
        continue;
    }

    if ($wallet[$insertedCoin] <= 0) {
        echo 'You do not have that coin anymore!';
        echo PHP_EOL;
        continue;
    }

    $wallet[$insertedCoin] -= 1;
    $insertedAmount += $insertedCoin;
    $formattedAmount = ($insertedAmount/100);
    $inUSDAmount = number_format($formattedAmount, 2);
    echo "Balance: $$inUSDAmount" . PHP_EOL;
}

