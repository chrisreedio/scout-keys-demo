<?php

namespace App\Models;

use ChrisReedIO\ScoutKeys\Contracts\SearchUser;
use ChrisReedIO\ScoutKeys\Traits\HasSearchKeys;
use ChrisReedIO\ScoutKeys\Traits\SearchFlush;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Laravel\Scout\Searchable;

class Person extends Model implements SearchUser
{
    use HasFactory, Searchable, SearchFlush, HasSearchKeys;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'birthday',
    ];

    protected function casts(): array
    {
        return [
            'birthday' => 'date',
        ];
    }

    protected static function boot(): void
    {
        parent::boot();

        static::creating(function ($person) {
            $person->unique_id = Str::ulid()->toBase58();
        });
    }

    public function toSearchableArray(): array
    {
        return [
            // 'id' => $this->id,
            'id' => $this->unique_id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'birthday' => $this->birthday,
            'created_at' => $this->created_at->timestamp,
        ];
    }
}
