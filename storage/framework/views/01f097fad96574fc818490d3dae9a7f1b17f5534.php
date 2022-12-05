<?php $__env->startSection('title'); ?>
    <?php echo app('translator')->get(optional($match->gameTeam1)->name); ?> <?php echo app('translator')->get('vs'); ?>
    <?php echo app('translator')->get(optional($match->gameTeam2)->name); ?>-<?php echo app('translator')->get($match->name); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <div id="optionListRender">

        <div class="card card-primary m-0 m-md-4  m-md-0 shadow">
            <div class="card-header bg-transparent">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <a href="<?php echo e(route('admin.addQuestion',$match->id)); ?>" class="btn btn-sm btn-primary mr-2">
                        <span><i class="fa fa-question-circle"></i> <?php echo app('translator')->get('Add Question/Threat'); ?></span>
                    </a>
                    <div class="dropdown text-right">
                        <button class="btn btn-sm  btn-dark dropdown-toggle" type="button" id="dropdownMenuButton"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span><i class="fas fa-bars pr-2"></i> <?php echo app('translator')->get('Action'); ?></span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <button class="dropdown-item" type="button" data-toggle="modal"
                                    data-target="#all_active"><?php echo app('translator')->get('Active'); ?></button>
                            <button class="dropdown-item" type="button" data-toggle="modal"
                                    data-target="#all_inactive"><?php echo app('translator')->get('DeActive'); ?></button>
                            <button class="dropdown-item" type="button" data-toggle="modal"
                                    data-target="#all_close"><?php echo app('translator')->get('Close'); ?></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="categories-show-table table table-hover table-striped table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">
                                <input type="checkbox" class="form-check-input check-all tic-check" name="check-all"
                                       id="check-all">
                                <label for="check-all"></label>
                            </th>

                            <th scope="col" class="text-center"><?php echo app('translator')->get('SL No.'); ?></th>
                            <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                            <th scope="col" class="text-center"><?php echo app('translator')->get('Status'); ?></th>
                            <th scope="col" class="text-center"><?php echo app('translator')->get('Locker'); ?></th>
                            <th scope="col" class="text-center"><?php echo app('translator')->get('Action'); ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $gameQuestions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="text-center">
                                    <input type="checkbox" id="chk-<?php echo e($item->id); ?>"
                                           class="form-check-input row-tic tic-check" name="check" value="<?php echo e($item->id); ?>"
                                           data-id="<?php echo e($item->id); ?>">
                                    <label for="chk-<?php echo e($item->id); ?>"></label>
                                </td>

                                <td data-label="<?php echo app('translator')->get('SL No.'); ?>" class="text-center"><?php echo e($loop->index + 1); ?></td>
                                <td data-label="<?php echo app('translator')->get('Name'); ?>">
                                    <?php echo app('translator')->get($item->name); ?>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Status'); ?>" class="text-lg-center text-right">
                                    <?php if($item->status == 0): ?>
                                        <span class="badge badge-light">
                                              <i class="fa fa-circle text-warning font-12"></i> <?php echo app('translator')->get('Pending'); ?> </span>
                                    <?php elseif($item->status == 1): ?>
                                        <span class="badge badge-light">
                                             <i class="fa fa-circle text-success success font-12"></i> <?php echo app('translator')->get('Active'); ?></span>
                                    <?php elseif($item->status == 2): ?>
                                        <span class="badge badge-light">
                                            <i class="fa fa-circle text-danger font-12"></i> <?php echo app('translator')->get('Closed'); ?></span>
                                    <?php endif; ?>
                                </td>

                                <td data-label="<?php echo app('translator')->get('Locker'); ?>" class="text-lg-center text-right">
                                    <a class="btn btn-sm  btn-outline-<?php echo e(($item->is_unlock == 1) ? 'primary':'dark'); ?> <?php echo e(($item->result == 1)?'disabled':''); ?>"
                                       href="<?php echo e(route('admin.question.locker')); ?>"
                                       onclick="event.preventDefault();
                                                     document.getElementById('locker<?php echo e($item->id); ?>').submit();">
                                        <?php if($item->is_unlock == 1): ?>
                                            <i class="fa fa-unlock"></i>  <?php echo e(__('Unlock Now')); ?>

                                        <?php else: ?>
                                            <i class="fa fa-lock"></i> <?php echo e(__('Lock Now')); ?>

                                        <?php endif; ?>

                                    </a>
                                    <form id="locker<?php echo e($item->id); ?>" action="<?php echo e(route('admin.question.locker')); ?>"
                                          method="POST" class="d-none">
                                        <?php echo csrf_field(); ?>
                                        <input type="text" name="question_id" value="<?php echo e($item->id); ?>">
                                    </form>

                                </td>

                                <td data-label="<?php echo app('translator')->get('Action'); ?>">

                                    <button type="button"
                                            @click="getOptions(<?php echo e($item); ?>, false)"
                                            class="btn btn-outline-info btn-sm optionInfo"
                                            title="<?php echo app('translator')->get('Option List'); ?>"
                                            data-target="#optionList" data-backdrop="static"
                                            data-toggle="modal">
                                        <i class="fa fa-gamepad"
                                           aria-hidden="true"></i>
                                    </button>


                                    <button type="button" class="btn btn-sm btn-outline-primary editBtn"
                                            data-resource="<?php echo e($item); ?>"
                                            data-action="<?php echo e(route('admin.updateQuestion', $item->id)); ?>"
                                            data-target="#editModal"
                                            data-toggle="modal" data-backdrop="static"
                                            title="<?php echo app('translator')->get('Edit Question'); ?>" <?php echo e(($item->result == 1)?'disabled':''); ?>>
                                        <i class="fa fa-edit"
                                           aria-hidden="true"></i>
                                    </button>


                                    <button type="button" class="btn btn-sm btn-outline-danger notiflix-confirm"
                                            data-target="#delete-modal" data-backdrop="static"
                                            data-route="<?php echo e(route('admin.deleteQuestion',$item->id)); ?>"
                                            data-toggle="modal" title="<?php echo app('translator')->get('Delete'); ?>">
                                        <i class="fa fa-trash-alt"
                                           aria-hidden="true"></i>
                                    </button>


                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>

                        <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($gameQuestions->appends(@$search)->links('partials.pagination')); ?>

                </div>
            </div>
        </div>

        <?php echo $__env->make('admin.match.partials.questionAttempt', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- Service List Modal -->
        <div class="modal fade" id="optionList" role="dialog">
            <div class="modal-dialog  modal-xl">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h5 class="modal-title service-title">{{ modalTitle }}</h5>
                        <button type="button" class="close" @click="closeOptionList(true)" data-dismiss="modal"
                                aria-label="Close">×
                        </button>
                    </div>
                    <div class="modal-body">
                        <button class="btn btn-primary btn-sm mb-2" @click="addNewOption" type="button"><i
                                class="fa fa-plus-circle"></i> <?php echo app('translator')->get('Add Option'); ?></button>
                        <div class="table-responsive">
                            <table class="categories-show-table table table-hover table-striped table-bordered"
                                   id="zero_config">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col"><?php echo app('translator')->get('Name'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Ratio'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Status'); ?></th>
                                    <th scope="col"><?php echo app('translator')->get('Action'); ?></th>
                                </tr>
                                </thead>
                                <tbody class="result-body" v-cloak>
                                <tr v-for="(item, index) in items">
                                    <th data-label="<?php echo app('translator')->get('#'); ?>">#</th>
                                    <th data-label="<?php echo app('translator')->get('Name'); ?>">{{ item.option_name }}</th>
                                    <th data-label="<?php echo app('translator')->get('Ratio'); ?>">{{ item.ratio }}</th>
                                    <th data-label="<?php echo app('translator')->get('Status'); ?>">
                                            <span v-if="item.status == '1'"
                                                  class="badge badge-success"><?php echo app('translator')->get('Active'); ?></span>
                                        <span v-else-if="item.status == '2'"
                                              class="badge badge-primary"><?php echo app('translator')->get('Win'); ?></span>
                                        <span v-else-if="item.status == '0'"
                                              class="badge badge-dark"><?php echo app('translator')->get('DeActive'); ?></span>
                                        <span v-else-if="item.status == '-2'"
                                              class="badge badge-danger"><?php echo app('translator')->get('Lost'); ?></span>
                                        <span v-else-if="item.status == '3'"
                                              class="badge badge-danger"><?php echo app('translator')->get('Refunded'); ?></span>
                                    </th>
                                    <th data-label="<?php echo app('translator')->get('Action'); ?>">
                                        <button type="button" @click="editOption(item, false)"
                                                class="btn btn-sm btn-primary">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <button type="button" @click="deleteOption(item, false)"
                                                class="btn btn-sm btn-danger">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>

                                    </th>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" @click="closeOptionList(true)"
                                data-dismiss="modal"><span><?php echo app('translator')->get('Close'); ?></span></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="optionEdit" role="dialog" data-keyboard="false"
             data-backdrop="static">
            <div class="modal-dialog  modal-xl">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h5 class="modal-title service-title"><?php echo app('translator')->get('Edit Option'); ?></h5>
                        <button type="button" class="close" @click="closeOptionList(true)" data-dismiss="modal"
                                aria-label="Close">×
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" v-model="option.id">
                        <span class="text-danger" v-if="errorMsg && errorMsg.id">{{ errorMsg.id[0] }}</span>

                        <div class="form-group">
                            <label><?php echo app('translator')->get('Option Name'); ?></label>
                            <input type="text" class="form-control" v-model="option.option_name">

                            <span class="text-danger" v-if="errorMsg && errorMsg.option_name">{{ errorMsg.option_name[0] }}</span>
                        </div>
                        <div class="form-group">
                            <label><?php echo app('translator')->get('Ratio'); ?></label>
                            <input type="number" min="0" class="form-control" v-model="option.ratio">
                            <span class="text-danger" v-if="errorMsg && errorMsg.ratio">{{ errorMsg.ratio[0] }}</span>
                        </div>

                        <div class="form-group">
                            <label><?php echo app('translator')->get('Status'); ?></label>
                            <select class="form-control" v-model="option.status">
                                <option value="1" :selected="option.status == 1">Active</option>
                                <option value="0" :selected="option.status == 0">DeActive</option>
                            </select>
                            <span class="text-danger"
                                  v-if="errorMsg && errorMsg.status">{{ errorMsg.status[0] }}</span>
                        </div>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="updateOption"><span><?php echo app('translator')->get('Update'); ?></span>
                        </button>

                        <button type="button" class="btn btn-light" @click="closeOptionList(true)"
                                data-dismiss="modal"><span><?php echo app('translator')->get('Close'); ?></span></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="optionAdd" role="dialog" data-keyboard="false"
             data-backdrop="static">
            <div class="modal-dialog  modal-xl">
                <div class="modal-content">
                    <div class="modal-header modal-colored-header bg-primary">
                        <h5 class="modal-title service-title"><?php echo app('translator')->get('Add New Option'); ?></h5>
                        <button type="button" class="close" @click="closeOptionList(true)" data-dismiss="modal"
                                aria-label="Close">×
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label><?php echo app('translator')->get('Option Name'); ?></label>
                            <input type="text" class="form-control" v-model="option.option_name">

                            <span class="text-danger" v-if="errorMsg && errorMsg.option_name">{{ errorMsg.option_name[0] }}</span>
                        </div>
                        <div class="form-group">
                            <label><?php echo app('translator')->get('Ratio'); ?></label>
                            <input type="number" min="0" class="form-control" v-model="option.ratio">
                            <span class="text-danger" v-if="errorMsg && errorMsg.ratio">{{ errorMsg.ratio[0] }}</span>
                        </div>

                        <div class="form-group">
                            <label><?php echo app('translator')->get('Status'); ?></label>
                            <select class="form-control" v-model="option.status">
                                <option value="1" :selected="option.status == 1">Active</option>
                                <option value="0" :selected="option.status == 0">DeActive</option>
                            </select>
                            <span class="text-danger"
                                  v-if="errorMsg && errorMsg.status">{{ errorMsg.status[0] }}</span>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" @click="saveOption"><span><?php echo app('translator')->get('Save'); ?></span>
                        </button>

                        <button type="button" class="btn btn-light" @click="closeOptionList(true)"
                                data-dismiss="modal"><span><?php echo app('translator')->get('Close'); ?></span></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

    <script src="<?php echo e(asset('assets/admin/js/moment.js')); ?>"></script>


    <?php if($errors->any()): ?>
        <?php
            $collection = collect($errors->all());
            $errors = $collection->unique();
        ?>

    <?php endif; ?>

    <script>
        "use strict";
        <?php $__currentLoopData = $errors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        Notiflix.Notify.Failure("<?php echo e(trans($error)); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        let optionListRender = new Vue({
            el: "#optionListRender",
            data: {
                question: {},
                currency: "<?php echo e(config('basic.currency_symbol')); ?>",
                items: [],
                modalTitle: null,
                fetchDataOff: true,
                option: {},
                errorMsg: null,
            },
            mounted() {
            },
            methods: {
                closeOptionList(params, fetchDataOff) {
                    this.fetchDataOff = params
                },
                getOptions(question, fetchDataOff) {
                    var _this = this;
                    _this.question = question;
                    _this.modalTitle = question.name;
                    _this.fetchDataOff = fetchDataOff;
                    if (_this.fetchDataOff == true) {
                        return 0;
                    }
                    var $url = '<?php echo e(route('admin.optionList')); ?>/' + question.id;
                    axios.get($url)
                        .then(function (response) {
                            _this.items = response.data
                        })
                        .catch(function (error) {
                            console.log(error);
                        })

                },
                editOption(obj, fetchDataOff) {
                    var _this = this;

                    _this.errorMsg = null;
                    _this.fetchDataOff = fetchDataOff;
                    if (_this.fetchDataOff == true) {
                        return 0;
                    }
                    $('#optionEdit').modal('show');
                    $('#optionEdit').modal({backdrop: 'static', keyboard: false})
                    _this.option = obj
                },
                deleteOption(obj, fetchDataOff) {
                    var _this = this;
                    axios.post('<?php echo e(route('admin.optionDelete')); ?>', {
                        id: obj.id
                    })
                        .then(function (response) {
                            if (response.data.errors) {
                                _this.errorMsg = response.data.errors
                                return 0;
                            }
                            if (response.data.success == true) {

                                _this.items.splice(_this.items.indexOf(obj), 1);

                                Notiflix.Notify.Success("Delete Successfully");

                            }

                            if (response.data.success == false) {
                                Notiflix.Notify.Failure("" + response.data.result);
                            }


                        })
                        .catch(function (error) {

                        });
                },
                updateOption() {
                    var _this = this;
                    axios.post('<?php echo e(route('admin.optionUpdate')); ?>', _this.option)
                        .then(function (response) {
                            if (response.data.errors) {
                                _this.errorMsg = response.data.errors
                                return 0;
                            }


                            if (response.data.result) {
                                _this.errorMsg = null;
                                var list = _this.items;
                                const result = list.map(function (obj) {
                                    if (obj.id == response.data.result.id) {
                                        obj = response.data.result
                                    }
                                    return obj
                                });
                                $('#optionEdit').modal('hide');
                                Notiflix.Notify.Success("Updated Successfully");

                            } else {
                                $('#optionEdit').modal('hide');
                                Notiflix.Notify.Failure("Result Over");

                            }
                        })
                        .catch(function (error) {

                        });

                },


                addNewOption() {
                    this.option.option_name = '';
                    this.option.ratio = 1;
                    this.option.status = 1;
                    this.option.match_id = this.question.match_id;
                    this.option.question_id = this.question.id;
                    $('#optionAdd').modal('show');
                    $('#optionAdd').modal({backdrop: 'static', keyboard: false})
                },

                saveOption() {
                    var _this = this;
                    axios.post('<?php echo e(route('admin.optionAdd')); ?>', _this.option)
                        .then(function (response) {

                            if (response.data.errors) {
                                _this.errorMsg = response.data.errors
                                return 0;
                            }

                            if (response.data.result) {
                                _this.errorMsg = null;
                                var list = _this.items;

                                list.push(response.data.result);

                                Notiflix.Notify.Success("Saved Successfully");
                                _this.option = {};
                                $('#optionAdd').modal('hide');
                                $('#optionList').modal('show');
                                $('#optionList').modal({backdrop: 'static', keyboard: false})
                                return 0;
                            }


                        })
                        .catch(function (error) {
                        });
                },


                formattedNumber(amount) {
                    var amount = (parseFloat(amount).toFixed(0))
                    return Intl.NumberFormat().format(amount);
                }
            }

        });


    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\apache\public\project\resources\views/admin/match/questionList.blade.php ENDPATH**/ ?>