<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $title
 * @property string|null $image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Poster newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Poster newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Poster query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Poster whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Poster whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Poster whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Poster whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Poster whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Poster extends Model
{
    //
}
