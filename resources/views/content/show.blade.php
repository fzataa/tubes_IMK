{{-- @extends('layouts.main')

@section('isi')

<div class="site-section">
    <div class="container">
        <a class="btn btn-primary btn-sm mb-4" href="/product">Back to All Products</a>
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('storage/' . $prod->image1) }}" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6">
          <h2 class="text-black">{{ $prod->grup }}</h2>
          <p>{{ $prod->album }}</p>
          <p class="mb-4">{!! $prod->desc !!}.</p>
          {{-- <p><strong class="text-primary h4">1 Versi : Rp.{{ $prod->price_ver }} @if ($prod->price_full) | Full Version : Rp.{{ $prod->price_full }} @endif</strong></p>
          <div class="mb-1 d-flex">
                <form action="/keranjang" method="post">
                    @csrf
                    <select name="pilihan" id="pilihan" class="form-control">
                        <option id="non">Choose Version</option>
                        <option id="vers">Per Version</option>
                        @if($prod->price_full)
                        <option id="full">Full Version</option>
                        @endif
                    </select>
                    <br>
                    <input type="hidden" value="{{ $prod->id }}" name="product_id">
                    <input type="hidden" value="{{ $prod->price_ver }}" id="harg_ver"> 
                    <input type="hidden" value="{{ $prod->price_full }}" id="harg_f"> 

                    @if ($prod->desc1)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc1" name="desc1" value="{{ $prod->desc1 }}">&nbsp;
                            <label for="desc1">{{ $prod->desc1 }}, Price = Rp.{{ $prod->price_ver }}</label>
                        </div>
                    @endif
                    @if ($prod->desc2)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc2" name="desc2" value="{{ $prod->desc2 }}">&nbsp;
                            <label for="desc2">{{ $prod->desc2 }}, Price = Rp.{{ $prod->price_ver }}</label>
                        </div>
                    @endif
                    @if ($prod->desc3)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc3" name="desc3" value="{{ $prod->desc3 }}">&nbsp;
                            <label for="desc3">{{ $prod->desc3 }}, Price = Rp.{{ $prod->price_ver }}</label> 
                        </div>
                    @endif
                    @if ($prod->desc4)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc4" name="desc4" value="{{ $prod->desc4 }}">&nbsp;
                            <label for="desc4">{{ $prod->desc4 }}, Price = Rp.{{ $prod->price_ver }}</label> 
                        </div>
                    @endif
                    @if ($prod->desc5)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc5" name="desc5" value="{{ $prod->desc5 }}">&nbsp;
                            <label for="desc5">{{ $prod->desc5 }}, Price = Rp.{{ $prod->price_ver }}</label>
                        </div>
                    @endif
                    @if ($prod->desc6)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc6" name="desc6" value="{{ $prod->desc6 }}">&nbsp;
                            <label for="desc6">{{ $prod->desc6 }}, Price = Rp.{{ $prod->price_ver }}</label>
                        </div>
                    @endif
                    @if ($prod->desc7)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc6" name="desc7" value="{{ $prod->desc7 }}">&nbsp;
                            <label for="desc7">{{ $prod->desc7 }}, Price = Rp.{{ $prod->price_ver }}</label>
                        </div>
                    @endif

                    @if ($prod->price_full)
                    <div id="price_ful" style="display:none;">
                        <input type="checkbox"  id="price_full" name="fullalb" value="{{ $prod->album }}">&nbsp;
                        <label for="price_full">Full Version <b style="color: black;">Include All The Available Versions</b> : Rp.{{ $prod->price_full }}</label>
                    </div>
                    @endif
            </div>
            <div class="mb-5">
                <b style="color: black;">Quantity for Each Version : </b>
                <div class="input-group mb-3" style="max-width: 120px;">
                <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="text" class="form-control text-center @error('jumlah') is-invalid @enderror" value="1" placeholder="" id="jumlah" name="jumlah" aria-label="Example text with button addon" aria-describedby="button-addon1">
                <div class="input-group-append">
                    <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
                <div class="invalid-feedback">
                    @error('jumlah')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            </div>
                    <input type="hidden" id="lain" name="lain" value="" required>
                    <button class="btn" type="submit"><a href="/product">Kembali</a></button>
                    <button class="btn btn-primary" id="pijit">Add To Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

  <div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Image Versions</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="nonloop-block-3 owl-carousel">
            @if ($prod->image2)
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="{{ asset('storage/' . $prod->image2) }}" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a>{{ $prod->desc2 }}</a></h3>
                </div>
              </div>
            </div>
            @endif            
            @if ($prod->image3)
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="{{ asset('storage/' . $prod->image3) }}" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a>{{ $prod->desc3 }}</a></h3>
                </div>
              </div>
            </div>
            @endif            
            @if ($prod->image4)
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="{{ asset('storage/' . $prod->image4) }}" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a>{{ $prod->desc4 }}</a></h3>
                </div>
              </div>
            </div>
            @endif            
            @if ($prod->image5)
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="{{ asset('storage/' . $prod->image5) }}" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a>{{ $prod->desc5 }}</a></h3>
                </div>
              </div>
            </div>
            @endif            
            @if ($prod->image7)
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="{{ asset('storage/' . $prod->image7) }}" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a>{{ $prod->desc7 }}</a></h3>
                </div>
              </div>
            </div>
            @endif            
          </div>
        </div>
      </div>
    </div>
  </div>


@endsection --}}

