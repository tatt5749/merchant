<?php

return [

    /**
     * Provider.
     */
    'provider'  => 'merchant',

    /*
     * Package.
     */
    'package'   => 'merchant',

    /*
     * Modules.
     */
    'modules'   => ['merchant'],

    
    'merchant'       => [
        'model' => [
            'model'                 => \Merchant\Merchant\Models\Merchant::class,
            'table'                 => 'merchants',
            'presenter'             => \Merchant\Merchant\Repositories\Presenter\MerchantPresenter::class,
            'hidden'                => [],
            'visible'               => [],
            'guarded'               => ['*'],
            'slugs'                 => ['slug' => 'name'],
            'dates'                 => ['deleted_at', 'createdat', 'updated_at'],
            'appends'               => [],
            'fillable'              => ['id',  'merchant_name',  'username',  'password',  'email',  'address',  'information',  'img',  'phone'],
            'translatables'         => [],
            'upload_folder'         => 'merchant/merchant',
            'uploads'               => [
            /*
                    'images' => [
                        'count' => 10,
                        'type'  => 'image',
                    ],
                    'file' => [
                        'count' => 1,
                        'type'  => 'file',
                    ],
            */
            ],

            'casts'                 => [
            /*
                'images'    => 'array',
                'file'      => 'array',
            */
            ],

            'revision'              => [],
            'perPage'               => '20',
            'search'        => [
                'name'  => 'like',
                'status',
            ]
        ],

        'controller' => [
            'provider'  => 'Merchant',
            'package'   => 'Merchant',
            'module'    => 'Merchant',
        ],

        'workflow'      => [
            'points' => [
                'start' => 'draft',
                'end'   => ['delete'],
            ],
            'steps'  => [
                'draft'     => [
                    'label'  => "Merchant created",
                    'action' => ['setStatus', 'draft'],
                    'next'   => ['complete'],
                ],
                'complete'  => [
                    'label'  => "Merchant completed",
                    'status' => ['setStatus', 'complete'],
                    'next'   => ['verify'],
                ],
                'verify'    => [
                    'label'  => "Merchant verified",
                    'action' => ['setStatus', 'verify'],
                    'next'   => ['approve'],
                ],
                'approve'   => [
                    'label'  => "Merchant approved",
                    'action' => ['setStatus', 'approve'],
                    'next'   => ['publish'],
                ],
                'publish'   => [
                    'label'  => "Merchant published",
                    'action' => ['setStatus', 'publish'],
                    'next'   => ['unpublish', 'delete', 'target', 'archive'],
                ],
                'unpublish' => [
                    'label'  => "Merchant unpublished",
                    'action' => ['setStatus', 'unpublish'],
                    'next'   => ['publish', 'target', 'archive', 'delete'],
                ],
                'archive'   => [
                    'label'  => "Merchant archived",
                    'action' => ['setStatus', 'archive'],
                    'next'   => ['publish', 'delete'],
                ],
                'delete'    => [
                    'Label'  => "Merchant deleted",
                    'status' => ['delete', 'archive'],
                ],
            ],
        ],

    ],
];
