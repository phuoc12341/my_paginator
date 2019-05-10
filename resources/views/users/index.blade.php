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
    {{-- <users-index-component></users-index-component> --}}

      <h1>Hello App!</h1>
      <p>
        <!-- use router-link component for navigation. -->
        <!-- specify the link by passing the `to` prop. -->
        <!-- `<router-link>` will be rendered as an `<a>` tag by default -->
        <router-link to="/foo">Go to Foo</router-link>
        <router-link to="/bar">Go to Bar</router-link>
      </p>
      <!-- route outlet -->
      <!-- component matched by the route will render here -->
      <router-view></router-view>

@endsection
