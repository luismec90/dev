<?php

return array(

    /*
    |--------------------------------------------------------------------------
    | oAuth Config
    |--------------------------------------------------------------------------
    */

    /**
     * Storage
     */
    'storage' => 'Session',

    /**
     * Consumers
     */
    'consumers' => array(

        /**
         * Facebook
         */
        'Facebook' => array(
            'client_id' => '658456867593106',
            'client_secret' => '10a2c6db6347bcbbc1ff2ade2e57ec83',
            'scope' => array('email', 'read_friendlists', 'user_online_presence'),
        ),
        'Google' => array(
            'client_id' => '79672988334-v3cldq0hu3v7b41jhokk9idij4jmnv5d.apps.googleusercontent.com',
            'client_secret' => 'YrmVP7YyjdXgwxPrSpyUvBRg',
            'scope' => array('userinfo_email', 'userinfo_profile'),
        ),

    )

);