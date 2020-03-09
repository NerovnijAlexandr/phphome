<div class='row'>
    <div clas="col-12">
        <form action="server.php" id="bookStoreForm" method="post">
            <p>Вы точно хотите удалить книгу
                <?php
                echo "'{$name}' автора '{$author}'?";
                ?>
            </p>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="action" value="<?=$action?>">
            <input type="submit" value="Да">
        </form>
    </div>
</div>