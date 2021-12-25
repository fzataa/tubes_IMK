@extends('layouts.main')

@section('isi')

<!-- tab content -->
<div class="container">
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
        </symbol>
        <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
          <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
        </symbol>
    </svg>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="suc">
        <svg class="bi flex-shrink-0 me-2 mr-1" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        {{ session('success') }}
        <button type="button" class="btn btn-light border-0 mt-0" style="background-color: transparent; float: right; margin-right: 0%" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('suc').style.display = 'none' "><i class="bi bi-x-lg"></i></button>
    </div>
    @endif
    @if (session('namesuccess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="namesuccess">
        <svg class="bi flex-shrink-0 me-2 mr-1" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        {{ session('namesuccess') }}
        <button type="button" class="btn btn-light border-0 mt-0" style="background-color: transparent; float: right; margin-right: 0%" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('namesuccess').style.display = 'none' "><i class="bi bi-x-lg"></i></button>
    </div>
    @endif
    @if (session('namevailed'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="namevailed">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        {{ session('namevailed') }}
        <button type="button" class="btn btn-light border-0 mt-0" style="background-color: transparent; float: right; margin-right: 0%" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('namevailed').style.display = 'none' "><i class="bi bi-x-lg"></i></button>
    </div>
    @endif
    @if (session()->has('sucess'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" id="sucess">
        <svg class="bi flex-shrink-0 me-2 mr-1" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
        {{ session('sucess') }}
        <button type="button" class="btn btn-light border-0 mt-0" style="background-color: transparent; float: right; margin-right: 0%" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('sucess').style.display = 'none' "><i class="bi bi-x-lg"></i></button>
    </div>
    @endif
    @if (session()->has('vai'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert" id="vai">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Warning:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        {{ session('vai') }}
        <button type="button" class="btn btn-light border-0 mt-0" style="background-color: transparent; float: right; margin-right: 0%" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('vai').style.display = 'none' "><i class="bi bi-x-lg"></i></button>
    </div>
    @endif
    @if (session()->has('vail'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert" id="vail">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
        {{ session('vail') }}
        <button type="button" class="btn btn-light border-0 mt-0" style="background-color: transparent; float: right; margin-right: 0%" data-bs-dismiss="alert" aria-label="Close" onclick="document.getElementById('vail').style.display = 'none' "><i class="bi bi-x-lg"></i></button>
    </div>
    @endif
    <h4 class="text-center text-dark mt-4" style="font-size: 30px">My Profile</h4>
    <div class="row justify-content-start mt-5">
              <table class="table">
                  <tbody>
                      <tr>
                          {{-- <td>Gambar</td> --}}
                          @if (Auth::user()->image == "storage/images/blank-profile-picture-g05817d649_640.png")
                              {{-- <td scope="row" rowspan="4"> <img src="{{ asset('storage/'.Auth::user()->image) }}" alt="{{ asset('images/'.Auth::user()->image) }}" height="250" width="200" class="rounded float-start mb-3"></td>
                              @else --}}
                              <td scope="row" rowspan="4"> <img src="/image/blank-profile-picture-g05817d649_640.png" alt="/images/blank-profile-picture-g05817d649_640.png" width="200" class="rounded float-start mb-3"></td>
                          @else
                              <td scope="row" rowspan="4"> <img src="{{ asset('storage/' . auth()->user()->image ) }}" alt="{{ asset('images/'.Auth::user()->image) }}" width="200" class="rounded float-start mb-3"></td>
                          @endif
                          <th>Name</th>
                          <td><form action="/profile-change-name" method="post" id="forname">
                                @csrf
                                <input required type="text" class="@error('name') is-invalid @enderror" style="border-radius:10px; width:200px; border-color: #F9A826; border-width: thin" name="name" value="{{ auth()->user()->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <a onmouseover="this.style.cursor = 'pointer'" onclick="document.getElementById('forname').submit()" class="badge bg-primary border-0 ml-2 bi bi-pencil-square px-2 py-1 text-light d-inline"> Change</a>
                              </form>
                          </td>
                        </tr>
                        <tr>
                            <th>Username</th>
                            <td>{{ Auth::user()->username }}</td>
                        </tr>
                        
                        <tr>
                            <th>Email</th>
                            <td>{{Auth::user()->email}}</td>
                        </tr>
                        
                        <tr>
                            <th>Nomor HP</th>
                            <td>{{Auth::user()->no_telp}}</td>
                        </tr>
                        <tr>
                            <td rowspan="6">
                                <form action="/profile-change-pic" method="post" enctype="multipart/form-data" class="mt-3">
                                    @csrf
                                    <input type="file" class="@error('image') is-invalid @enderror" name="image" id="image" style="position:relative; bottom:11px;" >
                                        @error('image')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    <button type="submit" class="btn btn bg-primary bi bi-pencil-square border-0 mb-4 text-light d-block mt-2" data-bs-toggle="modal" data-bs-target="#editAkunModal"> Edit Photo</button>
                                  </form>
                            </td>
                        </tr>
                        <form action="/profile-change-password" method="post" id="forpass">
                            @csrf
                        <tr>
                            <th rowspan="5">Change Password</th>
                            <td>
                                <input class="px-1 @error('old_password') is-invalid @enderror" style="border-radius:10px; width:200px; border-color: #F9A826; border-width: thin" type="password" id="old_password" name="old_password" placeholder=" Old Password">
                                @error('old_password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="px-1 @error('password') is-invalid @enderror" style="border-radius:10px; width:200px; border-color: #F9A826; border-width: thin" type="password" id="password" name="password" placeholder=" New Password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input class="px-1 @error('new_password_confirm') is-invalid @enderror" style="border-radius:10px; width:200px; border-color: #F9A826; border-width: thin" type="password" id="new_password_confirm" name="new_password_confirm" placeholder=" Confirm New Password">
                                @error('new_password_confirm')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox" id="shopass">
                                <label for="shopass">&nbsp;Show Password</label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <a onmouseover="this.style.cursor = 'pointer'" onclick="document.getElementById('forpass').submit()" class="badge bg-primary border-0 ml-2 bi bi-pencil-square px-2 py-1 text-light"> Change</a>
                            </td>
                        </tr>
                      </form>
                  </tbody>
              </table>
  </div>
 
</div>
<!-- End tab content -->


@endsection



