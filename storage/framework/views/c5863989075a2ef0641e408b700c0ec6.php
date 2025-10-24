<?php $__env->startSection('content'); ?>
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title mb-4">Dashboard</h3>
        <p>Welcome to Support Tracker, <?php echo e(auth()->user()->name ?? 'Guest'); ?>!</p>
        <hr>
        <h5>Quick Links</h5>
        <ul>
            <li><a href="<?php echo e(route('activities.index')); ?>">View Activities</a></li>
            <li><a href="<?php echo e(route('activity_updates.index')); ?>">View Activity Updates</a></li>
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/joshuasackey/Downloads/support-tracker-clean/resources/views/dashboard.blade.php ENDPATH**/ ?>