<div class='row'>
    <div class="col-12">
        <form id="bookStoreForm">
            <p>Вы точно хотите удалить книгу
                <?php
                echo "'{$name}' автора '{$author}'?";
                ?>
            </p>
            <input type="hidden" name="id" value="<?=$id?>">
            <input type="hidden" name="action" value="<?=$action?>">
            <a href="." class="btn btn-primary" onclick="sendData()">Удалить</a>
<!--            <button type="submit" class="btn btn-primary" onsubmit="sendData(); return false;">Удалить</button>-->
        </form>
    </div>
</div>