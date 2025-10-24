<?php $__env->startSection('content'); ?>
<div class="card shadow-sm">
    <div class="card-body">
        <h3 class="card-title mb-4">Activity Updates</h3>

        <table class="table table-striped">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Activity</th>
                    <th>User</th>
                    <th>Status</th>
                    <th>Remark</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $activityUpdates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $update): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($update->id); ?></td>
                        <td><?php echo e($update->activity->title); ?></td>
                        <td><?php echo e($update->user->name); ?></td>
                        <td><?php echo e(ucfirst($update->status)); ?></td>
                        <td><?php echo e($update->remark ?? '—'); ?></td>
                        <td><?php echo e($update->updated_at->diffForHumans()); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /Users/joshuasackey/Downloads/support-tracker-clean/resources/views/activity_updates.blade.php ENDPATH**/ ?>