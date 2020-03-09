<div class='row font-weight-bold mb-5'>
    <div class="col-3">Автор книги</div>
    <div class="col-9">Название книги</div>
</div>
<div class="row">
    <?php
    if($books) {
        foreach ($books as $book)
        {
            echo "<div class='col-3 py-2'>{$book['author']}</div>";
            echo "<div class='col-6 py-2'>{$book['name']}</div>";
            echo "<div class='col-2 py-2'><a href='?action=update&id={$book['id']}'>Редактировать</a></div>";
            echo "<div class='col-1 py-2'><a href='?action=delete&id={$book['id']}'>Удалить</a></div>";
        }
    } else {
        echo "<div class='col-12 py-2'>
                <p>Пока нет ни одной книги</p>
            </div>";
    }
    ?>
</div>
<div class="row my-5">
    <div class="col-12">
        <a href="?action=insert">Добавить</a>
    </div>
</div>
