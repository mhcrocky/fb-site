<?php $__env->startSection('title', trans('Frequently Ask Question')); ?>

<?php $__env->startSection('content'); ?>
    <?php if(isset($contentDetails['faq'])): ?>
        <!-- faq section -->
        <section class="faq-section faq-page">
            <div class="container">
                <div class="row g-4 gy-5 justify-content-center align-items-center">
                    <div class="col-lg-12">
                        <div class="accordion" id="accordionExample">
                            <?php $__empty_1 = true; $__currentLoopData = $contentDetails['faq']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <div class="accordion-item">
                                    <h5 class="accordion-header" id="heading<?php echo e($key); ?>">
                                        <button
                                            class="accordion-button <?php if($key != 0): ?>collapsed" <?php endif; ?>
                                        type="button"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#collapse<?php echo e($key); ?>"
                                            aria-expanded="true"
                                            aria-controls="collapse<?php echo e($key); ?>">
                                            <?php echo app('translator')->get(@$item->description->title); ?>
                                        </button>
                                    </h5>
                                    <div
                                        id="collapse<?php echo e($key); ?>"
                                        class="accordion-collapse collapse <?php if($key==0): ?>
                                        show"
                                        <?php endif; ?>
                                        aria-labelledby="heading<?php echo e($key); ?>"
                                        data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <?php echo app('translator')->get(optional($item->description)->description); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($theme.'layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\apache\public\project\resources\views/themes/betting/faq.blade.php ENDPATH**/ ?>