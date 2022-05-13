<?php

namespace App\Repositories;

use App\Models\Tower;

class TowerRepository extends BaseRepository
{
    /**
    * @var  string[]
    */
    protected $fieldSearchable = [
        'id',
        'code',
        'owner_id',
        'latlng',
        'is_active',
        'created_at',
        'updated_at',
        'added_by',
        'updated_by',
    ];

    /**
    * @return  string[]
    */
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    /**
    * @return  string
    */
    public function model(): string
    {
        return Tower::class;
    }


    /**
     * @return  string[]
     */
    public function getAvailableRelations(): array
    {
       return ['addedByUser','updatedByUser','ownerTower''tasks'];
    }
}
