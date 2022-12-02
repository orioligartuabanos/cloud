<?php $__env->startSection('title', 'Editar Autor'); ?>

<?php $__env->startSection('stylesheets'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('stylesheets'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>Edició de <?php echo e($autor->nomCognoms()); ?></h1>
<a href="<?php echo e(route('autor_list')); ?>">&laquo; Torna</a>
<div style="margin-top: 20px">
    <form method="POST" action="<?php echo e(route('autor_edit', ['id' => $autor->id])); ?>">
        <?php echo csrf_field(); ?>
        <div>
            <label for="nom">Nom</label>
            <input type="text" name="nom" value="<?php echo e($autor->nom); ?>" />
        </div>
        <div>
            <label for="cognoms">Cognoms</label>
            <input type="text" name="cognoms" value="<?php echo e($autor->cognoms); ?>" />
        </div>
        <button type="submit">Editar Autor</button>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/M07/UF2/PT2A/resources/views/autor/edit.blade.php ENDPATH**/ ?>