<?php
/**
 * File name: FooterSettings.php
 * Last modified: 21/06/21, 11:22 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class OurServicesSettings extends Settings
{
    public string $title;
    public string $subtitle;
    public string $image_url;
    public array $services;
    
    public static function group(): string
    {
        return 'our_services';
    }
}
