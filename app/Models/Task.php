<?php

namespace App\Models;

use App\Traits\HasRecordOwnerProperties;
use Illuminate\Database\Eloquent\Model as Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Task extends Model
{
    use HasRecordOwnerProperties;
    use LogsActivity;

    /**
     * @var string
     */
    protected $table = 'tasks';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'tower_id',
        'tgl_maintenance',
        'user_id',
        'description',
        'attachments',
        'status',
        'date',
        'due_date',
        'completed_by',
        'completed_at',
        'is_active',
        'created_at',
        'updated_at',
        'updated_by',
        'added_by',
    ];

    /**
     * @var string[]
     */
    protected $casts = [
        'title' => 'string',
        'tower_id' => 'integer',
        'tgl_maintenance' => 'date',
        'user_id' => 'integer',
        'description' => 'string',
        'attachments' => 'string',
        'status' => 'integer',
        'date' => 'datetime',
        'due_date' => 'datetime',
        'completed_by' => 'integer',
        'completed_at' => 'datetime',
        'is_active' => 'boolean',
        'updated_by' => 'integer',
        'added_by' => 'integer',
    ];

    protected static $logAttributes = ['id', 'title', 'tower_id', 'tgl_maintenance', 'user_id', 'description', 'attachments', 'status', 'date', 'due_date', 'completed_by', 'completed_at', 'is_active', 'created_at', 'updated_at', 'updated_by', 'added_by'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function tower()
    {
        return $this->belongsTo(Tower::class, 'tower_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'completed_by', 'id');
    }
}
