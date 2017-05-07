@extends('layouts.master')

@push('head')
@endpush

@section('title')
    Design15 - Synchronicities
@endsection

@section('content')
    <section id='dictionaries' class='container'>
        @if(Session::get('message') != null)
            <div class='flash-message'>{{ Session::get('message') }}</div>
        @endif
        <h1 class="incidents-header">Dictionaries</h1>
        <p class="incidents-intro">Here is a partial listing of my dictionaries.</p>
        <p><a href="/">&laquo; Return to home page</a></p>
        <div class="spacer40">&#160;</div>
        @if(count($dictionaries) == 0)
            No data found.
        @else
            @foreach($dictionaries as $dictionary)
                <div class='item'>
                    @if(isset($dictionary->image_url))
                        <img class="incident-image" src='{{$dictionary->image_url}}'>
                    @endif
                    <h3 class='incident-summary'>{{ $dictionary->unique_nickname }}</h3>
                    <p class='incident-date'>Year published: {{ $dictionary->year_published }}</p>
                    <p class="dictionary-title">{{ $dictionary->title }}</p>
                    @if(isset($dictionary->comments))
                        <p>{{ $dictionary->comments }}</p>
                    @endif

                    <div class="spacer10">&#160;</div>
                    <hr>
                    <div class="spacer10">&#160;</div>
                </div>
            @endforeach
        @endif
    </section>
@endsection
