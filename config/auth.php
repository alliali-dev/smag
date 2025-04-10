<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Defaults
    |--------------------------------------------------------------------------
    |
    | This option controls the default authentication "guard" and password
    | reset options for your application. You may change these defaults
    | as required, but they're a perfect start for most applications.
    |
    */

    'defaults' => [
        'guard' => 'web',
        'password' => 'users',
    ],

    /*
    |--------------------------------------------------------------------------
    | Authentication Guards
    |--------------------------------------------------------------------------
    |
    | Next, you may define every authentication guard for your application.
    | Of course, a great default configuration has been defined for you
    | here which uses session storage and the Eloquent user provider.
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | Supported: "session"
    |
    */

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Providers
    |--------------------------------------------------------------------------
    |
    | All authentication drivers have a user provider. This defines how the
    | users are actually retrieved out of your database or other storage
    | mechanisms used by this application to persist your user's data.
    |
    | If you have multiple user tables or models you may configure multiple
    | sources which represent each model / table. These sources may then
    | be assigned to any extra authentication guards you have defined.
    |
    | Supported: "database", "eloquent"
    |
    */

    'providers' => [
        // 'users' => [
        //     'driver' => 'eloquent',
        //     'model' => App\Models\User::class,
        // ],

        'users' => [
            'driver' => 'database',
            'table' => 'users',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Resetting Password
    |--------------------------------------------------------------------------
    |
    | Vous pouvez spécifier plusieurs configurations de réinitialisation de mot de passe si vous avez 
    | plusieurs tables ou modèles d'utilisateurs dans l'application et que vous souhaitez disposer de 
    | paramètres de réinitialisation de mot de passe distincts en fonction des types d'utilisateurs.
    | Le délai d'expiration correspond au nombre de (minutes) pendant lesquelles chaque jeton de 
    | réinitialisation est considéré comme valide. Cette fonctionnalité de sécurité limite la durée de vie 
    | des jetons, les rendant ainsi moins susceptibles d'être devinés. 
    | Vous pouvez modifier ce paramètre si nécessaire.
    | Le paramètre de limitation correspond au nombre de (secondes) qu'un utilisateur doit attendre 
    | avant de générer davantage de jetons de réinitialisation de mot de passe.
    | Cela empêche l'utilisateur de générer rapidement un nombre important de jetons de réinitialisation
    | de mot de passe.
    |
    */

    'password' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 10800,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Délai d'expiration de la confirmation du mot de passe
    |--------------------------------------------------------------------------
    |
    |
    | Vous pouvez définir ici le délai d'expiration (en secondes) avant l'expiration de la confirmation 
    | du mot de passe et la demande de l'utilisateur de saisir à nouveau son mot de passe via l'écran de 
    | confirmation. 
    | Par défaut, le délai d'expiration est de trois heures.
    |
    */

    'password_timeout' => 3600,

];
