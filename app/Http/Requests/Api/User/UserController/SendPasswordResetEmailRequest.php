<?php

namespace App\Http\Requests\Api\User\UserController;

use App\Core\BaseApiRequest;

class SendPasswordResetEmailRequest extends BaseApiRequest
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
            'email' => 'required|max:255|email:rfc,dns'
        ];
    }
}
