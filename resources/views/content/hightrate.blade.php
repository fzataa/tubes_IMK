<div class="site-section block-8">
    <div class="container">
      <div class="row justify-content-center  mb-5">
        <div class="col-md-7 site-section-heading text-center pt-4">
          <h2>Best Seller!!</h2>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-md-12 col-lg-7 mb-5">
          <a href="/product/{{ $hightrate->id }}"><img src="{{ asset('storage/' . $hightrate->image1) }}" alt="Image placeholder" width="400px" class="img-fluid rounded"></a>
        </div>
        <div class="col-md-12 col-lg-5 text-center pl-md-5">
          <h2><a style="color:#F9A826" >Sold {{ $pieces }} Pieces</a></h2>
          <p class="post-meta mb-4">By <a>Admin</a> <span class="block-8-sep">&bullet;</span>{{ Carbon\Carbon::parse($hightrate->created_at)->diffForHumans() }}</p>
          <p>{{  Str::limit($hightrate->album) }}</p>
          <p><a href="/product/{{ $hightrate->id }}" class="btn btn-primary btn-sm">Shop Now</a></p>
        </div>
      </div>
    </div>
  </div>