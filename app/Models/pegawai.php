<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pegawai extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'telepon',
        'tanggal_lahir',
        'alamat',
        'foto',
    ];

    /**
     * Relasi dengan model User.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
