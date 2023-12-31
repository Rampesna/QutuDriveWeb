<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface IDirectoryService extends IEloquentService
{
    /**
     * @param int $companyId
     * @param int|null $parentId
     *
     * @return ServiceResponse
     */
    public function getByParentId(
        int  $companyId,
        ?int $parentId = null
    ): ServiceResponse;

    /**
     * @param int $companyId
     *
     * @return ServiceResponse
     */
    public function getTrashed(
        int $companyId
    ): ServiceResponse;

    /**
     * @param array $directoryIds
     *
     * @return ServiceResponse
     */
    public function recoverTrashed(
        array $directoryIds
    ): ServiceResponse;

    /**
     * @param int|null $parentId
     * @param int $companyId
     * @param string $name
     *
     * @return ServiceResponse
     */
    public function create(
        ?int   $parentId,
        int    $companyId,
        string $name
    ): ServiceResponse;

    /**
     * @param int $id
     * @param string $name
     *
     * @return ServiceResponse
     */
    public function rename(
        int    $id,
        string $name
    ): ServiceResponse;

    /**
     * @param int|null $parentId
     * @param array $directoryIds
     *
     * @return ServiceResponse
     */
    public function updateParentId(
        ?int  $parentId,
        array $directoryIds
    ): ServiceResponse;

    /**
     * @param array $directoryIds
     *
     * @return ServiceResponse
     */
    public function deleteBatch(
        array $directoryIds
    ): ServiceResponse;

    /**
     * @param array $directoryIds
     *
     * @return ServiceResponse
     */
    public function recover(
        array $directoryIds
    ): ServiceResponse;
}
