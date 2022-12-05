<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get(optional($match->gameTeam1)->name); ?> <?php echo app('translator')->get('vs'); ?>
    <?php echo app('translator')->get(optional($match->gameTeam2)->name); ?> - <?php echo app('translator')->get($match->name); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header card card-primary m-0 m-md-4 my-4 m-md-0 p-5 ">
        <form action="<?php echo e(route('admin.storeQuestion')); ?>" method="post" class="NewForm">
            <?php echo csrf_field(); ?>
            <input type="hidden" name="match_id" value="<?php echo e($match->id); ?>">
            <div class="row row-form">
                <div class="col-md-6 column-form">
                    <div class="card shadow light bordered">
                        <div class="card-header d-flex flex-wrap justify-content-between bg-transparent">
                            <a href="javascript:void(0);" class="btn btn-primary btn-sm copyFormData"><i
                                    class="fa fa-copy"></i> Copy</a>
                            <a href="javascript:void(0);" class="btn btn-danger btn-sm removeContentDiv"
                               style="display: none"><i
                                    class="fa fa-trash-alt"></i><?php echo app('translator')->get('Remove'); ?></a>
                        </div>
                        <div class="card-body">
                            <input type="hidden" name="index[]" class="index" value="1">
                            <div class="form-group">
                                <label>Question</label>
                                <input type="hidden" name="match_id[1][]" class="match_id"
                                       value="<?php echo e($match->id); ?>">
                                <input type="text" name="question[1][]" class="question form-control"
                                       value=" overs run."
                                       placeholder="<?php echo app('translator')->get('Type your Question'); ?>">

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('End Date'); ?></label>
                                        <input type="datetime-local" class="form-control  datepicker end_time"
                                               name="end_time[1][]"
                                               required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('Status'); ?></label>
                                        <select name="question_status[1][]" class="question_status form-control">
                                            <option value="1"><?php echo app('translator')->get('Active'); ?></option>
                                            <option value="0"><?php echo app('translator')->get('DeActive'); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <h6><?php echo app('translator')->get('Options'); ?></h6>
                            <div class="option-generator">

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input type="text" name="option_name[1][]" value="Yes"
                                                   class="option_name form-control"
                                                   placeholder="<?php echo app('translator')->get('Type your Option'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <input type="number"
                                                   class="form-control ratio1" name="ratio[1][]" step="any"
                                                   required=""
                                                   placeholder="<?php echo app('translator')->get('ratio'); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="status[1][]" class="status form-control">
                                                <option value="1"><?php echo app('translator')->get('Active'); ?></option>
                                                <option value="0"><?php echo app('translator')->get('DeActive'); ?></option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <a href="javascript:void(0);"
                                               class="btn btn-primary btn-sm addFormData"><i
                                                    class="fa fa-plus"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-block btn-success success"><?php echo app('translator')->get('Save'); ?></button>
            </div>
        </form>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script type="text/javascript">

        $(document).on('click', '.removeContentDiv', function () {
            var sss = $(this).closest('.column-form').remove();
        });
        $(document).on('click', '.copyFormData', function () {
            var sss = $(this).closest('.column-form').clone();

            var $len = parseInt($('.column-form').length + 1);
            var sssDiv = $(this).closest('.column-form')
            sssDiv.addClass('len-' + $len)


            $(sss).find('.match_id').attr('name', 'match_id[' + $len + '][]');
            $(sss).find('.question').attr('name', 'question[' + $len + '][]');
            $(sss).find('.end_time').attr('name', 'end_time[' + $len + '][]');
            $(sss).find('.question_status').attr('name', 'question_status[' + $len + '][]');
            $(sss).find('.option_name').attr('name', 'option_name[' + $len + '][]');
            $(sss).find('.ratio1').attr('name', 'ratio[' + $len + '][]');
            $(sss).find('.status').attr('name', 'status[' + $len + '][]');
            $(sss).find('.bet_limit').attr('name', 'bet_limit[' + $len + '][]');
            $(sss).find('.index').val($len);

            $(".row-form").append(sss);


            sss.find('.removeContentDiv').css('display', 'initial')

        })

        $(document).on('click', '.removeFormData', function () {
            var sss = $(this).closest('.row').remove();
        });

        $(document).on('click', '.addFormData', function () {


            var $name = $(this).closest('.column-form').find('.question').attr('name');
            var suffix = $name.match(/\d+/); // 123456
            var $len = suffix[0];

            let formDataHtml = `<div class="row option-row my-2">
                     <div class="col-md-5">
                        <div class="form-group">
                            <input type="text" name="option_name[${$len}][]" value="Yes" class="option_name form-control"
                                   placeholder="<?php echo app('translator')->get('Type your Option'); ?>">
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <input type="number"
                                   class="form-control ratio1" name="ratio[${$len}][]" step="any" required=""
                                   placeholder="<?php echo app('translator')->get('ratio'); ?>">

                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <select name="status[${$len}][]" class="status form-control">
                                <option value="1"><?php echo app('translator')->get('Active'); ?></option>
                                <option value="0"><?php echo app('translator')->get('DeActive'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-1">
                        <div class="form-group">
                            <a href="javascript:void(0);" style="float: right" class="btn  btn-danger btn-sm removeFormData"><i
                                        class="fa fa-minus"></i></a>
                        </div>
                    </div>
                </div>`;
            let formDataWrapper = $(this).closest('.option-generator'); //Input field wrapper
            $(formDataWrapper).append(formDataHtml); //Add field html
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\apache\public\project\resources\views/admin/match/freeQuestion.blade.php ENDPATH**/ ?>