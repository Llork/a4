{{-- /resources/views/items/delete.blade.php --}}
@extends('layouts.master')

@section('title')
    Design15 - Delete synchronicity: {{ $item->summary }}
@endsection

@push('head')
@endpush


@section('content')
    <section id='items' class='container'>
        @if(Session::get('message') != null)
            <div class='flash-message'>{{ Session::get('message') }}</div>
        @endif
        <h1 class="incidents-header">Delete synchronicity: '{{ $item->summary }}'</h1>

        <form method='POST' action='/delete'>

            {{ csrf_field() }}

            <!-- this hidden field is for passing the item id along to the POST method: -->
            <input type='hidden' name='id' value='{{$item->id}}'>

            <input type='hidden' name='id' value='{{ $item->id }}'?>

            <h2>You would like to delete <em>'{{ $item->summary }}'</em>?</h2>

            <input type='submit' value='YES. Delete this synchronicity.'>
        </form>

    </section>
@endsection
