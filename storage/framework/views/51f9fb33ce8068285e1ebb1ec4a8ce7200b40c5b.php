<?php $__env->startSection('title', 'Nou Llibre'); ?>

<?php $__env->startSection('stylesheets'); ?>
<?php echo \Illuminate\View\Factory::parentPlaceholder('stylesheets'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h1>Edició de '<?php echo e($llibre->titol); ?>'</h1>
<a href="<?php echo e(route('llibre_list')); ?>">&laquo; Torna</a>
<div style="margin-top: 20px">
    <form method="POST" action="<?php echo e(route('llibre_edit', ['id' => $llibre->id])); ?>">
        <?php echo csrf_field(); ?>
        <div>
            <label for="titol">Títol</label>
            <input type="text" name="titol" value="<?php echo e($llibre->titol); ?>" />
        </div>
        <div>
            <label for="dataP">Data de publicació</label>
            <input type="date" name="dataP" value="<?php echo e($llibre->dataP); ?>" />
        </div>
        <div>
            <label for="vendes">Vendes</label>
            <input type="number" name="vendes" value="<?php echo e($llibre->vendes); ?>" />
        </div>
        <div>
            <label for="autor_id">Autor</label>
            <select name="autor_id">
                <option value="">«-- Selecciona un autor --»</option>
                <?php $__currentLoopData = $autors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $autor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($autor->id); ?>" <?php if($autor->id == $llibre->autor_id): echo 'selected'; endif; ?>><?php echo e($autor->nomCognoms()); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>
        <button type="submit">Edita Llibre</button>
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
<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/M7_1/M7_Pt2c_IgartuaBanos_Oriol/resources/views/llibre/edit.blade.php ENDPATH**/ ?>