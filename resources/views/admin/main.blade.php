@extends('admin.layouts.index')

@section('section')
    
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <!-- Basic table card start -->
                <div class="card">
                    <div class="card-header">
                        <h5>Welcome Admin, {{ auth()->user()->name }}</h5>
                        <span>username  <code>{{ auth()->user()->username }}</code> email <code>{{ auth()->user()->email }}</code></span>
                    </div>
                </div>
                <!-- Basic table card end -->
            </div>
            <!-- Page-body end -->
        </div>
    </div>
    
@endsection