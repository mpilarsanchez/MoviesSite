<?php $__env->startSection('titulo'); ?>
  Detalle de Actor
<?php $__env->stopSection(); ?>
<?php $__env->startSection("principal"); ?>
  <h1>Usted eligio el Actor <?php echo e($actor->getNombreCompleto()); ?></h1>
  <img src="/storage/<?php echo e($actor->imagen); ?>" alt="">
  <h1><?php echo e($actor["rating"]); ?></h1>
  <?php if($actor->favorite_movie): ?>
  <h1><?php echo e($actor->favorite_movie->title); ?></h1>
<?php endif; ?>
  <p>Peliculas en las que participo <?php echo e($actor->getNombreCompleto()); ?> : </p>
  <?php if($actor->peliculas): ?>
    <ul>
      <?php $__currentLoopData = $actor->peliculas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pelicula): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li>
        <a href="/pelicula/<?php echo e($pelicula->id); ?>"><?php echo e($pelicula->title); ?></a>
      </li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  <?php endif; ?>
</ul>
<div class="col-12 text-center">
<form class="" action="/actor/<?php echo e($actor->id); ?>/edit" method="get">
  <input type="hidden" name="id" value="<?php echo e($actor->id); ?>">
  <input type="submit" class="btn btn-primary" name="" value="Actualizar">
  
</form>
</div>

<br>
<div class="col-12 text-center">
  <form class="" action="/borrarActor" method="post">
    <?php echo e(method_field('delete')); ?>

  <?php echo e(csrf_field()); ?>

   <input type="hidden" name="id" value="<?php echo e($actor->id); ?>">
   <input type="submit" name="" value="Borrar Actor">
  </form>
  
   
    
  
  
  
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Peliculas\resources\views/detalleActor.blade.php ENDPATH**/ ?>