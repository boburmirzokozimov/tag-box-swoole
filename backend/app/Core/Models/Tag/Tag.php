<?php

namespace Core\Models\Tag;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'type',
        'status',
        'created_by'
    ];

    public static function new(
        string $name,
        string $description,
        string $type,
        int    $created_by,
    )
    {
        return Tag::create([
            'name' => $name,
            'description' => $description,
            'type' => $type,
            'created_by' => $created_by,
            'status' => TagStatusEnum::NEW
        ]);
    }
}
