<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Admin\BulkCreateTowerAPIRequest;
use App\Http\Requests\Admin\BulkUpdateTowerAPIRequest;
use App\Http\Requests\Admin\CreateTowerAPIRequest;
use App\Http\Requests\Admin\UpdateTowerAPIRequest;
use App\Http\Resources\Admin\TowerCollection;
use App\Http\Resources\Admin\TowerResource;
use App\Repositories\TowerRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Prettus\Validator\Exceptions\ValidatorException;

class TowerController extends AppBaseController
{
    /**
     * @var TowerRepository
     */
    private TowerRepository $towerRepository;

    /**
     * @param TowerRepository $towerRepository
     */
    public function __construct(TowerRepository $towerRepository)
    {
        $this->towerRepository = $towerRepository;
    }

    /**
     * Tower's Listing API.
     * Limit Param: limit
     * Skip Param: skip.
     *
     * @param Request $request
     *
     * @return TowerCollection
     */
    public function index(Request $request): TowerCollection
    {
        $towers = $this->towerRepository->fetch($request);

        return new TowerCollection($towers);
    }

    /**
     * Create Tower with given payload.
     *
     * @param CreateTowerAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return TowerResource
     */
    public function store(CreateTowerAPIRequest $request): TowerResource
    {
        $input = $request->all();
        $tower = $this->towerRepository->create($input);

        return new TowerResource($tower);
    }

    /**
     * Get single Tower record.
     *
     * @param int $id
     *
     * @return TowerResource
     */
    public function show(int $id): TowerResource
    {
        $tower = $this->towerRepository->findOrFail($id);

        return new TowerResource($tower);
    }

    /**
     * Update Tower with given payload.
     *
     * @param UpdateTowerAPIRequest $request
     * @param int                   $id
     *
     * @throws ValidatorException
     *
     * @return TowerResource
     */
    public function update(UpdateTowerAPIRequest $request, int $id): TowerResource
    {
        $input = $request->all();
        $tower = $this->towerRepository->update($input, $id);

        return new TowerResource($tower);
    }

    /**
     * Delete given Tower.
     *
     * @param int $id
     *
     * @throws Exception
     *
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $this->towerRepository->delete($id);

        return $this->successResponse('Tower deleted successfully.');
    }

    /**
     * Bulk create Tower's.
     *
     * @param BulkCreateTowerAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return TowerCollection
     */
    public function bulkStore(BulkCreateTowerAPIRequest $request): TowerCollection
    {
        $towers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $towerInput) {
            $towers[$key] = $this->towerRepository->create($towerInput);
        }

        return new TowerCollection($towers);
    }

    /**
     * Bulk update Tower's data.
     *
     * @param BulkUpdateTowerAPIRequest $request
     *
     * @throws ValidatorException
     *
     * @return TowerCollection
     */
    public function bulkUpdate(BulkUpdateTowerAPIRequest $request): TowerCollection
    {
        $towers = collect();

        $input = $request->get('data');
        foreach ($input as $key => $towerInput) {
            $towers[$key] = $this->towerRepository->update($towerInput, $towerInput['id']);
        }

        return new TowerCollection($towers);
    }
}
