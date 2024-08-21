<?php if($paginator->hasPages()): ?>
<ul class="pagination justify-content-center">

    <?php if($paginator->onFirstPage()): ?>
    <li class="page-link" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
        <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
            <span class="sr-only">Previous</span>
    </li>
<?php else: ?>
    <li>
        <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('pagination.previous'); ?>">
            <span aria-hidden="true"><i class="la la-arrow-left"></i></span>
            <span class="sr-only">Previous</span></a>
    </li>
<?php endif; ?>


<?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php if(is_string($element)): ?>
    <li class="page-item active" aria-disabled="true"><span><?php echo e($element); ?></span></li>
<?php endif; ?>


<?php if(is_array($element)): ?>
    <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($page == $paginator->currentPage()): ?>
            <li class="page-item active" aria-current="page"> <a class="page-link" href="#"><?php echo e($page); ?></a> </li>
        <?php else: ?>
            <li><a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a></li>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php if($paginator->hasMorePages()): ?>
<li class="page-item">
    <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('pagination.next'); ?>"><span aria-hidden="true"><i class="la la-arrow-right"></i></span></a>
</li>
<?php else: ?>
<li class="page-link" aria-disabled="true" aria-label="<?php echo app('translator')->get('pagination.next'); ?>">
    <span aria-hidden="true"><i class="la la-arrow-right"></i></span>
            <span class="sr-only">Next</span>
</li>
<?php endif; ?>
 
 
</ul>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\lms\lms\resources\views/vendor/pagination/custom.blade.php ENDPATH**/ ?>