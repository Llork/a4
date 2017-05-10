{{-- /resources/views/dictionaries/editdictionary.blade.php --}}
@extends('layouts.master')

@section('title')
    Design15 - Edit Dictionary: {{ $dictionary->unique_nickname }}
@endsection

@push('head')
@endpush


@section('content')
    <section id='dictionaries' class='container'>
        @if(Session::get('message') != null)
            <div class='flash-message'>{{ Session::get('message') }}</div>
        @endif
        <h1 class="incidents-header">Edit Dictionary: {{ $dictionary->unique_nickname }}</h1>

        <form method='POST' action='/edit_dictionary'>

            {{ csrf_field() }}

            <!-- this hidden field is for passing a dictionary id along to the POST method: -->
            <input type='hidden' name='id' value='{{$dictionary->id}}'>

            <label for='unique_nickname'>Nickname (required, can't already be in use):</label>
            <input class='wide' type='text' name='unique_nickname' id='unique_nickname' value='{{ old('unique_nickname', $dictionary->unique_nickname) }}'><br><br>

            <label for='title'>Title (required):</label>
            <input class='wide' type='text' name='title' id='title' value='{{ old('title', $dictionary->title) }}'><br><br>

            <label for='year_published'>Year Published:</label>
            <input type='text' name='year_published' id='year_published' value='{{ old('year_published', $dictionary->year_published) }}'><br><br>

            <label for='year_acquired'>Year Acquired:</label>
            <input type='text' name='year_acquired' id='year_acquired' value='{{ old('year_acquired', $dictionary->year_acquired) }}'><br><br>

            <label for='cover_type'>Cover Type:</label>
            <input type='text' name='cover_type' id='cover_type' value='{{ old('cover_type', $dictionary->cover_type) }}'><br><br>

            <label for='cover_color'>Cover Color:</label>
            <input type='text' name='cover_color' id='cover_color' value='{{ old('cover_color', $dictionary->cover_color) }}'><br><br>

            <label for='pages'>Number of Pages:</label>
            <input type='text' name='pages' id='pages' value='{{ old('pages', $dictionary->pages) }}'><br><br>

            <label for='columns_per_page'>Columns per Page:</label>
            <input type='text' name='columns_per_page' id='columns_per_page' value='{{ old('columns_per_page', $dictionary->columns_per_page) }}'><br><br>

            <label for='location'>Location where I Keep It:</label>
            <input type='text' name='location' id='location' value='{{ old('location', $dictionary->location) }}'><br><br>

            <label for='comments'>Comments:</label>
            <textarea class="text-area" id='comments' name='comments' rows='5'>
                {{ old('comments', $dictionary->comments) }}
            </textarea><br><br>

            <label for='image_url'>Image URL:</label>
            <input class='wide' type='text' name='image_url' id='image_url' value='{{ old('image_url', $dictionary->image_url) }}'><br><br>

            <label for='more_info_link'>'More information' Link:</label>
            <input class='wide' type='text' name='more_info_link' id='more_info_link' value='{{ old('more_info_link', $dictionary->more_info_link) }}'><br><br>

            {{-- Extracted error code to its own view file --}}
            @include('errors')

            <input type='submit' value='Save Dictionary Changes'>
        </form>


    </section>
@endsection
