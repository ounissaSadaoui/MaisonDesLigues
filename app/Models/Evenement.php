<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Evenement extends Model
{
    use HasFactory;

    protected $fillable = [
        'Evenement',
        'Nom',
        'Image',
        'user_id'

    ];
    protected $table = 'evenement';
    //liaison avec la table user
    public function user(): BelongsTo

    {

        return $this->belongsTo(User::class);

    }
}
