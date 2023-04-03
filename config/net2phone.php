<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google Tracking variables
    |--------------------------------------------------------------------------
    |
    | This values will be used Google Analytics / Google Ads tracking scripts.
    */

    'google' => [

        'global_id' => env('GOOGLE_GLOBAL_ID', 'G-EWQ8HJHTRW'),

        'tracking_ids' => explode(',', env('GOOGLE_TRACKING_IDS') ?? ''),

        'user_data' => [

            'phone_prefix' => env('GOOGLE_USER_DATA_PHONE_PREFIX'),

            'country' => env('GOOGLE_USER_DATA_COUNTRY'),
        ],
    ],

    /**
     * --------------------------------------------------------------------------
     * Facebook Tracking variables
     * --------------------------------------------------------------------------
     */

    'facebook' => [

        'pixel_id' => env('FACEBOOK_PIXEL_ID'),

        'verification' => env('FACEBOOK_VERIFICATION'),
    ],

    /**
     * --------------------------------------------------------------------------
     * Linkedin Tracking variables
     * --------------------------------------------------------------------------
     */

    'linkedin' => [
        'pixel_id' => env('LINKEDIN_PIXEL_ID'),
    ],

    /*
    |--------------------------------------------------------------------------
    | International Site
    |--------------------------------------------------------------------------
    |
    | The international site that must be hidden in the footer.
    | Options: usa|canada|spain|brazil|argentina|colombia|mexico|peru
    */

    'hidden_international_site' => env('HIDDEN_INTERNATIONAL_SITE'),

    /*
    |--------------------------------------------------------------------------
    | Social Media
    |--------------------------------------------------------------------------
    |
    | This URL's will be used to show social media icons.
    */

    'social' => [

        'linkedin_url' => env('RRSS_LINKEDIN_URL'),

        'facebook_url' => env('RRSS_FACEBOOK_URL'),

        'twitter' => [
            'url' => env('RRSS_TWITTER_URL'),
            'site' => env('RRSS_TWITTER_SITE')
        ],

        'youtube_url' => env('RRSS_YOUTUBE_URL'),

        'instagram_url' => env('RRSS_INSTAGRAM_URL'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Contact Route
    |--------------------------------------------------------------------------
    |
    | This value will be used as a default contact route name for the components.
    */

    'default_contact_route_name' => env('DEFAULT_CONTACT_ROUTE_NAME', 'website.pages.contact'),

    /*
    |--------------------------------------------------------------------------
    | Hubspot
    |--------------------------------------------------------------------------
    |
    | This values will be used for hubspot scripts and forms.
    */
    'hubspot' => [

        'portal_id' => env('HUBSPOT_PORTAL_ID', '4423252'),

        'default_form_id' => env('HUBSPOT_DEFAULT_FORM_ID'),
    ],
];
