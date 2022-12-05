<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.dashboard')); ?>" aria-expanded="false">
                        <i data-feather="home" class="feather-icon"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Dashboard'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.identify-form')); ?>" aria-expanded="false">
                        <i data-feather="file-text" class="feather-icon"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('KYC / Identity Form'); ?></span>
                    </a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Manage Module'); ?></span></li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.listCategory*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.listCategory')); ?>" aria-expanded="false">
                        <i class="fas fa-tag"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Game Category'); ?></span>
                    </a>
                </li>
                <li class="sidebar-item <?php echo e(menuActive(['admin.listTournament*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.listTournament')); ?>" aria-expanded="false">
                        <i class="fas fa-gamepad"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Tournament'); ?></span>
                    </a>
                </li>
                <li class="sidebar-item <?php echo e(menuActive(['admin.listTeam*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.listTeam')); ?>" aria-expanded="false">
                        <i class="fa fa-users"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Team'); ?></span>
                    </a>
                </li>
                <li class="sidebar-item <?php echo e(menuActive(['admin.*Match*','admin.addQuestion'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.listMatch')); ?>" aria-expanded="false">
                        <i class="fa fa-flag"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Match'); ?></span>
                    </a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Manage Result'); ?></span></li>
                <li class="sidebar-item <?php echo e(menuActive(['admin.resultList.pending'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.resultList.pending')); ?>" aria-expanded="false">
                        <i class="fa fa-spinner"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Pending Result'); ?></span>
                    </a>
                </li>
                <li class="sidebar-item <?php echo e(menuActive(['admin.resultList.complete'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.resultList.complete')); ?>" aria-expanded="false">
                        <i class="fas fa-check-circle"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Close Result'); ?></span>
                    </a>
                </li>


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Referral'); ?></span></li>
                
                <li class="sidebar-item <?php echo e(menuActive(['admin.referral-commission'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.referral-commission')); ?>" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Referral Commission'); ?></span>
                    </a>
                </li>
                
                


                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('All Transaction '); ?></span></li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.transaction*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.transaction')); ?>" aria-expanded="false">
                        <i class="fas fa-exchange-alt"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Transaction'); ?></span>
                    </a>
                </li>
                <li class="sidebar-item <?php echo e(menuActive(['admin.commissions*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.commissions')); ?>" aria-expanded="false">
                        <i class="fas fa-money-bill-alt"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Commission'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.historyBet*','admin.searchBet'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.historyBet')); ?>" aria-expanded="false">
                        <i class="fas fa-tag"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Bet History'); ?></span>
                    </a>
                </li>


                
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Manage User'); ?></span></li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.users','admin.users.search','admin.user-edit*','admin.send-email*','admin.user*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.users')); ?>" aria-expanded="false">
                        <i class="fas fa-users"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('All User'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.kyc.users.pending')); ?>"
                       aria-expanded="false">
                        <i class="fas fa-spinner"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Pending KYC'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.kyc.users')); ?>"
                       aria-expanded="false">
                        <i class="fas fa-file-invoice"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('KYC Log'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.email-send')); ?>"
                       aria-expanded="false">
                        <i class="fas fa-envelope-open"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Send Email'); ?></span>
                    </a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Payment Settings'); ?></span></li>
                <li class="sidebar-item <?php echo e(menuActive(['admin.payment.methods','admin.edit.payment.methods'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.payment.methods')); ?>"
                       aria-expanded="false">
                        <i class="fas fa-credit-card"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Payment Methods'); ?></span>
                    </a>
                </li>
                <li class="sidebar-item <?php echo e(menuActive(['admin.deposit.manual.index','admin.deposit.manual.create','admin.deposit.manual.edit'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.deposit.manual.index')); ?>"
                       aria-expanded="false">
                        <i class="fa fa-university"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Manual Gateway'); ?></span>
                    </a>
                </li>
                <li class="sidebar-item <?php echo e(menuActive(['admin.payment.pending'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.payment.pending')); ?>" aria-expanded="false">
                        <i class="fas fa-spinner"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Deposit Request'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.payment.log','admin.payment.search'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.payment.log')); ?>" aria-expanded="false">
                        <i class="fas fa-history"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Payment Log'); ?></span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Payout Settings'); ?></span></li>
                <li class="sidebar-item <?php echo e(menuActive(['admin.payout-method*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.payout-method')); ?>"
                       aria-expanded="false">
                        <i class="fas fa-credit-card"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Payout Methods'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.payout-request'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.payout-request')); ?>" aria-expanded="false">
                        <i class="fas fa-hand-holding-usd"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Payout Request'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item <?php echo e(menuActive(['admin.payout-log*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.payout-log')); ?>" aria-expanded="false">
                        <i class="fas fa-history"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Payout Log'); ?></span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Support Tickets'); ?></span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.ticket')); ?>" aria-expanded="false">
                        <i class="fas fa-ticket-alt"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('All Tickets'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.ticket',['open'])); ?>"
                       aria-expanded="false">
                        <i class="fas fa-spinner"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Open Ticket'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.ticket',['closed'])); ?>"
                       aria-expanded="false">
                        <i class="fas fa-times-circle"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Closed Ticket'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.ticket',['answered'])); ?>"
                       aria-expanded="false">
                        <i class="fas fa-reply"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Answered Ticket'); ?></span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Subscriber'); ?></span></li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.subscriber.index')); ?>" aria-expanded="false">
                        <i class="fas fa-envelope-open"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Subscriber List'); ?></span>
                    </a>
                </li>
                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Controls'); ?></span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.basic-controls')); ?>" aria-expanded="false">
                        <i class="fas fa-cogs"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Basic Controls'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.plugin.config')); ?>" aria-expanded="false">
                        <i class="fas fa-cog"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Plugin Controls'); ?></span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-envelope"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Email Settings'); ?></span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admin.email-controls')); ?>" class="sidebar-link">
                                <span class="hide-menu"><?php echo app('translator')->get('Email Controls'); ?></span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admin.email-template.show')); ?>" class="sidebar-link">
                                <span class="hide-menu"><?php echo app('translator')->get('Email Template'); ?> </span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-mobile-alt"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('SMS Settings'); ?></span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admin.sms.config')); ?>" class="sidebar-link">
                                <span class="hide-menu"><?php echo app('translator')->get('SMS Controls'); ?></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admin.sms-template')); ?>" class="sidebar-link">
                                <span class="hide-menu"><?php echo app('translator')->get('SMS Template'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-bell"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Push Notification'); ?></span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level base-level-line">
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admin.notify-config')); ?>" class="sidebar-link">
                                <span class="hide-menu"><?php echo app('translator')->get('Configuration'); ?></span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="<?php echo e(route('admin.notify-template.show')); ?>" class="sidebar-link">
                                <span class="hide-menu"><?php echo app('translator')->get('Template'); ?></span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item <?php echo e(menuActive(['admin.language.create','admin.language.edit*','admin.language.keywordEdit*'],3)); ?>">
                    <a class="sidebar-link" href="<?php echo e(route('admin.language.index')); ?>"
                       aria-expanded="false">
                        <i class="fas fa-language"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Manage Language'); ?></span>
                    </a>
                </li>

                <li class="list-divider"></li>
                <li class="nav-small-cap"><span class="hide-menu"><?php echo app('translator')->get('Theme Settings'); ?></span></li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.logo-seo')); ?>" aria-expanded="false">
                        <i class="fas fa-image"></i><span
                            class="hide-menu"><?php echo app('translator')->get('Manage Logo & SEO'); ?></span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="<?php echo e(route('admin.breadcrumb')); ?>" aria-expanded="false">
                        <i class="fas fa-file-image"></i><span
                            class="hide-menu"><?php echo app('translator')->get('Manage Breadcrumb'); ?></span>
                    </a>
                </li>


                <li class="sidebar-item <?php echo e(menuActive(['admin.template.show*'],3)); ?>">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Manage Content'); ?></span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level base-level-line <?php echo e(menuActive(['admin.template.show*'],1)); ?>">

                        <?php $__currentLoopData = array_diff(array_keys(config('templates')),['message','template_media']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="sidebar-item <?php echo e(menuActive(['admin.template.show'.$name])); ?>">
                                <a class="sidebar-link <?php echo e(menuActive(['admin.template.show'.$name])); ?>"
                                   href="<?php echo e(route('admin.template.show',$name)); ?>">
                                    <span class="hide-menu"><?php echo app('translator')->get(ucfirst(kebab2Title($name))); ?></span>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </ul>
                </li>


                <?php
                    $segments = request()->segments();
                    $last  = end($segments);
                ?>
                <li class="sidebar-item <?php echo e(menuActive(['admin.content.create','admin.content.show*'],3)); ?>">
                    <a class="sidebar-link has-arrow <?php echo e(Request::routeIs('admin.content.show',$last) ? 'active' : ''); ?>"
                       href="javascript:void(0)" aria-expanded="false">
                        <i class="fas fa-clipboard-list"></i>
                        <span class="hide-menu"><?php echo app('translator')->get('Content Settings'); ?></span>
                    </a>
                    <ul aria-expanded="false"
                        class="collapse first-level base-level-line <?php echo e(menuActive(['admin.content.create','admin.content.show*'],1)); ?>">
                        <?php $__currentLoopData = array_diff(array_keys(config('contents')),['message','content_media']); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="sidebar-item <?php echo e(($last == $name) ? 'active' : ''); ?> ">
                                <a class="sidebar-link <?php echo e(($last == $name) ? 'active' : ''); ?>"
                                   href="<?php echo e(route('admin.content.index',$name)); ?>">
                                    <span class="hide-menu"><?php echo app('translator')->get(ucfirst(kebab2Title($name))); ?></span>
                                </a>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </li>

                <li class="list-divider"></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<?php /**PATH E:\apache\public\project\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>