<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Tower extends Model
{
    use HasRecordOwnerProperties;
    use LogsActivity;

    /**
     * @var string
     */
    protected $table = 'towers';

    /**
     * @var string[]
     */
    protected $fillable = [
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
     * @var string[]
     */
    protected $casts = [
        'code' => 'string',
        'owner_id' => 'integer',
        'latlng' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected static $logAttributes = ['id', 'code', 'owner_id', 'latlng', 'is_active', 'created_at', 'updated_at', 'added_by', 'updated_by'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function ownerTower()
    {
        return $this->belongsTo(OwnerTower::class, 'owner_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function tasks()
    {
        return $this->hasMany(Task::class, 'tower_id', 'id');
    }
}
