<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<title>ABC - Advance Best Cheap</title>

<!-- Favicon -->
@foreach( App\Models\Backend\Fav::orderBy('id','asc')->get() as $fav )
    <link type="image/gif" rel="shortcut icon" href="{{ asset('images/fav/' . $fav->image) }}">
@endforeach 