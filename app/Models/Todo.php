<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Todo
 * @package App\Models
 * @version April 2, 2024, 5:41 pm UTC
 *
 * @property integer $user_id
 * @property string $title
 * @property integer $status
 */
class Todo extends Model
{
    use SoftDeletes;

    public $table = 'todos';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'user_id',
        'title',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required|max:255',
        'status' => 'required|numeric'
    ];

    public static $statusNames = [
        '未対応',
        '処理中',
        '処理済',
        '完了',
    ];

    public function getStatusNameAttribute(): string
    {
        return self::$statusNames[$this->status];
    }
    
}
