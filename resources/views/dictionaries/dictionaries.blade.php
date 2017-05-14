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
        <p class="incidents-intro">Here are some of the dictionaries that I own. When time permits, I'll add my other dictionaries to this website.</p>
        <div class="spacer40">&#160;</div>
        @if(count($dictionaries) == 0)
            No data found.
        @else
            @foreach($dictionaries as $dictionary)
                <div class='item'>
                    @if(isset($dictionary->image_url))
                        <img alt='dictionary' class="incident-image" src='{{$dictionary->image_url}}'>
                    @endif
                    <h3 class='incident-summary'>{{ $dictionary->unique_nickname }}</h3>
                    <p class='incident-date'>Year published: {{ $dictionary->year_published }}</p>
                    <p class="dictionary-title">{{ $dictionary->title }}</p>
                    @if(isset($dictionary->comments))
                        <p>{{ $dictionary->comments }}</p>
                    @endif
                    <div class="spacer40">&#160;</div>
                    <p><a class='non-nav' href='/itemsfordictionary/{{ $dictionary->id }}'>Synchroncities which mention this dictionary &raquo;</a></p>
                    <div class="spacer clear">&#160;</div>
                    <div class='admin-container'>
                        <a class='admin' href='/edit_dictionary/{{ $dictionary->id }}'><img alt='edit dictionary' src='/images/edit.png'></a><a class='admin' href='/delete_dictionary/{{ $dictionary->id }}'><img alt='delete dictionary' src='/images/delete.png'></a>
                    </div>
                    <div class="spacer10 clear">&#160;</div>
                    <hr>
                    <div class="spacer10 clear">&#160;</div>
                </div>
            @endforeach
        @endif
    </section>
@endsection
