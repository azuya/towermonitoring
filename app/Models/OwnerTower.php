<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;
use Spatie\Activitylog\Traits\LogsActivity;

class OwnerTower extends Model
{
    use HasRecordOwnerProperties;
    use LogsActivity;

    /**
     * @var string
     */
    protected $table = 'owner_towers';

    /**
     * @var string[]
     */
    protected $fillable = [
        'nama_pt',
        'alamat',
        'email',
        'telp',
        'pic',
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
        'nama_pt' => 'string',
        'alamat' => 'string',
        'email' => 'string',
        'telp' => 'string',
        'pic' => 'string',
        'is_active' => 'boolean',
        'added_by' => 'integer',
        'updated_by' => 'integer',
    ];

    protected static $logAttributes = ['id', 'nama_pt', 'alamat', 'email', 'telp', 'pic', 'is_active', 'created_at', 'updated_at', 'added_by', 'updated_by'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\hasMany
     */
    public function towers()
    {
        return $this->hasMany(Tower::class, 'owner_id', 'id');
    }
}
