<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\MusicList;

class MusicListTracks extends Model
{
    public $table = 'music_list_tracks';

    public function musicList(): BelongsTo
    {
        return $this->belongsTo(MusicList::class, "music_list_id");
    }
}
