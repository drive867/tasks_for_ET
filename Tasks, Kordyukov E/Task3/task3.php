<?php
/**
 * Created by PhpStorm.
 * User: drive867
 * Date: 21.08.2018
 * Time: 17:35
 */
require __DIR__ . '/FigureWithSquare.php';
require __DIR__ . '/Circle.php';
require __DIR__ . '/Rectangle.php';
require __DIR__ . '/Triangle.php';

$arrayWithSquaresOfFigures = [];

$json = file_get_contents(__DIR__ . '/figures.json');
$objects = json_decode($json);

foreach ($objects as $object) {
    $figure = null;
    switch ($object->type) {
        case 'rectangle':
            $figure = new Rectangle($object->a, $object->b);
            break;
        case 'circle':
            $figure = new Circle($object->radius);
            break;
        case 'triangle':
            $figure = new Triangle($object->a, $object->b, $object->c);
            break;
        default:
            echo 'Unknown figure';
    }
    $arrayWithSquaresOfFigures[(string)$figure->getSquare()] = $figure;
}

//сортируем по ключу(т.е по площади фигуры) по убыванию
krsort($arrayWithSquaresOfFigures);

foreach ($arrayWithSquaresOfFigures as $square => $figure) {
    echo get_class($figure) . ' with square=' . $square . '<br>';
}
