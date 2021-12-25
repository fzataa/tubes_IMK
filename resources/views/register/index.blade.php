@extends('register.main')

@section('title')
    Register
@endsection

@section('section')
<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center h1 fw-bold mb-3 mx-1 mx-md-4 mt-2">Registration</p>

                  <p class="text-center mb-5"><a href="/" class="text-decoration-none" style="color: #F9A826;"><i class="bi bi-chevron-double-left"></i></i> Back to homepage</a></p>
  
                  <form action="/verify-email" method="post" class="mx-1 mx-md-4">

                    @csrf
                    <div class="form-floating mb-3">
                        <input type="text" name="name" class="form-control rounded-top @error('name')is-invalid @enderror" id="name" placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Name</label>
                        @error('name')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" name="username" class="form-control @error('username')is-invalid @enderror" id="username" placeholder="username" required value="{{ old('username') }}">
                        <label for="username">Username</label>
                        @error('username')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
  
                    <div class="form-floating mb-3">
                        <input type="email" name="email" class="form-control @error('email')is-invalid @enderror" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                        <label for="email">Email address</label>
                        @error('email')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="text" name="no_telp" class="form-control rounded-bottom @error('no_telp')is-invalid @enderror" id="no_telp" placeholder="no_telp" required value="{{ old('no_telp') }}">
                        <label for="no_telp">Nomor Telepon</label>
                        @error('no_telp')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" name="password" class="form-control rounded-bottom @error('password')is-invalid @enderror" id="password" placeholder="Password" required>
                        <label for="password">Password</label>
                        @error('password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="password" name="Confirm_Password" class="form-control rounded-bottom @error('Confirm_Password')is-invalid @enderror" id="Confirm_Password" placeholder="Confirm Password" >
                        <label for="Confirm_Password">Confirm Password</label>
                        @error('Confirm_Password')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                        @enderror
                    </div>
                    
                    <input type="checkbox" id="showpasse">
                    <label for="showpasse">&nbsp;Show Password</label>

                    <button class="w-100 btn btn-lg btn-light mt-3" type="submit" style="background-color: #F9A826;">Register</button>
  
                  </form>
                  <smal class="d-block text-center mt-3">Already registered?<a href="/login" class="text-decoration-none" style="color: #F9A826;">Login</a></small>
  
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
  
                  <img src="{{ asset('icon/undraw_online_ad_re_ol62.svg') }}" class="img-fluid" alt="Sample image">
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>  
@endsection