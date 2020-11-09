<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;


/**
 * Class Image
 * @package App\Models
 */
class Image extends Model
{
    const TABLE_NAME = 'images';

    public const TYPE_ORIGINAL = 'original';
    public const TYPE_SQUARE   = 'square';
    public const TYPE_SMALL    = 'small';
    public const TYPE_ALL      = 'all';

    public const IMAGE_TYPE = [
        self::TYPE_ORIGINAL => 'original image',
        self::TYPE_SQUARE => 'square image',
        self::TYPE_SMALL => 'small image',
        self::TYPE_ALL => 'all three',
    ];

    public const ALLOWED_TYPES = [
       'image/png',
       'image/jpeg',
       'image/gif',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'url',
        'created_at',
    ];


}
