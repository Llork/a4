{{-- /resources/views/items/new.blade.php --}}
@extends('layouts.master')

@section('title')
    Design15 - New Synchronicity
@endsection

@push('head')
@endpush


@section('content')
    <section id='items' class='container'>
        <h1 class="incidents-header">Add a new synchronicity</h1>

        <form method='POST' action='/new'>
            {{ csrf_field() }}

            <small>* Required fields</small><br><br>

            <label for='summary'>* Summary</label>
            <input type='text' name='summary' id='summary' value='{{ old('summary', 'Random, or Not?') }}'><br><br>

            <label for='incident_date'>* Date of Incident</label>
            <input type='text' name='incident_date' id='incident_date' value='{{ old('incident_date', '2017-01-01') }}'><br><br>

            <label for='dictionary_id'>Dictionary, if any:</label>
            <select id='dictionary_id' name='dictionary_id'>
                <option value='0'>Choose</option>
                <!-- see lecture 13, part 3 minute 9 re pre-filling the dropdown on the 'EDIT' page
                (not this 'NEW' page) with whatever the current value for dictionary is
                -->
                @foreach($dictionaryList as $dictionary_id => $unique_nickname)
                    <option value='{{ $dictionary_id }}'>
                        {{ $unique_nickname }}
                    </option>
                @endforeach
            </select><br><br>

            <input type='submit' value='Add new item'>
        </form>
    </section>
@endsection
