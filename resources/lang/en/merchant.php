<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Language files for merchant in merchant package
    |--------------------------------------------------------------------------
    |
    | The following language lines are  for  merchant module in merchant package
    | and it is used by the template/view files in this module
    |
    */

    /**
     * Singlular and plural name of the module
     */
    'name'          => 'Merchant',
    'names'         => 'Merchants',
    
    /**
     * Singlular and plural name of the module
     */
    'title'         => [
        'main'  => 'Merchants',
        'sub'   => 'Merchants',
        'list'  => 'List of merchants',
        'edit'  => 'Edit merchant',
        'create'    => 'Create new merchant'
    ],

    /**
     * Options for select/radio/check.
     */
    'options'       => [
            
    ],

    /**
     * Placeholder for inputs
     */
    'placeholder'   => [
        'id'                         => '',
        'merchant_name'              => 'Please Enter Name Merchant',
        'username'                   => 'Please Enter Username',
        'password'                   => 'Please Enter Password',
        'email'                      => 'Please Enter Email',
        'address'                    => 'Please Enter Address',
        'information'                => 'Please Enter Information',
        'img'                        => 'Please Enter Image',
        'phone'                      => 'Please Enter Phone',
    ],

    /**
     * Labels for inputs.
     */
    'label'         => [
        'id'                         => '',
        'merchant_name'              => 'Name',
        'username'                   => 'Username',
        'password'                   => 'Password',
        'email'                      => 'Email',
        'address'                    => 'Address',
        'information'                => 'Information',
        'img'                        => 'Image',
        'phone'                      => 'Phone',
    ],

    /**
     * Columns array for show hide checkbox.
     */
    'cloumns'         => [
        'merchant_name'              => ['name' => 'Name', 'data-column' => 1, 'checked'],
        'username'                   => ['name' => 'Username', 'data-column' => 2, 'checked'],
        'password'                   => ['name' => 'Password', 'data-column' => 3, 'checked'],
        'email'                      => ['name' => 'Email', 'data-column' => 4, 'checked'],
        'address'                    => ['name' => 'Address', 'data-column' => 5, 'checked'],
        'information'                => ['name' => 'Information', 'data-column' => 6, 'checked'],
        'img'                        => ['name' => 'Image', 'data-column' => 7, 'checked'],
        'phone'                      => ['name' => 'Phone', 'data-column' => 8, 'checked'],
    ],

    /**
     * Tab labels
     */
    'tab'           => [
        'name'  => 'Merchants',
    ],

    /**
     * Texts  for the module
     */
    'text'          => [
        'preview' => 'Click on the below list for preview',
    ],
];
