<?php
/**
 * Created by PhpStorm.
 * User: drive867
 * Date: 21.08.2018
 * Time: 11:37
 */
require __DIR__ . '/primeNumsFunc.php';

$primeNums = getArrayOfPrimeNums(2000000);
$sumOfPrimeNums = 0;
foreach ($primeNums as $primeNum) {
    $sumOfPrimeNums += $primeNum;
}
echo $sumOfPrimeNums;
