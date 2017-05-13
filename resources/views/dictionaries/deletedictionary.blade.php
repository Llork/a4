{{-- /resources/views/dictionaries/deletedictionary.blade.php --}}
@extends('layouts.master')

@section('title')
    Design15 - Delete dictionary: {{ $dictionary->unique_nickname }}
@endsection

@push('head')
@endpush


@section('content')
    <section id='items' class='container'>
        @if(Session::get('message') != null)
            <div class='flash-message'>{{ Session::get('message') }}</div>
        @endif
        <h1 class="incidents-header">Delete dictionary: '{{ $dictionary->unique_nickname }}'</h1>

        <form method='POST' action='/delete_dictionary'>

            {{ csrf_field() }}

            <!-- this hidden field is for passing the dictionary id along to the POST method: -->
            <input type='hidden' name='id' value='{{$dictionary->id}}'>

            <input type='hidden' name='id' value='{{ $dictionary->id }}'?>

            <h2>You would like to delete <em>'{{ $dictionary->unique_nickname }}'</em>?</h2>

            <input type='submit' value='YES. Delete this dictionary.'>
        </form>

    </section>
@endsection
