<?php

namespace App\Http\Requests\Api\User\SyncDosyaHareketController;

use App\Core\BaseApiRequest;

class DownloadSingleFileRequest extends BaseApiRequest
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
            'fileId' => 'required|string',
        ];
    }
}
