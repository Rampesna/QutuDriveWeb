<?php

namespace App\Http\Controllers\Api\User;

use App\Core\Controller;
use App\Core\HttpResponse;
use App\Http\Requests\Api\User\EDefterDosyalarController\GetByDonemIdRequest;
use App\Http\Requests\Api\User\EDefterDosyalarController\GetUsageRequest;
use App\Http\Requests\Api\User\EDefterDosyalarController\SingleELedgerUploadRequest;
use App\Http\Requests\Api\User\EDefterDosyalarController\MultipleELedgerUploadRequest;
use App\Interfaces\Eloquent\IEDefterDosyalarService;

class EDefterDosyalarController extends Controller
{
    use HttpResponse;

    /**
     * @var $eDefterDosyalarService
     */
    private $eDefterDosyalarService;

    public function __construct(IEDefterDosyalarService $eDefterDosyalarService)
    {
        $this->eDefterDosyalarService = $eDefterDosyalarService;
    }

    /**
     * @param GetByDonemIdRequest $request
     */
    public function getByDonemId(GetByDonemIdRequest $request)
    {
        $response = $this->eDefterDosyalarService->getByDonemId(
            $request->donemId
        );

        return $this->httpResponse(
            $response->getMessage(),
            $response->getStatusCode(),
            $response->getData(),
            $response->isSuccess()
        );
    }

    /**
     * @param GetUsageRequest $request
     */
    public function getUsage(GetUsageRequest $request)
    {
        $response = $this->eDefterDosyalarService->getUsage(
            $request->companyId
        );

        return $this->httpResponse(
            $response->getMessage(),
            $response->getStatusCode(),
            $response->getData(),
            $response->isSuccess()
        );
    }

    /**
     * @param SingleELedgerUploadRequest $request
     */
    public function singleELedgerUpload(SingleELedgerUploadRequest $request)
    {
        $response = $this->eDefterDosyalarService->singleELedgerUpload(
            $request->companyId,
            $request->user()->APIKEY,
            $request->file('file')
        );

        return $this->httpResponse(
            $response->getMessage(),
            $response->getStatusCode(),
            $response->getData(),
            $response->isSuccess()
        );
    }

    /**
     * @param MultipleELedgerUploadRequest $request
     */
    public function multipleELedgerUpload(MultipleELedgerUploadRequest $request)
    {
        $response = $this->eDefterDosyalarService->getUsage(
            $request->companyId
        );

        return $this->httpResponse(
            $response->getMessage(),
            $response->getStatusCode(),
            $response->getData(),
            $response->isSuccess()
        );
    }
}
