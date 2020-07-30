<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class MovieModel
 *
 * @property int    $id_user
 * @property string $name
 * @property string $gender
 * @property string $premiere_date
 * @property string $descripcion
 * @property User   $user
 *
 * @package App
 */
class MovieModel extends Model
{
    protected $table = 'movies';
    
    protected $primaryKey = 'id';
    
    protected $fillable
        = [
            'id_user',
            'name',
            'gender',
            'premiere_date',
            'descripcion',
        ];
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'id');
    }
}
