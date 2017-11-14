@extends('layout.master')

@section('content')
    <ul>
        @foreach($folders as $folder)
            @if($folder != '.' && $folder != '..')
                <li>
                    <a href="/files/{{ $folder }}">{{ $folder }}</a>
                </li>
            @endif
        @endforeach
    </ul>
@endsection