<?php
namespace App\Service;

use App\Models\Image as ImageModel;
use finfo;
use Illuminate\Support\Facades\Storage;
//use Intervention\Image\Image;

use Intervention\Image\Facades\Image;


/**
 * Class ImageConversionContext
 * @package App\Service
 */
class ImageConversion
{
    // директория в которую загружать изображения. без конечного / !!!
    public const PATH_DIRECTORY = 'image';

    private finfo $finfo;
    private string $extension;
    private string $imageBase64;
    private string $type;
    private array $arrPath = [];

    /**
     * ImageConversion constructor.
     *
     * @param string $imageBase64
     * @param string $type
     */
    public function __construct(string $imageBase64, string $type)
    {
        $this->imageBase64 = $imageBase64;
        $this->type = $type;
        $this->finfo = new finfo(FILEINFO_MIME);
        $this->defineExtension();
    }

    /**
     * Определяем расширение для файла
     */
    private function defineExtension(): void
    {
        $typeMimeString = $this->finfo->buffer(base64_decode($this->imageBase64));
        $typeMime = (explode(';', $typeMimeString))[0] ?? '';
        $this->extension = (explode('/', $typeMime))[1] ?? '';
    }

    /**
     * Формируем относительный путь для файла, с расширением
     *
     * @param string|null $type
     *
     * @return string
     */
    private function getFileName(string $type = null): string
    {
        return sprintf(
            '%s/%s.%s',
            self::PATH_DIRECTORY,
            md5($this->imageBase64.$type),
            $this->extension
        );
    }

    public function save()
    {
        $this->uploadImage();
        ImageModel::insert($this->arrPath);
    }

    public function uploadImage()
    {

        switch ($this->type) {
            case ImageModel::TYPE_ORIGINAL:

                $this->arrPath[] = $this->saveFile(base64_decode($this->imageBase64), ImageModel::TYPE_ORIGINAL);

                break;

            case ImageModel::TYPE_SQUARE:

                $img = Image::make(base64_decode($this->imageBase64));
                $image = $this->cropImageSquare($img, '#fff');
                $pictStream = $image->stream($this->extension);

                $this->arrPath[] = $this->saveFile($pictStream, ImageModel::TYPE_SQUARE);
                break;

            case ImageModel::TYPE_SMALL:

                $img = Image::make(base64_decode($this->imageBase64));

                $img->fit(
                    256,
                    256,
                    function ($constraint) {
                        $constraint->upsize();
                    }
                );

                $pictStream = $img->stream($this->extension);

                $this->arrPath[] = $this->saveFile($pictStream, ImageModel::TYPE_SMALL);

                break;
            case ImageModel::TYPE_ALL:
                $this->arrPath[] = $this->saveFile(base64_decode($this->imageBase64), ImageModel::TYPE_ORIGINAL);

                $img = Image::make(base64_decode($this->imageBase64));
                $image = $this->cropImageSquare($img, '#fff');
                $pictStream = $image->stream($this->extension);

                $this->arrPath[] = $this->saveFile($pictStream, ImageModel::TYPE_SQUARE);

                $img->fit(
                    256,
                    256,
                    function ($constraint) {
                        $constraint->upsize();
                    }
                );

                $pictStream = $img->stream($this->extension);

                $this->arrPath[] = $this->saveFile($pictStream, ImageModel::TYPE_SMALL);

                break;
        }
    }

    /**
     * Crop the given Intervention Image
     *
     * @param \Intervention\Image\Image $image
     * @param string                    $bg_color
     *
     * @return \Intervention\Image\Image
     */
    public function cropImageSquare($image, $bg_color = null): \Intervention\Image\Image
    {
        $image_width = $image->width();
        $image_height = $image->height();

        $side = ($image_width < $image_height) ? $image_height : $image_width;

        $background = Image::canvas($side, $side);
        if ($bg_color) {
            $background->fill($bg_color);
        }

        $background->insert($image, 'center');

        $image = $background;

        unset($background);

        return $image->fit($side, $side);
    }

    /**
     * @param $pictStream
     *
     * @return array
     */
    private function saveFile($pictStream, $type): array
    {
        if (Storage::disk('s3')->put($this->getFileName($type), $pictStream, 'public')) {
            return [
                'url' => $this->getFileName($type),
            ];
        }

        return [];
    }
}
