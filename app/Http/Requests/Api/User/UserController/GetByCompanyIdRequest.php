<?php

namespace App\Http\Requests\Api\User\UserController;

use App\Core\BaseApiRequest;

class GetByCompanyIdRequest extends BaseApiRequest
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
            'companyId' => 'required|integer',
            'pageIndex' => 'required|integer',
            'pageSize' => 'required|integer',
            'keyword' => 'nullable',
        ];
    }
}