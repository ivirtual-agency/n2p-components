<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Analytics (Tracking) variables
    |--------------------------------------------------------------------------
    |
    | This values will be used for adding tracking scripts.
    */

    'google_tracking_ids' => explode(',', env('GOOGLE_TRACKING_IDS') ?? ''),

    'facebook_pixel_id' => env('FACEBOOK_PIXEL_ID'),

    'linkedin_pixel_id' => env('LINKEDIN_PIXEL_ID'),

    /**
     * --------------------------------------------------------------------------
     * Facebook Verification
     * --------------------------------------------------------------------------
     */

    'facebook_verification' => env('FACEBOOK_VERIFICATION'),
];
