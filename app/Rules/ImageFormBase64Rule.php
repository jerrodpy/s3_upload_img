<?php

namespace App\Rules;

use App\Models\Image;
use finfo;
use Illuminate\Contracts\Validation\Rule;

/**
 * Class ImageFormBase64Rule
 * @package App\Rules
 */
class ImageFormBase64Rule implements Rule
{
    /**
     * @var
     */
    protected $base64;

    /**
     * @var finfo
     */
    private $finfo;

    /**
     * ImageFormBase64Rule constructor.
     *
     * @param string $base64
     */
    public function __construct(string $base64)
    {
        $this->base64 = $base64;
        $this->finfo = new finfo(FILEINFO_MIME);
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $typeMimeString = $this->finfo->buffer(base64_decode($value));
        $typeMime = (explode(';', $typeMimeString))[0] ?? '';

        return in_array($typeMime, Image::ALLOWED_TYPES, true);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'File type not allowed for upload';
    }
}
