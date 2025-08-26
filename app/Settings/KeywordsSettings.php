<?php
/**
 * File name: EmailSettings.php
 * Last modified: 18/05/21, 2:44 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2021
 */

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class KeywordsSettings extends Settings
{
    public array $keywords;
    public array $title;
    public array $description;

    public static function group(): string
    {
        return 'keywords';
    }
}
