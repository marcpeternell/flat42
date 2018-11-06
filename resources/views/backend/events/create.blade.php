@extends('backend.layouts.master')

@section('pageTitle', 'Events')

@section('content')
    <div>

        <div>
            <a href="{{ route('event.index') }}">back</a>
        </div>

        <form action="{{ route('event.store') }}" method="post">
            @csrf
            <div>
                <label for="title">title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div>
                <label for="body">Schreib etwas nettes</label>
                <textarea name="body" id="body" placeholder="Poste etwas neues">{{ old('body') }}</textarea>
            </div>

            <div>
                <label for="date">Wann findet es statt</label>
                <input type="date" id="date" name="date" {{--value="{{ old('date', date('yyyy-MM-dd')) }}--}}>
            </div>

            <div>
                <button type="submit">Event planen</button>
            </div>

        </form>


        @include('backend.layouts.errors')

    </div>
@endsection
