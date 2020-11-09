<?php

use App\Models\Image;

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'image_type' => [
        Image::IMAGE_TYPE_ORIGINAL => 'original image',
        Image::IMAGE_TYPE_SQUARE => 'square image',
        Image::IMAGE_TYPE_SMALL => 'small image',
        Image::IMAGE_TYPE_ALL => 'all image',
    ],

];
