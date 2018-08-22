<?php
/**
 * Created by PhpStorm.
 * User: drive867
 * Date: 21.08.2018
 * Time: 15:23
 */
require __DIR__ . '/Db.php';

$sql = 'SELECT `authors`.`author_name` FROM `authors` WHERE (
      SELECT COUNT(`links`.`author_id`) FROM `links` 
      WHERE `links`.`author_id`=`authors`.`author_id` ) < :maxBooks;';

$maxBooks = 7;

$authors = Db::getInstance()->query($sql, [':maxBooks' => $maxBooks]);

foreach ($authors as $author) {
    echo $author['author_name'] . '<br>';
}
