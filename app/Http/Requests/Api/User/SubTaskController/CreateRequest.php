<?php

namespace App\Http\Requests\Api\User\SubTaskController;

use App\Core\BaseApiRequest;

class CreateRequest extends BaseApiRequest
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
            'taskId' => 'required|integer',
            'name' => 'required|string',
        ];
    }
}