@extends('layouts.main')

@section('isi')

<div class="site-section">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
        </div>
        <div class="col-md-7">
                <a href="/product" class="text-decoration-none mt-5" style="color: #F9A826;"><i class="bi bi-chevron-double-left"></i></i> Back</a>
            <div class="p-3 p-lg-5 border mt-2">
                <h2 class="text-black">{{ $prod->album }}</h2>
                <p>{{ $prod->grup }}</p>
                <img src="{{ asset('storage/' . $prod->image1) }}" width="300" alt="">

                <div class="mb-3 border-bottom pb-4">
                    {!! $prod->desc !!}
                </div>
                <form action="/keranjang" method="post" class="mt-4">
                    @csrf
                    <select name="pilihan" id="pilihan" class="form-control">
                        <option id="non">Choose Version</option>
                        <option id="vers">Per Version</option>
                        @if($prod->price_full)
                        <option id="full">Full Version</option>
                        @endif
                    </select>
                    <br>
                    <input type="hidden" value="{{ $prod->id }}" name="product_id">
                    <input type="hidden" value="{{ $prod->price_ver }}" id="harg_ver"> 
                    <input type="hidden" value="{{ $prod->price_full }}" id="harg_f"> 

                    @if ($prod->desc1)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc1" name="desc1" value="{{ $prod->desc1 }}">&nbsp;
                            <label for="desc1">{{ $prod->desc1 }}, Price = Rp.{{ $prod->price_ver }}</label>
                        </div>
                    @endif
                    @if ($prod->desc2)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc2" name="desc2" value="{{ $prod->desc2 }}">&nbsp;
                            <label for="desc2">{{ $prod->desc2 }}, Price = Rp.{{ $prod->price_ver }}</label>
                        </div>
                    @endif
                    @if ($prod->desc3)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc3" name="desc3" value="{{ $prod->desc3 }}">&nbsp;
                            <label for="desc3">{{ $prod->desc3 }}, Price = Rp.{{ $prod->price_ver }}</label> 
                        </div>
                    @endif
                    @if ($prod->desc4)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc4" name="desc4" value="{{ $prod->desc4 }}">&nbsp;
                            <label for="desc4">{{ $prod->desc4 }}, Price = Rp.{{ $prod->price_ver }}</label> 
                        </div>
                    @endif
                    @if ($prod->desc5)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc5" name="desc5" value="{{ $prod->desc5 }}">&nbsp;
                            <label for="desc5">{{ $prod->desc5 }}, Price = Rp.{{ $prod->price_ver }}</label>
                        </div>
                    @endif
                    @if ($prod->desc6)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc6" name="desc6" value="{{ $prod->desc6 }}">&nbsp;
                            <label for="desc6">{{ $prod->desc6 }}, Price = Rp.{{ $prod->price_ver }}</label>
                        </div>
                    @endif
                    @if ($prod->desc7)
                        <div id="price_verr1" style="display: none;">
                            <input type="checkbox" id="desc6" name="desc7" value="{{ $prod->desc7 }}">&nbsp;
                            <label for="desc7">{{ $prod->desc7 }}, Price = Rp.{{ $prod->price_ver }}</label>
                        </div>
                    @endif

                    @if ($prod->price_full)
                    <div id="price_ful" style="display:none;">
                        <input type="checkbox"  id="price_full" name="fullalb" value="{{ $prod->album }}">&nbsp;
                        <label for="price_full">Full Version <b style="color: black;">Include All The Available Versions</b> : Rp.{{ $prod->price_full }}</label>
                    </div>
                    @endif
                    
                    <b class="text-photo d-inline" style="color: black;">Quantity for Each Version : </b>
                    
                        <div class="input-group mb-3 mt-3" style="max-width: 120px;">
                            <div class="input-group mb-3" style="max-width: 120px;">
                            <div class="input-group-prepend">
                            <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                            </div>
                            <input type="text" class="form-control text-center @error('jumlah') is-invalid @enderror" value="1" placeholder="" id="jumlah" name="jumlah" aria-label="Example text with button addon" aria-describedby="button-addon1">
                            <div class="input-group-append">
                                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                            </div>
                            <div class="invalid-feedback">
                                @error('jumlah')
                                    {{ $message }}
                                @enderror
                            </div>
                            </div>
                        </div>
                        
                    <input type="hidden" id="lain" name="lain" value="" required>
                    <a href="/product" class="text-decoration-none mt-5 mr-3" style="color: #F9A826;"><i class="bi bi-chevron-double-left"></i></i> Back</a>
                    <button class="btn btn-primary" id="pijit">Add To Cart</button>
                </form>
            </div>
        </div>
        @if (!$rev->count())

          <div class="col-md-5 ml-auto" style="margin-top: 35px">
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">No Reviews</span>
            </div>
          </div>
            
        @endif
        
        <div class="col-md-5 ml-auto" style="margin-top: 35px">
          @foreach ($rev as $r)
            <div class="p-4 border mb-3">
              <span class="d-block text-primary h6 text-uppercase">{{ $r->user->username }}</span>
              <p class="mb-0 text-black"><span class="fa fa-star"></span>&nbsp;<b>{{ $r->rate }}/100</b></p>
              <p class="mb-0">{{ $r->review }}</p>
              @if($r->image)
              <img src="{{ asset('storage/' . $r->image) }}" width="200px" alt="">
              @endif
            </div>
            @endforeach
          </div>

      </div>
    </div>
  </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Image Versions</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="nonloop-block-3 owl-carousel">
            @if ($prod->image2)
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="{{ asset('storage/' . $prod->image2) }}" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a>{{ $prod->desc2 }}</a></h3>
                </div>
              </div>
            </div>
            @endif            
            @if ($prod->image3)
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="{{ asset('storage/' . $prod->image3) }}" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a>{{ $prod->desc3 }}</a></h3>
                </div>
              </div>
            </div>
            @endif            
            @if ($prod->image4)
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="{{ asset('storage/' . $prod->image4) }}" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a>{{ $prod->desc4 }}</a></h3>
                </div>
              </div>
            </div>
            @endif            
            @if ($prod->image5)
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="{{ asset('storage/' . $prod->image5) }}" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a>{{ $prod->desc5 }}</a></h3>
                </div>
              </div>
            </div>
            @endif            
            @if ($prod->image7)
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="{{ asset('storage/' . $prod->image7) }}" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a>{{ $prod->desc7 }}</a></h3>
                </div>
              </div>
            </div>
            @endif            
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection



