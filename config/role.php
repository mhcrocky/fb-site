<?php

$arr = [
    'dashboard' => [
        'label' => "Dashboard",
        'access' => [
            'view' => ['admin.dashboard'],
            'add' => [],
            'edit' => [],
            'delete' => [],
        ],
    ],
    'manage_staff' =>[
        'label' => "Manage Staff",
        'access' => [
            'view' => ['admin.staff'],
            'add' => ['admin.storeStaff'],
            'edit' => ['admin.updateStaff'],
            'delete' => [],
        ],
    ],
    'identify_form' =>[
        'label' => "Identity Form",
        'access' => [
            'view' => ['admin.identify-form'],
            'add' => ['admin.identify-form.store'],
            'edit' => ['admin.identify-form.store'],
            'delete' => [],
        ],
    ],



    'all_transaction' => [
        'label' => "All Transaction",
        'access' => [
            'view' => [
                'admin.transaction',
                'admin.transaction.search',
            ],
            'add' => [],
            'edit' => [],
            'delete' => [],
        ],
    ],


    'user_management' => [
        'label' => "User Management",
        'access' => [
            'view' => [
                'admin.users',
                'admin.users.search',
                'admin.email-send',
                'admin.user.transaction',
                'admin.user.fundLog',
                'admin.user.withdrawal',
                'admin.user.userKycHistory',
                'admin.kyc.users.pending',
                'admin.kyc.users',
                'admin.user-edit',
            ],
            'add' => [],
            'edit' => [
                'admin.user-multiple-active',
                'admin.user-multiple-inactive',
                'admin.send-email',
                'admin.user.userKycHistory',
                'admin.user-balance-update',
            ],
            'delete' => [],
        ],
    ],


    'payment_gateway' => [
        'label' => "Payment Gateway",
        'access' => [
            'view' => [
                'admin.payment.methods',
                'admin.deposit.manual.index',
            ],
            'add' => [
                'admin.deposit.manual.create'
            ],
            'edit' => [
                'admin.edit.payment.methods',
                'admin.deposit.manual.edit'
            ],
            'delete' => [],
        ],
    ],

    'payment_log' => [
        'label' => "Payment Request & Log",
        'access' => [
            'view' => [
                'admin.payment.pending',
                'admin.payment.log',
                'admin.payment.search',
            ],
            'add' => [],
            'edit' => [
                'admin.payment.action'
            ],
            'delete' => [],
        ],
    ],

    'payout_manage' => [
        'label' => "Payout method & Log",
        'access' => [
            'view' => [
                'admin.payout-method',
                'admin.payout-log',
                'admin.payout-request',
                'admin.payout-log.search',
            ],
            'add' => [
                'admin.payout-method.create',
            ],
            'edit' => [
                'admin.payout-method.edit',
                'admin.payout-action'
            ],
            'delete' => [],
        ],
    ],





    'support_ticket' => [
        'label' => "Support Ticket",
        'access' => [
            'view' => [
                'admin.ticket',
                'admin.ticket.view',
            ],
            'add' => [
                'admin.ticket.reply'
            ],
            'edit' => [],
            'delete' => [
                'admin.ticket.delete',
            ],
        ],
    ],
    'subscriber' => [
        'label' => "Subscriber",
        'access' => [
            'view' => [
                'admin.subscriber.index',
                'admin.subscriber.sendEmail',
            ],
            'add' => [],
            'edit' => [],
            'delete' => [
                'admin.subscriber.remove'
            ],
        ],
    ],

    'website_controls' => [
        'label' => "Website Controls",
        'access' => [
            'view' => [
                'admin.basic-controls',
                'admin.email-controls',
                'admin.email-template.show',
                'admin.sms.config',
                'admin.sms-template',
                'admin.notify-config',
                'admin.notify-template.show',
                'admin.notify-template.edit',
            ],
            'add' => [],
            'edit' => [
                'admin.basic-controls.update',
                'admin.email-controls.update',
                'admin.email-template.edit',
                'admin.sms-template.edit',
                'admin.notify-config.update',
                'admin.notify-template.update',
            ],
            'delete' => [],
        ],
    ],
    'language_settings' => [
        'label' => "Language Settings",
        'access' => [
            'view' => [
                'admin.language.index',
            ],
            'add' => [
                'admin.language.create',
            ],
            'edit' => [
                'admin.language.edit',
                'admin.language.keywordEdit',
            ],
            'delete' => [
                'admin.language.delete'
            ],
        ],
    ],
    'theme_settings' =>  [
        'label' => "Theme Settings",
        'access' => [
            'view' => [
                'admin.manage.theme',
                'admin.logo-seo',
                'admin.breadcrumb',
                'admin.template.show',
                'admin.content.index',
            ],
            'add' => [
                'admin.content.create'
            ],
            'edit' => [
                'admin.logoUpdate',
                'admin.seoUpdate',
                'admin.breadcrumbUpdate',
                'admin.content.show',
            ],
            'delete' => [
                'admin.content.delete'
            ],
        ],
    ],

];

return $arr;



