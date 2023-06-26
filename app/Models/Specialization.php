<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * Class Specialization
 *
 * @version August 2, 2021, 10:19 am UTC
 *
 * @property string $name
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @method static \Database\Factories\SpecializationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization query()
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Specialization whereUpdatedAt($value)
 * @mixin Model
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Doctor[] $doctors
 * @property-read int|null $doctors_count
 */
class Specialization extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'specializations';

    public $fillable = [
        'name',
    ];

    const ALL = 2;

    const ACTIVE = 1;

    const DEACTIVE = 0;
    const STATUS = [
        self::ALL => 'All',
        self::ACTIVE => 'Active',
        self::DEACTIVE => 'Deactive',
    ];

    const ICON = 'icon';

    protected $appends = ['icon'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|unique:specializations,name',
        'icon' => 'required|mimes:svg,jpeg,png,jpg',
    ];

    /**
     * @return BelongsToMany
     */
    public function doctors()
    {
        return $this->belongsToMany(Doctor::class);
    }

    /**
     * @return string
     */
    public function getIconAttribute(): string
    {
        /** @var Media $media */
        $media = $this->getMedia(self::ICON)->first();
        if (! empty($media)) {
            return $media->getFullUrl();
        }

        return asset('web/media/avatars/male.png');
    }
}
