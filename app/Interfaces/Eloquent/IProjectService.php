<?php

namespace App\Interfaces\Eloquent;

use App\Core\ServiceResponse;

interface IProjectService extends IEloquentService
{
    /**
     * @param int $pageIndex
     * @param int $pageSize
     * @param string $orderBy
     * @param string $orderType
     * @param int $userId
     * @param int|null $companyId
     * @param array|null $statusIds
     * @param string|null $keyword
     * @param array|null $with
     *
     * @return ServiceResponse
     */
    public function index(
        int     $pageIndex,
        int     $pageSize,
        string  $orderBy,
        string  $orderType,
        int     $userId,
        ?int    $companyId = null,
        ?array  $statusIds = null,
        ?string $keyword = null,
        ?array  $with = null
    ): ServiceResponse;

    /**
     * @param array $companyIds
     *
     * @return ServiceResponse
     */
    public function getByCompanyIds(
        array $companyIds
    ): ServiceResponse;

    /**
     * @param array $projectIds
     * @param array|null $statusIds
     * @param string|null $keyword
     *
     * @return ServiceResponse
     */
    public function getByProjectIds(
        array   $projectIds,
        ?array  $statusIds = [],
        ?string $keyword = null
    ): ServiceResponse;

    /**
     * @param int $projectId
     *
     * @return ServiceResponse
     */
    public function getSubtasksByProjectId(
        int $projectId
    ): ServiceResponse;

    /**
     * @param int $projectId
     *
     * @return ServiceResponse
     */
    public function getBoardsByProjectId(
        int $projectId
    ): ServiceResponse;

    /**
     * @param int $projectId
     * @param int $management
     *
     * @return ServiceResponse
     */
    public function getAllTasks(
        int $projectId,
        int $management
    ): ServiceResponse;

    /**
     * @param int $projectId
     *
     * @return ServiceResponse
     */
    public function getUsersByProjectId(
        int $projectId
    ): ServiceResponse;

    /**
     * @param int $projectId
     * @param array $userIds
     *
     * @return ServiceResponse
     */
    public function setUsersByProjectId(
        int   $projectId,
        array $userIds
    ): ServiceResponse;

    /**
     * @param array $projectIds
     *
     * @return ServiceResponse
     */
    public function getSubtasksByProjectIds(
        array $projectIds
    ): ServiceResponse;

    /**
     * @param int $userId
     * @param int $companyId
     * @param int $statusId
     * @param string $name
     * @param string|null $description
     * @param string|null $startDate
     * @param string|null $endDate
     *
     * @return ServiceResponse
     */
    public function create(
        int     $userId,
        int     $companyId,
        int     $statusId,
        string  $name,
        ?string $description = null,
        ?string $startDate = null,
        ?string $endDate = null
    ): ServiceResponse;

    /**
     * @param int $id
     * @param int $userId
     * @param int $statusId
     * @param string $name
     * @param string|null $description
     * @param string|null $startDate
     * @param string|null $endDate
     *
     * @return ServiceResponse
     */
    public function update(
        int     $id,
        int     $userId,
        int     $statusId,
        string  $name,
        ?string $description = null,
        ?string $startDate = null,
        ?string $endDate = null
    ): ServiceResponse;

    /**
     * @param int $id
     * @param int $userId
     *
     * @return ServiceResponse
     */
    public function deleteByUser(
        int $id,
        int $userId
    ): ServiceResponse;
}
