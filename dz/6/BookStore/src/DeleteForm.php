<div class='row'>
    <div class="col-12">
        <form id="bookStoreForm" onsubmit="sendData(); return false;">
            <p>Вы точно хотите удалить книгу
                <?php
                echo "'{$name}' автора '{$author}'?";
                ?>
            </p>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="action" value="<?=$action?>">
            <button type="submit" class="btn btn-primary">Удалить</button>
        </form>
    </div>
</div>