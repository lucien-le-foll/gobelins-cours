@extends('layout.master')

@section('content')
    <ul>
        @foreach($files as $file)
            @if($file != '.' && $file != '..')
                <li>
                    <a href="/files/{{ $folder }}/{{ $file }}/">{{ $file }}</a>
                </li>
            @endif
        @endforeach
    </ul>
@endsection