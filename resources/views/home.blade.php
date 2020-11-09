@extends('layouts.base')

@section('content')


    <div class="container">
        <h2 class="text-center">Библиотека изображений</h2>

        <form id="js_form" class=" m-4 p-4 border" action="{{route('image_store')}}" method="post" enctype="multipart/form-data">
            @csrf

            @include('layouts._errors_block')

            <div class="row">
                <div class="col-3">
                    <label for="type" class="required">Тип</label>
                    <select id="type" name="type" required>
                        <option value="original">original image</option>
                        <option value="square">square image</option>
                        <option value="small">small image</option>
                        <option value="all">all three</option>
                    </select>
                </div>
                <div class="col-8">
                    <input id="js_image" type="hidden" name="image" value="154445">
                    <input id="js_div_image" type="file" class="required" value="Выберите изображение"
                           accept="{{$accept}}" required>
                </div>

            </div>

            <div class="row">
                <input type="submit" value="Сохранить" class="btn btn-primary m-3"/>
            </div>

        </form>
    </div>

    <style>
        .required:after {
            content: '*';
            color: #dd191d;
            margin-left: 5px;
        }
    </style>

    <script>

    </script>
@endsection
