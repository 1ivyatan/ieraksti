<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use App\Models\MusicList;
use App\Models\Music;

class MusicListTracks extends Model
{
    public $table = 'music_list_tracks';

    public $fillable = [
        "music_list_id",
        "music_id"
    ];

    public function musicList(): BelongsTo
    {
        return $this->belongsTo(MusicList::class, "music_list_id");
    }

    public function music(): BelongsTo
    {
        return $this->belongsTo(Music::class, "music_id");
    }
}
