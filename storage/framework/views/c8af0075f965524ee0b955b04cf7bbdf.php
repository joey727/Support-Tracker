<?php $__env->startSection('content'); ?>
    <h1>Activities</h1>

    <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="activity-card">
            <h2><?php echo e($activity->title); ?></h2>
            <p><?php echo e($activity->description); ?></p>

            <?php if($activity->updates->isNotEmpty()): ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Status</th>
                            <th>Remark</th>
                            <th>Metadata</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $activity->updates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $update): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($update->user->name ?? $update->actor_name); ?></td>
                            <td><?php echo e(ucfirst($update->status)); ?></td>
                            <td><?php echo e($update->remark); ?></td>
                            <td><?php echo e(json_encode($update->metadata)); ?></td>
                            <td><?php echo e($update->created_at); ?></td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No updates yet.</p>
            <?php endif; ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/joshuasackey/Downloads/support-tracker-clean/resources/views/activities/index.blade.php ENDPATH**/ ?>