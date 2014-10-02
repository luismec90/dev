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
            'client_id' => '293418254150119',
            'client_secret' => '061da568d4cd3242c34041d6aca9afe7',
            'scope' => array('email', 'read_friendlists', 'user_online_presence'),
        ),
        'Google' => array(
            'client_id' => '1012187077382-jn5504bi7bl6ja0ket7ikvjaa3tbe1o0.apps.googleusercontent.com',
            'client_secret' => 'eCoHVvWS-8XZdjCuN_kkiT9E',
            'scope' => array('userinfo_email', 'userinfo_profile'),
        ),

    )

);