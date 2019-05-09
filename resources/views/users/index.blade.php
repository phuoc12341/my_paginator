@extends('layouts.app')

@push('styles')

@endpush

@push('pre_scripts')
    <script>
        var listPaginatedUsers = {!! $listPaginatedUsers !!};
        var perPage = {!! $perPage !!};
        var total = {!! $total !!};
        var currentPage = {!! $currentPage !!};
    </script>
@endpush

@push('scripts')
    <script src="https://unpkg.com/vuejs-paginate@latest"></script>
@endpush

@section('content')
    <users-index-component></users-index-component>
@endsection
