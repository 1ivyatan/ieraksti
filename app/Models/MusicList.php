<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\MusicListTracks;
use App\Models\User;

class MusicList extends Model
{
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "creator_id");
    }

    public function musicListTracks(): HasMany {
        return $this->hasMany(MusicListTracks::class, "music_list_id");
    }
}
