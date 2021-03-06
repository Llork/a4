{{-- /resources/views/items/new.blade.php --}}
@extends('layouts.master')

@section('title')
    Design15 - New Synchronicity
@endsection

@push('head')
@endpush


@section('content')
    <section id='items' class='container'>
        @if(Session::get('message') != null)
            <div class='flash-message'>{{ Session::get('message') }}</div>
        @endif
        <h1 class="incidents-header">Add a new synchronicity</h1>

        <form method='POST' action='/new'>

            @include('errors')

            {{ csrf_field() }}

            <small>* Required fields</small><br><br>

            <label for='summary'>* Summary:</label>
            <input class='wide' type='text' name='summary' id='summary' value='{{ old('summary', $now) }}'><br><br>

            <label for='incident_date'>* Date of Incident (date format yyyy-mm-dd):</label>
            <input type='text' name='incident_date' id='incident_date' value='{{ old('incident_date', '2017-01-01') }}'><br><br>

            <label for='dictionary_id'>Dictionary (choose 'none' if no dictionary used):</label>
            <select id='dictionary_id' name='dictionary_id'>
                @foreach($dictionaryList as $dictionary_id => $unique_nickname)
                    <option value='{{ $dictionary_id }}'>
                        {{ $unique_nickname }}
                    </option>
                @endforeach
            </select><br><br>

            <label for='dictionary_word1'>Main Dictionary Word, if any:</label>
            <input type='text' name='dictionary_word1' id='dictionary_word1' value='{{ old('dictionary_word1') }}'><br><br>

            <label for='dictionary_word2'>Second Dictionary Word, if any:</label>
            <input type='text' name='dictionary_word2' id='dictionary_word2' value='{{ old('dictionary_word2') }}'><br><br>

            <label for='dictionary_word3'>Third Dictionary Word, if any:</label>
            <input type='text' name='dictionary_word3' id='dictionary_word3' value='{{ old('dictionary_word3') }}'><br><br>

            <label for='description'>Description:</label>
            <textarea class="text-area" id='description' name='description' rows='5'>
                {{ old('description') }}
            </textarea><br><br>

            <label for='image_url'>Image URL:</label>
            <input class='wide'  type='text' name='image_url' id='image_url' value='{{ old('image_url') }}'><br><br>

            <label for='more_info_link'>'More information' Link:</label>
            <input class='wide' type='text' name='more_info_link' id='more_info_link' value='{{ old('more_info_link') }}'><br><br>

            <input type='submit' value='Add new Synchronicity'>
        </form>


    </section>
@endsection
