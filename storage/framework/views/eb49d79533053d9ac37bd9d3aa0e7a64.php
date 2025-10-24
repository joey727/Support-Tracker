<?php $__env->startSection('content'); ?>
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title mb-4">Activities</h3>

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($activity->id); ?></td>
                        <td><?php echo e($activity->title); ?></td>
                        <td><?php echo e($activity->description); ?></td>
                        <td><?php echo e($activity->active ? 'Active' : 'Inactive'); ?></td>
                        <td><?php echo e($activity->created_at->format('Y-m-d')); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/joshuasackey/Downloads/support-tracker-clean/resources/views/activities.blade.php ENDPATH**/ ?>