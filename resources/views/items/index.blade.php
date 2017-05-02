@extends('layouts.master')

@push('head')

@endpush

@section('title')
    Design15 - Synchronicities
@endsection

@section('content')
    <section id='items' class='container'>
        <h2>Synchronicities</h2>
        @if(count($items) == 0)
            No data found.
        @else
            @foreach($items as $item)
                <div class='item'>
                    <h3>{{ $item->summary }}</h3>
                    <p class="incident-date">{{ $item->incident_date }}</p>
                    <p>{{ $item->description }}</p>
                    <hr>
                </div>
            @endforeach
        @endif
    </section>
@endsection
