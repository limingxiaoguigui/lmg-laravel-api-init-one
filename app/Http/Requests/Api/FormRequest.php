<?php
/*
 * @Description:
 * @Author: LMG
 * @Date: 2020-01-03 22:20:56
 * @LastEditors  : LMG
 * @LastEditTime : 2020-01-03 22:24:53
 */

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;

class FormRequest extends BaseFormRequest
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
}