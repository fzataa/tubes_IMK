<section class="review" id="review">

    <h1 class="heading"> <span>review</span> </h1>

    <div class="swiper review-slide">

        <div class="swiper-wrapper">

        @foreach ($review as $r )
        
            <div class="swiper-slide slide">
                <p>{{ $r->review }}</p>
                <div class="user">
                    @if ($r->image)
                        <img src="{{ $r->image }}" alt="">
                    @else 
                        <img src="/image/blank-profile-picture-g05817d649_640.png" alt="">
                    @endif
                    <div class="info">
                        <h3>{{ $r->name }}</h3>
                        <span>happy client</span>
                    </div>
                </div>
            </div>
            
        @endforeach

        </div>

    </div>

</section>