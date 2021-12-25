
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Nastshopp &mdash; Korean Stuff</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    {{-- <meta http-equiv="refresh" content="2"> --}}

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@1.3.2/dist/select2-bootstrap4.min.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="{{ asset('user/fonts/icomoon/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('user/css/bootstrap.min.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('') }}css/magnific-popup.css">
    <link rel="stylesheet" href="{{ asset('') }}css/jquery-ui.css">  --}}
    <link rel="stylesheet" href="{{ asset('user/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('user/css/owl.theme.default.min.css') }}"> 

    
    
    
    
    
    
    <link rel="stylesheet" href="{{ asset('user/css/aos.css') }}">
    
    <link rel="stylesheet" href="{{ asset('user/css/style.css') }}">
    
  </head>
  <body>
  
    <div class="site-wrap">
    
    {{-- Navbar --}}
        @include('partials.navbar')
    {{-- End Navbar --}}

    @yield('isi')

    <!-- Footer -->
    <footer class="site-footer border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 mb-5 mb-lg-0">
            <div class="row">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigations</h3>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="#">Home</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="/product">Albums</a></li>
                </ul>
              </div>
              <div class="col-md-6 col-lg-4">
                <ul class="list-unstyled">
                  <li><a href="/faq">FAQ</a></li>
                </ul>
              </div>
            </div>
          </div>
              {{-- @if ($prod->count())
              <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <h3 class="footer-heading mb-4">Promo</h3>
                <a href="/product/{{ $prod[1]->id }}" class="block-6">
                  <img src="{{ asset('storage/' . $prod[1]->image1) }}" alt="Image placeholder" width="100px" class="img-fluid rounded mb-4">
                  <h3 class="font-weight-light  mb-0">Finding Your Perfect Album</h3>
                  <p>Promo from  Desember &mdash; 02, 2021</p>
                </a>
              </div>
              @endif --}}
          <div class="col-md-6 col-lg-3">
            <div class="block-5 mb-5">
              <h3 class="footer-heading mb-4">Contact Info</h3>
              <ul class="list-unstyled">
                <li class="address">Perumahan Ray Pendopo, Deli Serdang, Sumatera Utara</li>
                <li class="phone"><a href="https://api.whatsapp.com/send?phone=+628566219120&amp;text=Hi%20Admin%20Nastshopp,%20I%20want%20to%20ask%20...">+62 856 6219 120</a></li>
                <li class="email">nast.shopp@gmail.com</li>
              </ul>
            </div>

            {{-- <div class="block-7">
              <form action="#" method="post">
                <label for="email_subscribe" class="footer-heading">Subscribe</label>
                <div class="form-group">
                  <input type="text" class="form-control py-4" id="email_subscribe" placeholder="Email">
                  <input type="submit" class="btn btn-sm btn-primary" value="Send">
                </div>
              </form>
            </div> --}}
          </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false"></script><script>document.write(new Date().getFullYear());</script> Nastshopp
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>
    <!-- End Footer -->
  </div>

 @include('partials.script')

    
  </body>
</html>