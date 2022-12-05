<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get($page_title); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="page-header card card-primary m-0 m-md-4 my-4 m-md-0 p-5 shadow">
        <form action="<?php echo e(route('admin.payment.search')); ?>" method="get">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="text" name="name" value="<?php echo e(@request()->name); ?>" class="form-control"
                               placeholder="<?php echo app('translator')->get('Type Here'); ?>">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <select name="status" class="form-control">
                            <option value="-1"
                                    <?php if(@request()->status == '-1'): ?> selected <?php endif; ?>><?php echo app('translator')->get('All Payment'); ?></option>
                            <option value="1"
                                    <?php if(@request()->status == '1'): ?> selected <?php endif; ?>><?php echo app('translator')->get('Complete Payment'); ?></option>
                            <option value="2"
                                    <?php if(@request()->status == '2'): ?> selected <?php endif; ?>><?php echo app('translator')->get('Pending Payment'); ?></option>
                            <option value="3"
                                    <?php if(@request()->status == '3'): ?> selected <?php endif; ?>><?php echo app('translator')->get('Cancel Payment'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <input type="date" class="form-control" name="date_time" id="datepicker"/>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <button type="submit" class="btn waves-effect waves-light btn-primary"><i
                                class="fas fa-search"></i> <?php echo app('translator')->get('Search'); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <div class="card card-primary m-0 m-md-4 my-4 m-md-0 shadow">
        <div class="card-body">

            <div class="table-responsive">
                <table class="categories-show-table table table-hover table-striped table-bordered">
                    <thead class="thead-dark">
                    <tr>
                        <th scope="col"><?php echo app('translator')->get('Date'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Trx Number'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Username'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Method'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Amount'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Charge'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Payable'); ?></th>
                        <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $funds; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $fund): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td data-label="<?php echo app('translator')->get('Date'); ?>"> <?php echo e(dateTime($fund->created_at,'d M,Y H:i')); ?></td>
                            <td data-label="<?php echo app('translator')->get('Trx Number'); ?>"
                                class="font-weight-bold text-uppercase"><?php echo e($fund->transaction); ?></td>
                            <td data-label="<?php echo app('translator')->get('Username'); ?>">
                                <a href="<?php echo e(route('admin.user-edit', $fund->user_id)); ?>"
                                   target="_blank">
                                    <div class="d-lg-flex d-block align-items-center ">
                                        <div class="mr-3"><img
                                                src="<?php echo e(getFile(config('location.user.path').optional($fund->user)->image)); ?>" alt="user"
                                                class="rounded-circle" width="45" height="45"></div>
                                        <div class="">
                                            <h5 class="text-dark mb-0 font-16 font-weight-medium"><?php echo e(optional($fund->user)->username); ?></h5>
                                            <span class="text-muted font-14"><?php echo e(optional($fund->user)->email); ?></span>
                                        </div>
                                    </div>
                                </a>
                            </td>
                            <td data-label="<?php echo app('translator')->get('Method'); ?>"><?php echo e(optional($fund->gateway)->name); ?></td>
                            <td data-label="<?php echo app('translator')->get('Amount'); ?>"
                                class="font-weight-bold"><?php echo e(getAmount($fund->amount )); ?> <?php echo e($basic->currency); ?></td>
                            <td data-label="<?php echo app('translator')->get('Charge'); ?>"
                                class="text-success"><?php echo e(getAmount($fund->charge)); ?> <?php echo e($basic->currency); ?></td>
                            <td data-label="<?php echo app('translator')->get('Payable'); ?>"
                                class="font-weight-bold"><?php echo e(getAmount($fund->final_amount)); ?> <?php echo e($fund->gateway_currency); ?></td>


                            <td data-label="<?php echo app('translator')->get('Status'); ?>" class="text-lg-center text-right">
                                <?php if($fund->status == 2): ?>
                                    <span class="badge badge-light"><i
                                            class="fa fa-circle text-warning warning font-12"></i> <?php echo app('translator')->get('Pending'); ?></span>
                                <?php elseif($fund->status == 1): ?>
                                    <span class="badge badge-light"><i
                                            class="fa fa-circle text-success success font-12"></i> <?php echo app('translator')->get('Approved'); ?></span>
                                <?php elseif($fund->status == 3): ?>
                                    <span class="badge badge-light"><i
                                            class="fa fa-circle text-danger danger font-12"></i> <?php echo app('translator')->get('Rejected'); ?></span>
                                <?php endif; ?>
                            </td>
                                <td data-label="<?php echo app('translator')->get('Action'); ?>">
                                    <?php
                                        if($fund->detail){
                                                $details =[];
                                                  foreach($fund->detail as $k => $v){
                                                        if($v->type == "file"){
                                                            $details[kebab2Title($k)] = [
                                                                'type' => $v->type,
                                                                'field_name' => getFile(config('location.deposit.path').date('Y',strtotime($fund->created_at)).'/'.date('m',strtotime($fund->created_at)).'/'.date('d',strtotime($fund->created_at)) .'/'.$v->field_name)
                                                                ];
                                                        }else{
                                                            $details[kebab2Title($k)] =[
                                                                'type' => $v->type,
                                                                'field_name' => $v->field_name
                                                            ];
                                                        }
                                                  }
                                            }else{
                                                $details = null;
                                            }
                                    ?>

                                    <?php if($fund->gateway_id > 999): ?>
                                        <button
                                            class="edit_button   btn  <?php echo e(($fund->status == 2) ?  'btn-primary' : 'btn-success'); ?> text-white  btn-sm "
                                            data-toggle="modal" data-target="#myModal"
                                            data-title="<?php echo e(($fund->status == 2) ?  trans('Edit') : trans('Details')); ?>"

                                            data-id="<?php echo e($fund->id); ?>"
                                            data-feedback="<?php echo e($fund->feedback); ?>"
                                            data-info="<?php echo e(json_encode($details)); ?>"
                                            data-amount="<?php echo e(getAmount($fund->amount)); ?> <?php echo e($basic->currency); ?>"
                                            data-username="<?php echo e(optional($fund->user)->username); ?>"
                                            data-route="<?php echo e(route('admin.payment.action',$fund->id)); ?>"
                                            data-status="<?php echo e($fund->status); ?>">

                                            <?php if(($fund->status == 2)): ?>
                                                <i class="fa fa-pencil-alt"></i>
                                            <?php else: ?>
                                                <i class="fa fa-eye"></i>
                                            <?php endif; ?>

                                        </button>
                                    <?php else: ?>
                                        -
                                    <?php endif; ?>
                                </td>
                            
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="100%">
                                <p class="text-dark"><?php echo app('translator')->get('No Data Found'); ?></p>
                            </td>
                        </tr>

                    <?php endif; ?>
                    </tbody>
                </table>
                <?php echo e($funds->appends($_GET)->links('partials.pagination')); ?>

            </div>
        </div>
    </div>

    <!-- Modal for Edit button -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content ">
                <div class="modal-header modal-colored-header bg-primary">
                    <h4 class="modal-title" id="myModalLabel"><?php echo app('translator')->get('Deposit Information'); ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>

                <form role="form" method="POST" class="actionRoute" action="" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <?php echo method_field('put'); ?>
                    <div class="modal-body">
                        <ul class="list-group withdraw-detail">
                        </ul>

                        <div class="get-feedback">

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><?php echo app('translator')->get('Close'); ?></button>
                        <?php if(Request::routeIs('admin.payment.pending')): ?>
                            <input type="hidden" class="action_id" name="id">
                            <button type="submit" class="btn btn-primary" name="status"
                                    value="1"><?php echo app('translator')->get('Approve'); ?></button>
                            <button type="submit" class="btn btn-danger" name="status"
                                    value="3"><?php echo app('translator')->get('Reject'); ?></button>
                        <?php endif; ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script>
        "use strict";
        $(document).ready(function () {
            $('select[name=status]').select2({
                selectOnClose: true
            });

            $(document).on("click", '.edit_button', function (e) {
                var id = $(this).data('id');
                var feedback = $(this).data('feedback');

                $(".action_id").val(id);
                $(".actionRoute").attr('action', $(this).data('route'));
                var details = Object.entries($(this).data('info'));
                var list = [];
                details.map(function (item, i) {
                    if (item[1].type == 'file') {
                        var singleInfo = `<br><img src="${item[1].field_name}" alt="..." class="w-100">`;
                    } else {
                        var singleInfo = `<span class="font-weight-bold ml-3">${item[1].field_name}</span>  `;
                    }
                    list[i] = ` <li class="list-group-item"><span class="font-weight-bold "> ${item[0].replace('_', " ")} </span> : ${singleInfo}</li>`
                });
                $('.withdraw-detail').html(list);

                if (feedback == '') {
                    var $res = `<div class="form-group"><br>
                                <label class="font-weight-bold"><?php echo e(trans('Send You Feedback')); ?></label>
                                <textarea name="feedback" class="form-control" row="3" required><?php echo e(old('feedback')); ?></textarea>
                            </div>`
                } else {
                    var $res = `<h5><?php echo e(trans('Feedback')); ?></h5>
                    <p>${feedback}</p>`
                }

                $('.get-feedback').html($res)
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\apache\public\project\resources\views/admin/payment/logs.blade.php ENDPATH**/ ?>