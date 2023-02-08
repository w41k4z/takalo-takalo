 <div style="width: 100%;">
     <div class="mt-5 px-5 d-flex justify-content-between">
         <h3>Historique des echanges</h3>
         <h2>
             N: <?= count($all_exchange) ?>
         </h2>
     </div>
     <div class="container mt-4 px-5">
         <div class="row shadow d-flex align-items-center mb-1">
             <img src="" class="col-md-1">
             <p class="col-md-3">
                 <u>Date</u>
             </p>
             <p class="col-md-3">
                 <u>Client 1</u>
             </p>
             <p class="col-md-2">
                 <u>Client 2</u>
             </p>
             <p class="col-md-2 ms-auto">
                 <u>exchange ID</u>
             </p>
         </div>
         <?php foreach($all_exchange as $exchange) { ?>
         <div class="row shadow d-flex align-items-center mb-1">
             <img src="" class="col-md-1">
             <p class="col-md-3">
                 <?= $exchange->exchange_date ?>
             </p>
             <p class="col-md-3">
                 <?= $exchange->name1 ?>
             </p>
             <p class="col-md-2">
                 <?= $exchange->name2 ?>
             </p>
             <p class="col-md-2 ms-auto">
                 EXC <?= $exchange->exchange_id ?>
             </p>
         </div>
         <?php } ?>
     </div>

 </div>
 </body>

 </html>