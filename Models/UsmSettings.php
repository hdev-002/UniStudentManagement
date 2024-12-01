<?php

namespace Modules\UniStudentManagement\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// use Modules\UniStudentManagement\Database\Factories\UsmSettingsFactory;

class UsmSettings extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = ['key', 'value'];

    public static function get($key, $default = null)
    {
        return self::where('key', $key)->value('value') ?? $default;
    }

}
