{{-- /resources/views/items/index.blade.php --}}
@extends('layouts.master')

@push('head')
@endpush

@section('title')
    Design15 - Synchronicities
@endsection

@section('content')
    <section id='items' class='container'>
        @if(Session::get('message') != null)
            <div class='flash-message'>{{ Session::get('message') }}</div>
        @endif
        <h1 class="incidents-header">Synchronicities</h1>
        <p class="incidents-intro">From <a target='_blank' href="https://en.wikipedia.org/wiki/Synchronicity">Wikipedia</a>: “Synchronicity is a concept, first explained by analytical psychologist Carl Jung, which holds that events are ‘meaningful coincidences’ if they occur with no causal relationship yet seem to be meaningfully related.” This website documents some of my synchronicities, more will be added as time permits.</p>
        <p class="incidents-intro">The synchronicities fall into two categories: those that involve a <a href="/dictionaries">dictionary</a>, and those that don't. When I quickly flip open a dictionary, place my finger on the page, then look down to see what my finger is pointing to, it often seems non-random. So in the descriptions below, when I say that I “landed on” a certain word, this is what I’m referring to.</p>
        <div class="spacer40">&#160;</div>
        @if(count($items) == 0)
            No data found.
        @else
            @foreach($items as $item)
                <div class='item'>
                    @if(isset($item->image_url))
                        <img alt='synchronicity' class="incident-image" src='{{$item->image_url}}'>
                    @endif
                    <h3 class='incident-summary'>{{ $item->summary }}</h3>
                    <p class='incident-date'>{{$item->incident_date . '.'}}
                    {{'dictionary: ' . $item->dictionary->unique_nickname }}
                    </p>
                    <p>{!! $item->description !!}</p>
                    @if(isset($item->more_info_link))
                        <p><span class='incident-more-info'>Related:</span> <a target='_blank' href='{{$item->more_info_link}}'>{{$item->more_info_link}}</a></p>
                    @endif
                    <div class="spacer clear">&#160;</div>
                    <div class='admin-container'>
                        <a class='admin' href='/edit/{{ $item->id }}'><img alt='edit synchronicity' src='/images/edit.png'></a><a class='admin' href='/delete/{{ $item->id }}'><img alt='delete synchronicity' src='/images/delete.png'></a>
                    </div>
                    <div class="spacer10 clear">&#160;</div>
                    <hr>
                    <div class="spacer10 clear">&#160;</div>
                </div>
            @endforeach
        @endif
    </section>
@endsection
