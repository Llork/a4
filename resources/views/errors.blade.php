{{-- This is based on foobooks from DWA 15: --}}

@if(count($errors) > 0)
    <div class='error-message'>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
