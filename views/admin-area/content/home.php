 <div style="width: 100%;">
     <div class="container mt-3 p-3" style="width: 50%; height: 200px; overflow-y: scroll">

         <div class="row shadow d-flex align-items-center mb-1 pt-3">
             <p class="col-md-6"><u>Liste de tous les categories</u></p>
             <p class="col-md-1"></p>
             <p class="col-md-3"></p>
         </div>

         <?php foreach($all_category as $categ) { ?>
         <div class="row shadow d-flex align-items-center justify-content-center mb-1">
             <p class="col-md-6">
                 <?= $categ->category ?>
             </p>
             <p class="col-md-1"></p>
             <a href="<?= base_url("index.php/page/delete_category/".$categ->category_id) ?>"
                 class=" btn btn-danger col-md-3 ms-auto">Supprimer</a>
         </div>
         <?php } ?>

     </div>

     <div class=" d-flex justify-content-center align-items-center">
         <form action="<?= base_url("index.php/page/add_category") ?>" class="mt-3" style="width: 350px" method="post">
             <h5 class="text-center">Ajout de categorie</h5>
             <div class="input-group p-3 shadow">
                 <div class="input-group-prepend">
                     <span class="input-group-text" id="basic-addon1"><i class="fa fa-newspaper"></i></span>
                 </div>
                 <input type="text" class="form-control mt-0" placeholder="categorie" aria-label="Password"
                     aria-describedby="basic-addon1" name="category">
                 <button class="btm btn-primary">Ajouter</button>
             </div>
         </form>
     </div>


     <h3 class="mt-5 ms-3">Liste des objets a verifier</h3>
     <div class="container mt-4 px-5" style="overflow-y: scroll; height: 200px">
         <div class="row shadow d-flex align-items-center mb-1">
             <img src="" class="col-md-1">
             <p class="col-md-3">
                 <u>Nom</u>
             </p>
             <p class="col-md-3">
                 <u>Categorie</u>
             </p>
             <p class="col-md-2">
                 <u>Prix estime</u>
             </p>
             <p class="col-md-2"></p>
         </div>
         <?php foreach($all_unknown_product as $prod) { ?>
         <div class="row shadow d-flex align-items-center mb-1">
             <img src="" class="col-md-1">
             <p class="col-md-3">
                 <?= $prod->name ?>
             </p>
             <p class="col-md-3">
                 <?= $prod->category ?>
             </p>
             <p class="col-md-2">
                 <?= $prod->estimated_price ?> Ar
             </p>
             <div class="btn-group col-md-2 ms-auto">
                 <a class=" btn btn-warning" href="">Modifier</a>
             </div>
         </div>
         <?php } ?>
     </div>

 </div>
 </body>

 </html>