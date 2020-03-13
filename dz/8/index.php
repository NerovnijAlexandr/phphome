<?php

require_once ('pdo/src/Database.php');
require_once ('objs_class.php');

// 1
$f1 = new SomeFile("test.txt", 'w');
$f1->write('Привет, мир!');

// 2
$f2 = new SomeFile("test.txt");
echo $f2->readAll();

// 3
$f3 = new SomeFile("test.txt");
$f3->rename('mir.txt');

// 4
$f4 = new SomeFile('mir.txt');
$f4->copy('world.txt');

// 5
$f5 = new SomeFile('world.txt');
echo $f5->getSizeMb(3).' Мб';

// 6
$f6 = new SomeFile('world.txt');
$f6->delete();

// 7
$f71 = new SomeFile('world.txt');
$f72 = new SomeFile('mir.txt');
var_dump($f71->exists());
var_dump($f72->exists());

// 8
$f8 = new SomeCsvFile('dz.csv');
$f8->readCsv();
$headers = ['id', 'surname', 'name', 'birthday', 'organization', 'post'];
$datas = $f8->datas;

$db = new Database();
$db->table_name = 'people';

foreach($datas as $data) {
    $line = [];
    foreach($data as $ind => $item) {
//            if($ind == 0) {
//                $item = (int)$item;
//            }
            $line[$headers[$ind]] = $item;
    }
    $db->insert($line);
}

