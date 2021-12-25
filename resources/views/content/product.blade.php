<!-- Main Banner -->
<div class="site-section block-3 site-blocks-2 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>High Rate</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="nonloop-block-3 owl-carousel">
            @php
              $d = 0;
            @endphp
            @foreach ($product_idd as $i)
            @php
              $item = App\Models\Product::where('id', $i)->first();
            @endphp
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="{{ asset('storage/' . $item->image1) }}" alt="Image placeholder" class="img-fluid">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="/product/{{ $item->id }}">{{ $item->grup }}</a></h3>
                  <p class="mb-0">{{  Str::limit($item->album, 44) }}</p>
                  <p class="text-primary font-weight-bold">Per Versi : Rp.{{ $item->price_ver }}</p>
                  <p class="text-primary font-weight-bold"><span class="fa fa-star"></span>&nbsp;{{ $product[$d] }}/100</p>
                  {{-- @if ($item->price_full)
                    <p class="mt-0">Full : Rp.{{ $item->price_full }}</p>
                  @endif --}}
                </div>
              </div>
            </div>
            @php
              $d += 1;
            @endphp
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
<!-- End Main Banner -->
