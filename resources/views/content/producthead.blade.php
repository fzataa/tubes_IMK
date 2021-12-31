 <!-- Main Banner -->
 @if ($prodhead->count())

 <div class="site-blocks-cover" style="background-image: url({{ asset('storage/' . $prodhead[0]->image1) }});" data-aos="fade">
    <div class="container">
      <div class="row align-items-start align-items-md-center justify-content-end">
        <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
          <h1 class="mb-2">Finding Your Full Album</h1>
          <div class="intro-text text-center text-md-left">
            <p class="mb-4">{{ $prodhead[0]->grup }}</p>
            <p>
              <a href="/product/{{ $prodhead[0]->id }}" class="btn btn-sm btn-primary">Order Now</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
 @endif
  <!-- End Main Banner -->