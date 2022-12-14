<?php $__env->startSection('title', 'Nou Autor'); ?>

<?php $__env->startSection('stylesheets'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('stylesheets'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>Nou Autor</h1>
<a href="<?php echo e(route('autor_list')); ?>">&laquo; Torna</a>
<div style="margin-top: 20px">
    <form method="POST" action="<?php echo e(route('autor_new')); ?>">
        <?php echo csrf_field(); ?>
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" />
        </div>
        <div>
            <label for="cognoms">Cognoms</label>
            <input type="text" name="cognoms" />
        </div>
        <div>
        <input type="file" name="Imatge" />
      
        </div>
        <button type="submit">Crear Autor</button>
    </form>
</div>
<?php $__env->stopSection(); ?>


<?php if($errors->any()): ?>
    <div class="alert alert-danger" style="color:red;">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>





<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/M7_1/M7_Pt2e_IgartuaBanos_Oriol/resources/views/autor/new.blade.php ENDPATH**/ ?>