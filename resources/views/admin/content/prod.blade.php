@extends('admin.layouts.index')

@section('section')
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-lg-12 col-xl-6">
                        {{-- Right Side --}}
                        <div class="card">
                            <div class="card-header">
                                <a href="/products" class="btn btn-info mb-3">Back to All Products</a>
                                <form action="/products/{{ $products->id }}/edit" method="get" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="id" id="id" value="{{ $products->id }}">
                                    <button class="btn btn-primary mb-3"><span></span>Edit Product</button>
                                </form>
                                <h5 class="d-block">Images</h5>
                                @if ($products->category == "Album")
                                <span>{{ $products->grup }}</span>
                                @else
                                <span>{{ $products->judul }}</span>
                                @endif
                                <span>Category : {{ $products->category }}</span>
                            </div> 
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs md-tabs img-tabs b-none" role="tablist">
                                <li class="nav-item">
                                    <img style="width:100px; height:100px" src="{{ asset('storage/' . $products->image1) }}" class="img-flex mt-1">
                                    <p class="mt-2"> {{ $products->desc1 }}</p>
                                </li>
                                @if ($products->image2)
                                <li class="nav-item">
                                    <img style="width:100px; height:100px" src="{{ asset('storage/' . $products->image2) }}" class="img-flex mt-1">
                                    <p class="mt-2"> {{ $products->desc2 }}</p>
                                </li>
                                @endif
                                @if ($products->image3)
                                <li class="nav-item">
                                    <img style="width:100px; height:100px" src="{{ asset('storage/' . $products->image3) }}" class="img-flex mt-1">
                                    <p class="mt-2"> {{ $products->desc3 }}</p>
                                </li>
                                @endif
                                @if ($products->image4)
                                <li class="nav-item">
                                    <img style="width:100px; height:100px" src="{{ asset('storage/' . $products->image4) }}" class="img-flex mt-1">
                                    <p class="mt-2"> {{ $products->desc4 }}</p>
                                </li>
                                @endif
                                @if ($products->image5)
                                <li class="nav-item">
                                    <img style="width:100px; height:100px" src="{{ asset('storage/' . $products->image5) }}" class="img-flex mt-1">
                                    <p class="mt-2"> {{ $products->desc5 }}</p>
                                </li>
                                @endif
                                @if ($products->image6)
                                <li class="nav-item">
                                    <img style="width:100px; height:100px" src="{{ asset('storage/' . $products->image6) }}" class="img-flex mt-1">
                                    <p class=""> {{ $products->desc6 }}</p>
                                </li>
                                @endif
                                @if ($products->image7)
                                <li class="nav-item">
                                    <img style="width:100px; height:100px" src="{{ asset('storage/' . $products->image7) }}" class="img-flex mt-1">
                                    <p class=""> {{ $products->desc7 }}</p>
                                </li>
                                @endif
                            </ul>
                        </div>
                        <ol class="list-group list-group-numbered">
                            @if ($products->category == "Album")
                            <li class="list-group-item">Grup : {{ $products->grup }}</li>
                            <li class="list-group-item">Album : {{ $products->album }}</li>
                            <li class="list-group-item">Price Version : Rp.{{ $products->price_ver }}</li>
                            <li class="list-group-item">Price Full : Rp.{{ $products->price_full }}</li>
                            <li class="list-group-item">Rate : {{ $products->rate}}</li>
                            @else
                            <li class="list-group-item">Judul : {{ $products->judul }}</li>
                            <li class="list-group-item">Price : Rp.{{ $products->price_ver }}</li>
                            <li class="list-group-item">Rate : {{ $products->rate}}</li>
                            @endif
                        </ol>
                        <!-- Basic map end -->
                    </div>
                    <div class="col-lg-12 col-xl-6">
                        <!-- Markers map start -->
                        <div class="card">
                            <div class="card-header">
                                <h5>Description</h5>
                                <span>Deskripsi <code>Produk</code></span>
                            </div>
                            <div class="card-block">
                                <div id="markers-map" class="set-map">
                                    <ol class="list-group list-group-numbered">
                                        {!! $products->desc !!}
                                        {{-- <li class="list-group-item d-flex justify-content-between align-items-start bg-info">
                                          <div class="ms-2 me-auto">
                                            <div class="fw-bold">Description</div> 
                                            {!! $products->desc !!}
                                            </div>
                                        </li> --}}
                                      </ol>
                                </div>
                            </div>
                        </div>
                        <!-- Markers map end -->
                    </div>
                </div>
            </div>
            <!-- Page-body end -->
        </div>
    </div>
    
@endsection
