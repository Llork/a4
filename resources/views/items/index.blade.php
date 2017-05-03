@extends('layouts.master')

@push('head')
@endpush

@section('title')
    Design15 - Synchronicities
@endsection

@section('content')
    <section id='items' class='container'>
        <h1 class="incidents-header">Synchronicities</h1>
        <p class="incidents-intro">From Wikipedia: “Synchronicity is a concept, first explained by analytical psychologist Carl Jung, which holds that events are ‘meaningful coincidences’ if they occur with no causal relationship yet seem to be meaningfully related.” This website documents some of my synchronicities.</p>
        <p class="incidents-intro">The synchronicities fall into two categories: those that involve a dictionary, and those that don't. When I quickly flip open a dictionary, place my finger on the page, then look down to see what my finger is pointing to, it often seems non-random. So in the descriptions below, when I say that I “landed on” a certain word, this is what I’m referring to.</p>
        <div class="spacer40">&#160;</div>
        @if(count($items) == 0)
            No data found.
        @else
            @foreach($items as $item)
                <div class='item'>
                    @if(isset($item->image_url))
                        <img class="incident-image" src='{{$item->image_url}}'>
                    @endif
                    <h3 class='incident-summary'>{{ $item->summary }}</h3>
                    <p class='incident-date'>{{ $item->incident_date }}</p>
                    <p>{{ $item->description }}</p>
                    <div class="spacer">&#160;</div>
                    <hr>
                </div>
            @endforeach
        @endif
    </section>
@endsection
