<?php

namespace App\Http\Controllers;


use App\Http\Requests\ImageCreateRequest;
use App\Models\Image;
use App\Service\ImageConversion;

/**
 * Class ImageController
 * @package App\Http\Controllers
 */
class ImageController extends Controller
{

    /**
     *
     */
    public function index()
    {
        $accept = implode(',', Image::ALLOWED_TYPES);

        return view('home', compact('accept'));
    }

    /**
     * @param ImageCreateRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ImageCreateRequest $request)
    {
        $imageConversion = new ImageConversion($request->get('image'), $request->get('type'));
        $imageConversion->save();

        return redirect()->back()->with('message', 'Изображения успешно сохранены');
    }


}
