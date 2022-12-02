<!-- Navigation -->
<nav>
<?php if(Auth::user()): ?>         <p>Estas loguejat amb: <?php echo e(Auth::user()->name); ?></p> <?php endif; ?>
<a href="<?php echo e(route('login')); ?>">Login</a>
    &nbsp;&nbsp;&nbsp; 
    <a href="<?php echo e(route('register')); ?>">Register</a>
    <br>
   <a href="<?php echo e(route('home')); ?>">Inici</a>
    &nbsp;&nbsp;&nbsp;
    <a href="<?php echo e(route('llibre_list')); ?>">Llibres</a>
    &nbsp;&nbsp;&nbsp;
    <a href="<?php echo e(route('autor_list')); ?>">Autors</a>
    &nbsp;&nbsp;&nbsp; 
   

</nav><?php /**PATH /var/www/html/M7_1/M7_Pt3a_IgartuaBanos_Oriol/resources/views/navbar.blade.php ENDPATH**/ ?>