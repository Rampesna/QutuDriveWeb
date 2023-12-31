<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;
use Illuminate\Http\Request;

interface IFirmalarService
{
    /**
     * @param Request $request
     *
     * @return ServiceResponse
     */
    public function jqxGrid(
        Request $request
    ): ServiceResponse;

    /**
     * @return ServiceResponse
     */
    public function getAll(): ServiceResponse;

    /**
     * @param int $id
     *
     * @return ServiceResponse
     */
    public function getById(
        int $id
    ): ServiceResponse;

    /**
     * @param int $companyId
     *
     * @return ServiceResponse
     */
    public function getCompanyUsers(
        int $companyId
    ): ServiceResponse;

    /**
     * @param string $taxNumber
     * @param int|null $exceptId
     *
     * @return ServiceResponse
     */
    public function getByTaxNumber(
        string $taxNumber,
        int    $exceptId = null
    ): ServiceResponse;

    /**
     * @param string $email
     * @param int|null $exceptId
     *
     * @return ServiceResponse
     */
    public function getByEmail(
        string $email,
        int    $exceptId = null
    ): ServiceResponse;

    /**
     * @param string|null $title
     * @param string $taxNumber
     * @param string|null $name
     * @param string|null $surname
     * @param string|null $taxOffice
     * @param string|null $address
     * @param string|null $phone
     * @param string $email
     * @param string|null $dealerCode
     * @param int $eLedgerSourceType
     *
     * @return ServiceResponse
     */
    public function create(
        ?string $title,
        string  $taxNumber,
        ?string $name,
        ?string $surname,
        ?string $taxOffice,
        ?string $address,
        ?string $phone,
        ?string $email,
        ?string $dealerCode,
        int     $eLedgerSourceType
    ): ServiceResponse;

    /**
     * @param mixed $file
     *
     * @return ServiceResponse
     */
    public function createBatch(
        mixed $file
    ): ServiceResponse;

    /**
     * @param int $id
     * @param string $title
     * @param string $taxNumber
     * @param string|null $name
     * @param string|null $surname
     * @param string|null $taxOffice
     * @param string|null $address
     * @param string|null $phone
     * @param string $email
     * @param string|null $dealerCode
     * @param int|null $eLedgerSourceType
     *
     * @return ServiceResponse
     */
    public function update(
        int     $id,
        string  $title,
        string  $taxNumber,
        ?string $name,
        ?string $surname,
        ?string $taxOffice,
        ?string $address,
        ?string $phone,
        string  $email,
        ?string $dealerCode,
        ?int    $eLedgerSourceType
    ): ServiceResponse;

    /**
     * @param int $companyId
     * @param int $userId
     *
     * @return ServiceResponse
     */
    public function detachCompanyUser(
        int $companyId,
        int $userId
    ): ServiceResponse;

    /**
     * @param int $companyId
     *
     * @return ServiceResponse
     */
    public function delete(
        int $companyId
    ): ServiceResponse;
}
