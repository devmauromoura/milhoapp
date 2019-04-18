<?php $__env->startSection('title', 'MilhoAPP - Barraca'); ?>

<?php $__env->startSection('conteudo'); ?>
    <!-- Main - Corpo do painel -->
    <main>
      <div class="container">
        <div class="cadastrar shadow"> <!-- Cadastrar -->
          <h4 class="border-bot">Barraca</h4>
          <form name="cadastrarBarraca" id="cadastrarBarraca" class="mt-3" action="barraca/update" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php $__currentLoopData = $dadosBarraca; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dados): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="row">
              <div class="col">
                <label>Nome</label>
                <input type="text" name="nome" class="form-control" value="<?php echo e($dados->nome); ?>" vplaceholder="Nome da barraca" maxlength="60">
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mt-3">
                <label for="semestre">Semestre</label>
                <select name="semestre" class="form-control" id="semestres">
                  <option value="<?php echo e($dados->semestre); ?>" disabled selected><?php echo e($dados->semestre); ?></option>
                  <option value="1">1º</option>
                  <option value="2">2º</option>
                  <option value="3">3º</option>
                  <option value="4">4º</option>
                  <option value="5">5º</option>
                  <option value="6">6º</option>
                  <option value="7">7º</option>
                  <option value="8">8º</option>
                  <option value="9">9º</option>
                  <option value="10">10º</option>
                </select>
              </div>
              <div class="col-sm-6 mt-3">
                <label for="periodos">Periodo</label>
                <select name="periodo" class="form-control" id="periodos">
                  <option value="<?php echo e($dados->periodo); ?>" disabled selected><?php echo e($dados->periodo); ?></option>
                  <option value="Matutino">Matutino</option>
                  <option value="Vespertino">Vespertino</option>
                  <option value="Noturno">Noturno</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6 mt-3">
                <label for="cursos">Curso</label>
                <select name="curso" class="form-control" id="curso">
                  <option value="<?php echo e($dados->idcurso); ?>" disabled selected><?php echo e($dados->cnome); ?></option>
                  <?php $__currentLoopData = $cursosListagem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $curso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($curso->id); ?>"><?php echo e($curso->nome); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>                  
                </select>
              </div>
              <div class="col-sm-6 mt-3">
                <label for="localizacao">Localização</label>
                <input type="text" value="<?php echo e($dados->localizacao); ?>" name="localizacao" class="form-control" placeholder="Localização da barraca" maxlength="60">
              </div>
            </div>
            <div class="row">
              <div class="col mt-3">
                <label>Logo barraca</label>
                <input type="file" name="logoBarraca" class="form-control-file">
              </div>
            </div>
            <button type="submit" class="btn btn-default btn-md btn-block mt-4">Salvar</button>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </form>
        </div>
      </div> 
    </main>
    <!-- Main - FIM -->
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>