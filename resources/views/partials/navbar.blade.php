
<!-- Header + Navbar -->
<header class="site-navbar" role="banner">
    <div class="site-navbar-top">
      <div class="container">
        <div class="row align-items-center">

          <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
            <form action="/search" class="site-block-top-search" method="post">
              @csrf
              <button type="submit" style="border:0; background-color:transparent;" class="icon icon-search2"></button>
              <input type="text" class="form-control border-0" placeholder="Search Product" name="keyword" value="">
            </form>
          </div>

          <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
            <div class="site-logo">
              <a href="/" class="js-logo-clone bg-primary text-light border-light">Nastshopp</a>
            </div>
          </div>

          <div class="col-6 col-md-4 order-3 order-md-3 text-right">
            <div class="site-top-icons">
              <ul>
                @auth
                  @if (auth()->user()->tipe == '1')
                    <nav class="site-navigation text-right text-md-justify" role="navigation">
                      <div class="container">
                        <ul class="site-menu js-clone-nav d-none d-md-block">
                          <li class="has-children">
                            <a href="">Admin</a>
                            <ul class="dropdown">
                              <li><a><?= auth()->user()->email ?></a></li>
                              <li><a href="/dashboard">Dashboard</a></li>
                              <li>
                                <form class="d-inline mt-5" action="/logout" method="post">
                                    @csrf
                                    <button class="btn border-0 py-1 ml-2 text-dark" style="background-color: transparent; text-transform: capitalize;" type="submit">Logout <i class="bi bi-box-arrow-right"></i></button>
                                </form>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </nav>
                  @else
                      <li>
                      <nav class="site-navigation text-right text-md-justify" role="navigation">
                      <div class="container">
                        <ul class="site-menu js-clone-nav d-none d-md-block">
                          <li class="has-children">
                            {{-- <a class="icon icon-person"></a> --}}
                            <a><span class="icon icon-person mt-1" style="position:relative; top:2px;"></span>&nbsp;{{ auth()->user()->username }}</a>
                            <ul class="dropdown">
                                <li><a href="/profile/{{ auth()->user()->id }}">Profil</a></li>
                                <li><a href="/transactio/upload-proofment">Transaction</a></li>
                              
                                <li>
                                  <form class="d-inline mt-5" action="/logout" method="post">
                                      @csrf
                                      <button onclick="return confirm('Are You Sure Want To Log Out ?')" class="btn border-0 py-1 ml-2 text-dark" style="background-color: transparent; text-transform: capitalize;" type="submit" id="btnlogut">Logout <i class="bi bi-box-arrow-right"></i></button>
                                  </form>
                                </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                    </nav>
                      </li>
                      <!-- <li><a href="#"><span class="icon icon-person"></span></a></li> -->
                      <li>
                        <a href="/keranjang" class="site-cart ">
                          <span class="icon icon-shopping_cart"></span>
                          @if (@auth)
                          <span class="count">{{ $cart }}</span>
                          @endif
                        </a>
                      </li> 
                      <li>
                      </li>
                  @endif
                @else
                    <li><a href="/login"><span class="bi bi-box-arrow-in-right"></span> Login</a></li>
                @endauth
                <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
              </ul>
            </div> 
          </div>

        </div>
      </div>
    </div> 
    {{-- Navbar --}}
    <nav class="site-navigation text-right text-md-center" role="navigation">
      <div class="container">
        <ul class="site-menu js-clone-nav d-none d-md-block">
          {{-- <li class="has-children active">
            <a href="index.html">Home</a>
            <ul class="dropdown">
              <li><a href="#">Menu One</a></li>
              <li><a href="#">Menu Two</a></li>
              <li><a href="#">Menu Three</a></li>
              <li class="has-children">
                <a href="#">Sub Menu</a>
                <ul class="dropdown">
                  <li><a href="#">Menu One</a></li>
                  <li><a href="#">Menu Two</a></li>
                  <li><a href="#">Menu Three</a></li>
                </ul>
              </li>
            </ul>
          </li>
          <li class="has-children">
            <a href="about.html">About</a>
            <ul class="dropdown">
              <li><a href="#">Menu One</a></li>
              <li><a href="#">Menu Two</a></li>
              <li><a href="#">Menu Three</a></li>
            </ul>
          </li> --}}
          <li class="{{ Request::is('/')? 'active' : '' }}"><a href="/">Home</a></li>
          @if (Request::is('transactio*') || Request::is('invoice*') || Request::is('transacti'))
            <li class="{{ Request::is('transactio/upload-proofment*')? 'active' : '' }}"><a href="/transactio/upload-proofment">Payment</a></li>
            <li class="{{ Request::is('transactio/waiting-for-verification*')? 'active' : '' }}"><a href="/transactio/waiting-for-verification">Waiting For Verification</a></li>
            <li class="{{ Request::is('transactio/on-shipping*')? 'active' : '' }}"><a href="/transactio/on-shipping">On Shipping</a></li>
            <li class="{{ Request::is('transactio/arrived*')? 'active' : '' }}"><a href="/transactio/arrived">Arrived</a></li>
          @else
            <li class="{{ Request::is('product*')? 'active' : '' }}"><a href="/product">Album</a></li>
            <li class="{{ Request::is('fak-yu*')? 'active' : '' }}"><a href="/faq">FAQ</a></li>
          @auth
          @if (auth()->user()->tipe == 0)
            <li><a href="/transactio/upload-proofment">Transaction</a></li>
          @endif
          @endauth
          @endif
        </ul>
      </div>
    </nav>
    {{-- End Navbar --}}
  </header>




  <script>
    
    var a = document.getElementById("dropdownMenuButton");
    var b = document.getElementById("drop");
            function show() {
              b.style.display = "";
            }
            function block() {
              b.style.display = "none";
            }


  </script>
  <!-- End Header + End Navbar -->