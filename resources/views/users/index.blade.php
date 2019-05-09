@extends('layouts.app')

@push('styles')

@endpush

@push('pre_scripts')
    <script>
        var listUsers = {!! $listUsers !!}
        console.log(listUsers)
    </script>
@endpush

@push('scripts')
    <script src="https://unpkg.com/vuejs-paginate@latest"></script>
@endpush

@section('content')
    <users-index-component></users-index-component>
@endsection
