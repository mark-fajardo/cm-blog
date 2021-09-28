@extends('app')
@section('body')
    <div id="header-component"></div>
    <div id="app"></div>

    @push('scripts')
        <script type="text/javascript" src="{{ mix('/js/recipe.js') }}" defer></script>
    @endpush
@endsection
