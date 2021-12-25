<!-- {{-- <section class="products" id="products">

    <h1 class="heading"> <span>products</span> </h1>

    <div class="box-container">
        @foreach ($product as $p)
        
            <div class="box" data-item="featured">
                <div class="icons">
                    <a href="/product/{{ $p->id }}" class="fas fa-shopping-cart"></a>
                </div>
                <div class="image">
                    <img src="{{ asset('storage/' . $p->image1) }}" alt="{{ $p->album }}">
                </div>
                <div class="content">
                    <h3>{{ $p->grup }}</h3>
                    <div class="price">
                        <div class="amount">Per Version : Rp.{{ $p->price_ver }}</div>
                    </div>
                    <div class="stars">
                        <i class="fas fa-star"></i>
                      <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                        <span>(50)</span>
                        isi stok produk -->
                    <!-- </div>
                </div>
            </div>
        @endforeach


    </div>

</section> --}} -->

@extends('layouts.main')

@section('isi')

<div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-12 order-2">

          <div class="row">
            <div class="col-md-12 mb-3">
              <div class="float-md-left mb-2"><h2 class="text-black h5">Products</h2></div>
              <div class="d-flex">
              </div>
            </div>
          </div>
          <div class="text-center ml-auto mb-4">
            {{ $product->links('pagination::bootstrap-4') }}
          </div>
          <div class="row mb-5 mt-3">

            @foreach ($product as $p)
            @if ($p->category == "Album")
            <div class="col-sm-8 col-lg-3 mb-4" data-aos="fade-up">
              <div class="block-4 text-center border">
                <figure class="block-4-image">
                  <a href="/product/{{ $p->id }}"><img src="{{ asset('storage/' . $p->image1) }}" alt="Image placeholder" class="img-fluid"></a>
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="/product/{{ $p->id }}"">{{ $p->grup }}</a></h3>
                  <p class="mb-0">Per version : Rp. {{ $p->price_ver }}</p>
                  {{-- <p class="text-primary font-weight-bold">$50</p> --}}
                </div>
              </div>
            </div>
            @else
            <div class="col-sm-8 col-lg-3 mb-4" data-aos="fade-up">
              <div class="block-4 text-center border">
                <figure class="block-4-image">
                  <a href="/album/{{ $p->id }}"><img src="{{ asset('storage/' . $p->image1) }}" alt="Image placeholder" class="img-fluid"></a>
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="/album/{{ $p->id }}">{{ $p->judul }}</a></h3>
                  <p class="mb-0">Price : Rp. {{ $p->price_ver }}</p>
                  {{-- <p class="text-primary font-weight-bold">$50</p> --}}
                </div>
              </div>
            </div>
            @endif
            @endforeach
          </div>
          
        </div>
    </div>
      
    </div>
  </div>
  @endsection