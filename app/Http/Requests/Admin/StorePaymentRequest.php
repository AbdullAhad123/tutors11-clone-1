<?php
/**
 * File name: StorePaymentRequest.php
 * Last modified: 02/02/22, 9:14 PM
 * Author: NearCraft - https://codecanyon.net/user/nearcraft
 * Copyright (c) 2022
 */

namespace App\Http\Requests\Admin;


class StorePaymentRequest
{
/**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => ['required'],
            'plan_id' => ['required']
        ];
    }
}
