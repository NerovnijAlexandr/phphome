<?php

namespace Academy;

require_once ('../pdo/src/Database.php');

$db = new Database();
$db->table_name = 'books';

if($_SERVER['REQUEST_METHOD'] == 'GET')
{
    $action = $_GET['action'] ?? '';
    switch ($action) {
        case 'update':
            $formName = 'InsertUpdateForm.php';
            $title = 'Редактирование книги';
            break;
        case 'insert':
            $formName = 'InsertUpdateForm.php';
            $title = 'Добавление книги';
            break;
        case 'delete':
            $formName = 'DeleteForm.php';
            $title = 'Удаление книги';
            break;
        default:
            $formName = 'BookList.php';
            $title = 'Список книг';
            break;
    }

    $formName = 'src/'.$formName;
//    echo $action, '<br>';
    if(in_array($action, ['update', 'delete'])) {
        $book = $db->get_one(
            ['id' => $_GET['id']
            ]);
        extract($book);
    } else if ($action != 'insert') {
        $books = $db->get_all();
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
</head>
<body>
<div class="container">
    <h1><?=$title;?></h1>
    <?php
        include_once($formName);
        if($action != '')
        {
            echo "<div class='row mt-3'>
                <div class='col-12'>
                    <p><a href='.'>К списку книг</a></p>
                </div>
            </div>";
        }
    ?>
</div>
<?php
    if($action != '')
    {
        include_once ('src/script.php');
    }
?>

</body>
</html>



