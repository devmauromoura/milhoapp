<?php $__env->startSection('title', 'MilhoAPP - Home'); ?>

<?php $__env->startSection('conteudo'); ?>
    <!-- Main - Corpo do painel -->
    <div class="container mt-3">
      <div class="row justify-content-md-center">
        <div class="cadastrar col-sm-5 mb-5 pb-2">
            <h4 class="headerRank pl-3 mb-3">Top 5 Barracas</h4>
            <ul class="list-unstyled">
              <?php $__currentLoopData = $votosBarraca; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $barracas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="media listaRank mb-2">
<<<<<<< HEAD
<<<<<<< HEAD
                <img src="<?php echo e(asset('storage/barracas/'.$barracas->nomeimagem)); ?>" height="85px" class="mr-4" alt="...">
=======
                <img src="<?php echo e($barracas->nomeimagem); ?>" height="85px" class="mr-4" alt="...">
>>>>>>> 39cd4b59dfc4e52d3ee245ab62b2eda923742f51
=======
                <img src="<?php echo e(asset($barracas->nomeimagem)); ?>" height="85px" class="mr-4" alt="...">
>>>>>>> 05b6add3a7a843b86a6360c607c888faad5812af
                <div class="media-body">
                  <h4 class="mt-0 mb-1"><?php echo e($barracas->nome); ?></h4>
                  <h5 class="mt-0 mb-1"><?php echo e($barracas->Votos); ?> Votos</h5>
                </div>
              </li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
      </div>
    </div>
    <!-- Main - FIM-->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>