@extends('layouts.main')

@section('isi')
<div class="site-section">
  <div class="container" style="margin-right: 0px">
    <div class="row">
      <div class="col-md-8 mb-5 mb-md-0">
        <h2 class="h3 mb-3 text-black text-center">Address</h2>
        <div class="p-3 p-lg-5 border">
          <div class="form-group">
            <form action="/transaction/{{ $tran->id }}" method="post">
              @csrf
              <input type="hidden" name="cart_id" value="{{ $curt }}">
            <label for="name" class="text-black">Name <span class="text-danger">*</span></label>
            <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}" autofocus required>
          </div>
                    <input type="hidden" class="form-control provinsi-asal" name="province_origin" value="34">
                    <input type="hidden" class="form-control kota-asal" name="city_origin" value="229">

          <div class="form-group row">
            <div class="col-md-12">
              <label for="provdes" class="text-black">Province <span class="text-danger">*</span></label>
                    <select class="form-control provinsi-tujuan" name="province_destination" id="provdes" required>
                        <option value="0">-- Destination Province --</option>
                        @foreach ($provinces as $province => $value)
                            <option value="{{ $province  }}">{{ $value }}</option>
                        @endforeach
                    </select>
            </div>
          </div>
          
          
          
          <div class="form-group row">
            <div class="col-md-12">
              <label for="cides" class="text-black">City <span class="text-danger">*</span></label>
              <select class="form-control kota-tujuan" name="city_destination" id="cides" required>
                <option value="">-- Destination City --</option>
              </select>
            </div>
            <div class="col-md-6">
              <input type="hidden" class="form-control" name="weight" id="weight" placeholder="Masukkan Berat (GRAM)" value="3000">
            </div>
          </div>
          
          <div class="form-group row mb-5">
            <div class="col-md-12">
              <input type="text" class="form-control" id="address_opt" name="address_opt" value="{{ old('address_opt') }}" placeholder="Street, Apartment, suite, unit etc." required>
            </div>
          </div>
          
          <div class="form-group row mb-5">
            <div class="col-md-6">
              <label for="courier" class="text-black">Courier <span class="text-danger">*</span></label>
              <select class="form-control kurir" name="courier" id="courier" required>
                        <option value="0">-- Courier --</option>
                        <option value="jne">JNE</option>
                        <option value="pos">POS</option>
                        <option value="tiki">TIKI</option>
              </select>
            </div>
          </div>

          <div class="form-group row mb-5">
            <div class="col-md-6">
              <label for="email" class="text-black">Email Address <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="email" name="email" required  value="{{ old('email') }}">
            </div>
            <div class="col-md-6">
              <label for="phone" class="text-black">Phone <span class="text-danger">*</span></label>
              <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number" value="{{ old('phone') }}" required>
            </div>
          </div>
          
          <div class="form-group row mb-5">
            <div class="col-md-12">
              <button class="btn btn-md btn-primary btn-block btn-check">Check Shipping Cost</button>
            </div>
          </div>
          
          <div class="form-group row mb-5">
          <div class="col-md-12">
              <div class="card d-none ongkir">
                  <div class="card-body">
                    <ul class="list-group" id="ongkir"></ul>
                  </div>
              </div>
            </div>
          </div>
          <input type="hidden" id="huarga" name="huarga" value="">
          <div class="form-group row mb-5">
              <button class="btn btn-md btn-primary btn-block" type="submit" >Submit</button>
            </form>

        </div>
      </div>
      <div class="col-md-6">


      </div>
    </div>
    <!-- </form> -->
  </div>
</div>
@endsection