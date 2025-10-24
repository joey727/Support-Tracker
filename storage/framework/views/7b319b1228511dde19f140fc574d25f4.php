<?php $__env->startSection('title', 'Activity Updates'); ?>

<?php $__env->startSection('content'); ?>
    <h1>Activity Updates</h1>

    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>ID</th>
                <th>Activity</th>
                <th>User</th>
                <th>Status</th>
                <th>Remark</th>
                <th>Created At</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $activityUpdates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $update): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($update->id); ?></td>
                    <td><?php echo e($update->activity->title); ?></td>
                    <td><?php echo e($update->user->name); ?></td>
                    <td><?php echo e($update->status); ?></td>
                    <td><?php echo e($update->remark); ?></td>
                    <td><?php echo e($update->created_at); ?></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/joshuasackey/Downloads/support-tracker-clean/resources/views/activity_updates/index.blade.php ENDPATH**/ ?>