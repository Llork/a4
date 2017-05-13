{{-- /resources/views/items/itemsfordictionary.blade.php --}}
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
        <h2 class='incidents-subheader'>Synchronicities which mention this dictionary:</h2>

        <div class='dictionary-box'>
            <h3 class='incident-summary'>{{ $dictionary->unique_nickname }}</h3>
            <p class='incident-date'>Year published: {{ $dictionary->year_published }}</p>
            <p class='dictionary-title'>{{ $dictionary->title }}</p>
        </div>

        <div class="spacer40">&#160;</div>
        @if(count($items) == 0)
            No synchronicities found which mention this dictionary. Rest assured that they exist, but I haven't yet added them to this website.  Stay tuned...
        @else
            @foreach($items as $item)
                <div class='item'>
                    @if(isset($item->image_url))
                        <img class="incident-image" src='{{$item->image_url}}'>
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
                        <a class='admin' href='/edit/{{ $item->id }}'><img src='/images/edit.png'></a><a class='admin' href='/delete/{{ $item->id }}'><img src='/images/delete.png'></a>
                    </div>
                    <div class="spacer10 clear">&#160;</div>
                    <hr>
                    <div class="spacer10 clear">&#160;</div>
                </div>
            @endforeach
        @endif
    </section>
@endsection
