{{-- /resources/views/dictionaries/newdictionary.blade.php --}}
@extends('layouts.master')

@section('title')
    Design15 - New Dictionary
@endsection

@push('head')
@endpush


@section('content')
    <section id='items' class='container'>
        @if(Session::get('message') != null)
            <div class='flash-message'>{{ Session::get('message') }}</div>
        @endif
        <h1 class="incidents-header">Add a new dictionary</h1>

        <form method='POST' action='/new_dictionary'>

            {{ csrf_field() }}

            <label for='unique_nickname'>Nickname (required, can't already be in use):</label>
            <input type='text' name='unique_nickname' id='unique_nickname' value='{{ old('unique_nickname') }}'><br><br>

            <label for='title'>Title (required):</label>
            <input type='text' name='title' id='title' value='{{ old('title') }}'><br><br>

            <label for='year_published'>Year Published:</label>
            <input type='text' name='year_published' id='year_published' value='{{ old('year_published') }}'><br><br>

            <label for='year_acquired'>Year Acquired:</label>
            <input type='text' name='year_acquired' id='year_acquired' value='{{ old('year_acquired') }}'><br><br>

            <label for='cover_type'>Cover Type:</label>
            <input type='text' name='cover_type' id='cover_type' value='{{ old('cover_type') }}'><br><br>

            <label for='cover_color'>Cover Color:</label>
            <input type='text' name='cover_color' id='cover_color' value='{{ old('cover_color') }}'><br><br>

            <label for='pages'>Number of Pages:</label>
            <input type='text' name='pages' id='pages' value='{{ old('pages') }}'><br><br>

            <label for='columns_per_page'>Columns per Page:</label>
            <input type='text' name='columns_per_page' id='columns_per_page' value='{{ old('columns_per_page') }}'><br><br>

            <label for='location'>Location where I Keep It:</label>
            <input type='text' name='location' id='location' value='{{ old('location') }}'><br><br>

            <label for='comments'>Comments:</label>
            <textarea class="text-area" id='comments' name='comments' rows='5'>
            </textarea><br><br>

            <label for='image_url'>Image URL:</label>
            <input class='wide' type='text' name='image_url' id='image_url' value='{{ old('image_url') }}'><br><br>

            <label for='more_info_link'>'More information' Link:</label>
            <input class='wide' type='text' name='more_info_link' id='more_info_link' value='{{ old('more_info_link') }}'><br><br>

            {{-- Extracted error code to its own view file --}}
            @include('errors')

            <input type='submit' value='Add new Dictionary'>
        </form>


    </section>
@endsection
