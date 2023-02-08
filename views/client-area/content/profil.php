<main class="mt-2 mb-5">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <form class="mt-5 shadow p-5 d-flex flex-column justify-content-between" method="POST"
            enctype="multipart/form-data" style="border-radius: 20px;"
            action="<?= base_url("index.php/page/add_product/") ?>">
            <h4 class=" text-center">Ajout de produit</h4>
            <input type="hidden" name="MAX_FILE_SIZE" value="10000000" />
            <input class="form-control" type="text" name="name" id="" placeholder="nom produit">
            <select class="mt-3 form-control" style="border-radius: 10px;" name="category" id="select">
                <option value="">Categorie</option>
                <?php foreach($all_category as $categ) { ?>
                <option value="<?= $categ->category_id ?>">
                    <?= $categ->category ?>
                </option>
                <?php } ?>
            </select>
            <input type="number" class="mt-3 form-control" name="estimated_price">
            <input type="file" class="mt-3 form-control" id="customFile" name="file[]" multiple required>
            <textarea class="mt-3" name=" description" id="" cols="30" rows="2" placeholder="Description..."></textarea>
            <button class="btn btn-primary mt-3" style="margin: 0 5px;">
                Upload
            </button>
        </form>
    </div>

    <div class="mt-5 mb-5 px-5">
        <div class=" mt-5 row shadow d-flex align-items-center mb-1 px-5">
            <img src="" class="col-md-1">
            <p class="col-md-3">
                <u>Produit ID</u>
            </p>
            <p class="col-md-3">
                <u>Nom</u>
            </p>
            <p class="col-md-2">
                <u>Description</u>
            </p>
            <p class="col-md-2 ms-auto">
                <u>Categorie</u>
            </p>
        </div>
        <?php foreach($all_user_product as $prod) { ?>
        <div class="row shadow d-flex align-items-center mb-1">
            <img src="" class="col-md-1">
            <p class="col-md-3">
                PRD <?= $prod->product_id ?>
            </p>
            <p class="col-md-3">
                <?= $prod->name ?>
            </p>
            <p class="col-md-2">
                <?= $prod->description ?>
            </p>
            <p class="col-md-2 ms-auto">
                <?=  $prod->category ?>
            </p>
        </div>
        <?php } ?>
    </div>
</main>