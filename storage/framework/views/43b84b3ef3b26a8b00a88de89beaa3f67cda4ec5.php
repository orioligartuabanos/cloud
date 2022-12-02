<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('stylesheets'); ?>
    <?php echo \Illuminate\View\Factory::parentPlaceholder('stylesheets'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div>
      <img src="<?php echo e(asset ('img/logo.png')); ?>" style="width: 20em;" alt="">
      <h2>UF2-Pt2a</h2>
      <hr>
      <h3>Pràctica per iniciar-se en els conceptes bàsics de Laravel</h3>
      <?php if(Cookie::get('autor') !== null): ?>
        <a href="<?php echo e(route('default_esborrarCookie')); ?>">Eliminar Cookie</a>
      <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/M07/UF2/PT2B/resources/views/default/home.blade.php ENDPATH**/ ?>