
    @extends('layout')

    @section('main')
        @foreach ($offices as $office)
            <article><a href="/offices/{{$office->name}}"> {{$office->name}}  </a></article>
        @endforeach
    @endsection
