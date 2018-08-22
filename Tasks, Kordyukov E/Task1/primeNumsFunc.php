<?php
/**
 * Created by PhpStorm.
 * User: drive867
 * Date: 22.08.2018
 * Time: 9:52
 */
function getArrayOfPrimeNums(int $upperBound): array
{
    // в массиве $candidates[$num] отмечаем:
    // false, если число $num не простое
    // остальные числа в массиве не установлены (т.е. null)
    // хотя обращаться к несуществующему индексу массива не очень хорошо, но я решил сделать так для экономии памяти
    $candidates = ['1' => false];

    // выполняем решето Эратосфена, причем делители числа лежат от 2 до sqrt($upperBound)
    for ($num = 2; $num <= (int)sqrt($upperBound); $num++) {
        if ($candidates[$num] === false) {
            continue; //число уже выколото, просто продолжаем
        } else {
            for ($j = 2 * $num; $j <= $upperBound; $j += $num) {
                $candidates[$j] = false; // составные числа на базе нашего простого выкалываем
            }
        }
    }

    $arrayOfPrimeNums = [];

    for ($num = 2; $num <= $upperBound; $num++) {
        if ($candidates[$num] !== false) {//элементы, которые null и являются простыми числами
            $arrayOfPrimeNums[] = $num;
        }
    }

    return $arrayOfPrimeNums;
}
