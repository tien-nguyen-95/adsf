@extends('layouts.admin')

@push('select2-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@section('content')
    <!-- Begin Page Content -->
    <div class="container">
        <h2 class="text-center">{{ $news->title }}</h2>
        <p>{!! $news->content !!}</p>
    </div>
@endsection
