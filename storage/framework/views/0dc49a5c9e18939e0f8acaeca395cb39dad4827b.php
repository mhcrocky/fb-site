<?php
use Illuminate\Support\Facades\Http;

    $segments = request()->segments();
    $last  = end($segments);
    ///api call
    $response = Http::withHeaders([
        'x-rapidapi-host' => 'v3.football.api-sports.io',
        'x-rapidapi-key' => 'ffb34956934ed4e7b7061f74afa17034'
    ])->get('https://v3.football.api-sports.io/leagues', [
        'season' => '2022',
        'type' =>'cup',
        'current'=>"true",
        'country'=>'World'
    ]);
    $leagues = json_decode($response->body())->response;
    //end api
?>

<ul class="main">
    <li>
        <a  <?php if(Request::routeIs('home')): ?> class="active" <?php endif; ?>
            href="<?php echo e(route('home')); ?>">
            <i class="far fa-globe-americas"></i> <span><?php echo e(trans('All Sports')); ?></span>
        </a>
    </li>
    <?php $__empty_1 = true; $__currentLoopData = $gameCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gameCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <li>
            <a
                class="dropdown-toggle "
                data-bs-toggle="collapse"
                href="#collapse<?php echo e($gameCategory->id); ?>"
                role="button"
                aria-expanded="true"
                aria-controls="collapseExample">
                <?php echo $gameCategory->icon; ?><?php echo e($gameCategory->name); ?>

                <span class="count"><span class="font-italic">(<?php echo e(count($leagues)); ?>)</span></span>
            </a>
            <!-- dropdown item -->

            <div class="collapse <?php echo e(($loop->index == 0) ? 'show' :''); ?>" id="collapse<?php echo e($gameCategory->id); ?>">
                <ul class="">
                    <?php $__empty_2 = true; $__currentLoopData = $leagues; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                        <li>
                            <a  href="<?php echo e(route('tournament',[$tItem->league->id ])); ?>" class="sidebar-link">
                                
                                <i class="far fa-hand-point-right"></i> <?php echo e($tItem->league->name); ?></a>
                        </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                    <?php endif; ?>
                </ul>
            </div>
        </li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <?php endif; ?>
</ul>
<?php /**PATH E:\apache\public\project\resources\views/themes/betting/partials/home/leftMenu.blade.php ENDPATH**/ ?>