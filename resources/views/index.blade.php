@extends('layouts.main')

@section('isi')

{{-- Main Banner --}}
@include('content.producthead')
{{-- End Main Banner --}}

<!-- Facilitate -->
<!-- End Facilitate -->

<!-- Product -->
@include('content.product')
<!-- End Product -->

<!-- Big Sale -->
@include('content.hightrate')
<!-- End Big Sale -->

@endsection