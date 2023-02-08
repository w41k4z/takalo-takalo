 <div style="width: 100%;">
     <div class="mt-5 px-5 d-flex justify-content-between">
         <h3>Liste de tous les utilisateurs</h3>
         <h2>
             N: <?= count($all_user) ?>
         </h2>
     </div>
     <div class="container mt-4 px-5">
         <div class="row shadow d-flex align-items-center mb-1">
             <img src="" class="col-md-1">
             <p class="col-md-3">
                 <u>Nom</u>
             </p>
             <p class="col-md-3">
                 <u>Prenom</u>
             </p>
             <p class="col-md-2">
                 <u>Contact</u>
             </p>
             <p class="col-md-2 ms-auto">
                 <u>client ID</u>
             </p>
         </div>
         <?php foreach($all_user as $user) { ?>
         <div class="row shadow d-flex align-items-center mb-1">
             <img src="" class="col-md-1">
             <p class="col-md-3">
                 <?= $user->name ?>
             </p>
             <p class="col-md-3">
                 <?= $user->first_name ?>
             </p>
             <p class="col-md-2">
                 <?= $user->contact ?>
             </p>
             <p class="col-md-2 ms-auto">
                 CLT
                 <?=  $user->client_id ?>
             </p>
         </div>
         <?php } ?>
     </div>

 </div>
 </body>

 </html>