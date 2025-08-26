<?php
/**
 * File name: FooterSettings.php
 * Last modified: 21/06/21, 11:22 AM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class HelpSettings extends Settings
{
    public string $title;
    public string $subtitle;
    public string $image_path;
    public string $contact_title;
    public string $contact_subtitle;
    public string $contact_image_path;
    public array $faqs;
    
    public static function group(): string
    {
        return 'help';
    }
}
