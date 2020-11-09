@if ($errors->any())

    <div class="alert alert-secondary" role="alert">
        <div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
        <div class="alert-text">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif
@if (session()->has('message'))
    <div style="color: green">
        <p>{{ session()->get('message') }}</p>
    </div>
@endif
