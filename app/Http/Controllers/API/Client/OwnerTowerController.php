<?php

namespace App\Http\Controllers\API\Client;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Client\BulkCreateOwnerTowerAPIRequest;
use App\Http\Requests\Client\BulkUpdateOwnerTowerAPIRequest;
use App\Http\Requests\Client\CreateOwnerTowerAPIRequest;
use App\Http\Requests\Client\UpdateOwnerTowerAPIRequest;
use App\Http\Resources\Client\OwnerTowerCollection;
use App\Http\Resources\Client\OwnerTowerResource;
use App\Repositories\OwnerTowerRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class OwnerTowerController extends AppBaseController
{
    /**
     * @var OwnerTowerRepository
     */
    private OwnerTowerRepository $ownerTowerRepository;

    /**
     * @param OwnerTowerRepository $ownerTowerRepository
     */
    public function __construct(OwnerTowerRepository $ownerTowerRepository)
    {
        $this->ownerTowerRepository = $ownerTowerRepository;
    }

    /**
     * OwnerTower's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return OwnerTowerCollection
     */
    public function index(Request $request): OwnerTowerCollection
    {
        $ownerTowers = $this->ownerTowerRepository->fetch($request);

        return new OwnerTowerCollection($ownerTowers);
    }

    /**
     * Create OwnerTower with given payload.
     *
     * @param CreateOwnerTowerAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OwnerTowerResource
     */
    public function store(CreateOwnerTowerAPIRequest $request): OwnerTowerResource
    {
        $input = $request->all();
        $ownerTower = $this->ownerTowerRepository->create($input);

        return new OwnerTowerResource($ownerTower);
    }

    /**
     * Get single OwnerTower record.
     *
     * @param int $id
     *
     * @return OwnerTowerResource
     */
    public function show(int $id): OwnerTowerResource
    {
        $ownerTower = $this->ownerTowerRepository->findOrFail($id);

        return new OwnerTowerResource($ownerTower);
    }

    /**
     * Update OwnerTower with given payload.
     *
     * @param UpdateOwnerTowerAPIRequest $request
     * @param int                        $id
     *
     * @throws ValidatorException
     *
     * @return OwnerTowerResource
     */
    public function update(UpdateOwnerTowerAPIRequest $request, int $id): OwnerTowerResource
    {
        $input = $request->all();
        $ownerTower = $this->ownerTowerRepository->update($input, $id);

        return new OwnerTowerResource($ownerTower);
    }

    /**
     * Delete given OwnerTower.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->ownerTowerRepository->delete($id);

        return $this->successResponse('OwnerTower deleted successfully.');
    }

    /**
     * Bulk create OwnerTower's.
     *
     * @param BulkCreateOwnerTowerAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OwnerTowerCollection
     */
    public function bulkStore(BulkCreateOwnerTowerAPIRequest $request): OwnerTowerCollection
    {
        $ownerTowers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $ownerTowerInput) {
            $ownerTowers[$key] = $this->ownerTowerRepository->create($ownerTowerInput);
        }

        return new OwnerTowerCollection($ownerTowers);
    }

    /**
     * Bulk update OwnerTower's data.
     *
     * @param BulkUpdateOwnerTowerAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return OwnerTowerCollection
     */
    public function bulkUpdate(BulkUpdateOwnerTowerAPIRequest $request): OwnerTowerCollection
    {
        $ownerTowers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $ownerTowerInput) {
            $ownerTowers[$key] = $this->ownerTowerRepository->update($ownerTowerInput, $ownerTowerInput['id']);
        }

        return new OwnerTowerCollection($ownerTowers);
    }
}
