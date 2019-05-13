@extends('layouts.app')

@push('styles')

@endpush

@push('pre_scripts')
    <script>
        var listPosts = {!! $listPosts !!};
        console.log(listPosts);
    </script>
@endpush

@push('scripts')

@endpush

@section('content')
    <post-app-component></post-app-component>
@endsection
