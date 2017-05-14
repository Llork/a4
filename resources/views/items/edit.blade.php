{{-- /resources/views/items/edit.blade.php --}}
@extends('layouts.master')

@section('title')
    Design15 - Edit synchronicity: {{ $item->summary }}
@endsection

@push('head')
@endpush


@section('content')
    <section id='items' class='container'>
        @if(Session::get('message') != null)
            <div class='flash-message'>{{ Session::get('message') }}</div>
        @endif
        <h1 class="incidents-header">Edit synchronicity: {{ $item->summary }}</h1>

        <form method='POST' action='/edit'>

            @include('errors')

            {{ csrf_field() }}

            <small>* Required fields</small><br><br>

            <!-- this hidden field is for passing the item id along to the POST method: -->
            <input type='hidden' name='id' value='{{$item->id}}'>

            <label for='summary'>* Summary:</label>
            <input class='wide' type='text' name='summary' id='summary' value='{{ old('summary', $item->summary) }}'><br><br>

            <label for='incident_date'>* Date of Incident:</label>
            <input type='text' name='incident_date' id='incident_date' value='{{ old('incident_date', $item->incident_date) }}'><br><br>

            <label for='dictionary_id'>* Dictionary (choose 'none' if no dictionary used):</label>
            <select id='dictionary_id' name='dictionary_id'>
                <!-- Credit to DWA-15 lecture 13, part 3 minute 8 on how to pre-select the dropdown
                with current value for dictionary -->
                @foreach($dictionaryList as $dictionary_id => $unique_nickname)
                    <option value='{{ $dictionary_id }}' {{ ($item->dictionary_id == $dictionary_id) ? 'SELECTED' : '' }}>
                        {{ $unique_nickname }}
                    </option>
                @endforeach
            </select><br><br>

            <label for='dictionary_word1'>Main Dictionary Word, if any:</label>
            <input type='text' name='dictionary_word1' id='dictionary_word1' value='{{ old('dictionary_word1', $item->dictionary_word1) }}'><br><br>

            <label for='dictionary_word2'>Second Dictionary Word, if any:</label>
            <input type='text' name='dictionary_word2' id='dictionary_word2' value='{{ old('dictionary_word2', $item->dictionary_word2) }}'><br><br>

            <label for='dictionary_word3'>Third Dictionary Word, if any:</label>
            <input type='text' name='dictionary_word3' id='dictionary_word3' value='{{ old('dictionary_word3', $item->dictionary_word3) }}'><br><br>

            <label for='description'>Description:</label>
            <!-- textarea form fields have no 'value' parameter for some odd reason. That's per the html specifications we all use. -->
            <textarea class="text-area" id='description' name='description' rows='5'>
                    {{ old('description', $item->description) }}
            </textarea><br><br>

            <label for='image_url'>Image URL:</label>
            <input class='wide' type='text' name='image_url' id='image_url' value='{{ old('image_url', $item->image_url) }}'><br><br>

            <label for='more_info_link'>'More information' Link:</label>
            <input class='wide' type='text' name='more_info_link' id='more_info_link' value='{{ old('more_info_link', $item->more_info_link) }}'><br><br>

            <label for='topics[]'>Topics:</label><br>
            @foreach($topicsForCheckboxes as $id => $topic_name)
                <input
                    type='checkbox'
                    value='{{ $id }}'
                    name='topics[]'
                    {{ (in_array($topic_name, $topicsForExistingItem)) ? 'CHECKED' : '' }}
                >
                {{ $topic_name }} <br>
            @endforeach

            <br><br>
            <input type='submit' value='Save Synchronicity Changes'>
        </form>


    </section>
@endsection
