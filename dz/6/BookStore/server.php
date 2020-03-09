<?php

namespace Academy;

require_once ('../pdo/src/Database.php');

function managePost($post) {
    $db = new Database();
    $db->table_name = 'books';
    switch ($post['action']) {
        case 'insert':
            $db->insert([
                'name' => $post['name'],
                'author' => $post['author']
            ]);
            break;
        case 'update':
            $db->update([
                'id' => $post['id'],
                'name' => $post['name'],
                'author' => $post['author']
            ]);
            break;
        case 'delete':
            $db->delete([
                'id' => $post['id']
            ]);
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    managePost($_POST);
//    header('Refresh: 1; URL=.'); //Refresh: 1;
}