<?php



namespace Academy;

//use Academy\Database;

require_once __DIR__ . '/vendor/autoload.php';

$db = new Database();
$db->table_name = 'users';

//$db->insert([
//    'full_name' => 'user_1',
//    'email' => '12345@mail.com',
//    'password' => md5('secret')]);

//$db->update([
//    'id' => 3,
//    'name' => 'Дом Ашеров',
//    'author' => 'Эдгар Алан По']);

//$db->delete([
//    'id' => 1]);

//$one_item = $db->get_one(['author' => 'Роджер Желязны']);
//var_dump($one_item);
//
//echo '<br>';
//var_dump($db->get_all());
//
//$db->pdo = null;