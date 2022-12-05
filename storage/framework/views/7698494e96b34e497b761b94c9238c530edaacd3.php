<!-- All Active Modal -->
<div class="modal fade" id="all_active" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h5 class="modal-title"><?php echo app('translator')->get('Active Confirmation'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <p><?php echo app('translator')->get("Are you really want to active the Question"); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><span><?php echo app('translator')->get('No'); ?></span></button>
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <a href="" class="btn btn-primary active-yes"><span><?php echo app('translator')->get('Yes'); ?></span></a>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- All Inactive Modal -->
<div class="modal fade" id="all_inactive" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h5 class="modal-title"><?php echo app('translator')->get('DeActive Confirmation'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <p><?php echo app('translator')->get("Are you really want to Deactive the Question"); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><span><?php echo app('translator')->get('No'); ?></span></button>
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <a href="" class="btn btn-primary inactive-yes"><span><?php echo app('translator')->get('Yes'); ?></span></a>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- All Close Modal -->
<div class="modal fade" id="all_close" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h5 class="modal-title"><?php echo app('translator')->get('Close Confirmation'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            </div>
            <div class="modal-body">
                <p><?php echo app('translator')->get("Are you really want to close the Question"); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><span><?php echo app('translator')->get('No'); ?></span></button>
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <a href="" class="btn btn-primary close-yes"><span><?php echo app('translator')->get('Yes'); ?></span></a>
                </form>
            </div>
        </div>
    </div>
</div>


<div id="editModal" class="modal fade show" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h5 class="modal-title"><?php echo app('translator')->get('Edit Question'); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <input type="hidden" class="questionId" name="questionId" value="">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('Name'); ?></label>
                        <input type="text" class="form-control editName" name="name" value="" required>
                        <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label class="text-dark"><?php echo app('translator')->get('Status'); ?> </label>
                        <select id="editStatus" class="form-control editStatus"
                                name="status" required>
                            <option value=""><?php echo app('translator')->get('Select Status'); ?></option>
                            <option value="1"><?php echo app('translator')->get('Active'); ?></option>
                            <option value="0"><?php echo app('translator')->get('Pending'); ?></option>
                            <option value="2"><?php echo app('translator')->get('Closed'); ?></option>
                        </select>
                        <?php $__errorArgs = ['status'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label><?php echo app('translator')->get('End Date'); ?></label>
                        <input type="datetime-local" class="form-control editTime" name="end_time"
                               id="editEndDate" required>
                        <?php $__errorArgs = ['end_time'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Update'); ?></button>
                    <button type="button" class="btn btn-dark" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="delete-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="primary-header-modalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-colored-header bg-primary">
                <h4 class="modal-title" id="primary-header-modalLabel"><?php echo app('translator')->get('Delete Confirmation'); ?>
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                </button>
            </div>
            <div class="modal-body">
                <p><?php echo app('translator')->get('Are you sure to delete this?'); ?></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                <form action="" method="post" class="deleteRoute">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('delete'); ?>
                    <button type="submit" class="btn btn-primary"><?php echo app('translator')->get('Yes'); ?></button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $__env->startPush('js'); ?>
    <script>
        'use strict'

        $(document).on('click', '.editBtn', function () {
            var modal = $('#editModal');
            var obj = $(this).data('resource');
            modal.find('input[name=name]').val(obj.name);
            $('.questionId').val(obj.id);
            $('#editStatus').val(obj.status);
            $('#editEndDate').val(obj.end_time);
            modal.find('form').attr('action', $(this).data('action'));
            modal.modal('show');
        });

        $(document).on('shown.bs.modal', '#editModal', function (e) {
            $(document).off('focusin.modal');
        });

        $(document).on('click', '.notiflix-confirm', function () {
            var route = $(this).data('route');
            $('.deleteRoute').attr('action', route)
        })


        $(document).on('click', '#check-all', function () {
            $('input:checkbox').not(this).prop('checked', this.checked);
        });

        $(document).on('change', ".row-tic", function () {
            let length = $(this).length;
            let checkedLength = $(".row-tic:checked").length;
            if (length == checkedLength) {
                $('#check-all').prop('checked', true);
            } else {
                $('#check-all').prop('checked', false);
            }
        });

        //multiple active
        $(document).on('click', '.active-yes', function (e) {
            e.preventDefault();
            var allVals = [];
            $(".row-tic:checked").each(function () {
                allVals.push($(this).attr('data-id'));
            });

            var strIds = allVals;

            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: "<?php echo e(route('admin.question-active')); ?>",
                data: {strIds: strIds},
                datatType: 'json',
                type: "post",
                success: function (data) {
                    location.reload();

                },
            });
        });

        //multiple deactive
        $(document).on('click', '.inactive-yes', function (e) {
            e.preventDefault();
            var allVals = [];
            $(".row-tic:checked").each(function () {
                allVals.push($(this).attr('data-id'));
            });
            var strIds = allVals;
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: "<?php echo e(route('admin.question-deactive')); ?>",
                data: {strIds: strIds},
                datatType: 'json',
                type: "post",
                success: function (data) {
                    location.reload();

                }
            });
        });

        //multiple close
        $(document).on('click', '.close-yes', function (e) {
            e.preventDefault();
            var allVals = [];
            $(".row-tic:checked").each(function () {
                allVals.push($(this).attr('data-id'));
            });
            var strIds = allVals;
            $.ajax({
                headers: {'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')},
                url: "<?php echo e(route('admin.question-close')); ?>",
                data: {strIds: strIds},
                datatType: 'json',
                type: "post",
                success: function (data) {
                    location.reload();

                }
            });
        });

    </script>
<?php $__env->stopPush(); ?>
<?php /**PATH E:\apache\public\project\resources\views/admin/match/partials/questionAttempt.blade.php ENDPATH**/ ?>