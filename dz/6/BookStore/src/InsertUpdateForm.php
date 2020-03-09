<div class="container">
    <div class="row">
        <form action="server.php" style="width: 100%" method="post" id="bookStoreForm" >
            <div class="form-group row">
                <label for="name" class="col-md-2 col-form-label">Название</label>
                <div class="col-md-10">
                    <textarea
                        name="name"
                        id="name"
                        class="form-control"
                        cols="30"
                        rows="10"><?=$name ?? '';?></textarea>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group row">
                <label for="author" class="col-md-2 col-form-label">Автор</label>
                <div class="col-md-10">
                    <textarea
                        name="author"
                        id="author"
                        class="form-control"
                        cols="30"
                        rows="10"><?=$author ?? '';?></textarea>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-md-9">
                    <input type="hidden" name="id" value="<?=$id?>">
                    <input type="hidden" name="action" value="<?=$action?>">
                    <button type="submit" class="btn btn-primary">Отправить</button>
                </div>
            </div>
        </form>
    </div>
</div>