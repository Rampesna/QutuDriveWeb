<?php

namespace App\Http\Requests\Api\User\UserController;

use App\Core\BaseApiRequest;

class UpdateRequest extends BaseApiRequest
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
            'id' => 'required|integer',
            'name' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'nullable|string',
            'password' => 'nullable|string',
            'status' => 'required|integer',
        ];
    }
}