<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'estimated_duration',
        'value',
        'provider_id',
        'developer_id',
    ];

    /**
     * Relationship with providers.
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class);
    }

    /**
     * Relationship with developers.
     */
    public function developer()
    {
        return $this->belongsTo(Developer::class);
    }
}
