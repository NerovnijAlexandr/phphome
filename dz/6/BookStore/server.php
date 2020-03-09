<?php

namespace Academy;

require_once ('../pdo/src/Database.php');

function managePost($post) {
    $db = new Database();
    $db->table_name = 'books';
    try
    {
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
        echo json_encode('ok');
    } catch(Exception $e) {
        echo json_encode('error');
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
//    header('Refresh: 1; URL=.'); //
    managePost($_POST);
}