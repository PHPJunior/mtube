<?php

namespace App\Models\Channel;

use App\Models\Channel\Traits\VideoRelationship;
use App\Models\HasSchemalessAttributes;
use Cklmercer\ModelSettings\HasSettings;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Jcc\LaravelVote\Traits\Votable;
use Overtrue\LaravelLike\Traits\Likeable;
use CyrildeWit\EloquentViewable\InteractsWithViews;
use CyrildeWit\EloquentViewable\Contracts\Viewable;
use Cog\Contracts\Ban\Bannable as BannableContract;
use Cog\Laravel\Ban\Traits\Bannable;
use Spatie\SchemalessAttributes\SchemalessAttributesTrait;
use Illuminate\Database\Eloquent\Builder;

class Video extends Model implements Viewable, BannableContract
{
    use HasFactory, Likeable, Votable, VideoRelationship,
        InteractsWithViews, HasSettings, Bannable, SchemalessAttributesTrait;

    protected $fillable = [
        'tus_id', 'media_id', 'name', 'description', 'disk', 'path',
        'thumbnail_url', 'file_size', 'file_type', 'duration', 'progress', 'status',
        'streaming_url', 'type', 'extra_attributes'
    ];

    protected $schemalessAttributes = [
        'extra_attributes',
    ];

    public function scopeWithExtraAttributes(): Builder
    {
        return $this->extra_attributes->modelScope();
    }

    public function getVideoSourceAttribute()
    {
        return $this->type == 'upload' ? Storage::disk($this->disk)->url($this->streaming_url) : config('rtmp.host') . $this->streaming_url;
    }
}
