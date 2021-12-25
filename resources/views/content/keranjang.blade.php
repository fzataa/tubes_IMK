@extends('layouts.main')

@section('isi')

<div class="site-section">
  <div class="container">
    <div class="row mb-5">
        <div class="site-blocks-table">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('delsuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('delsuccess') }}
                    </div>
                @endif
          <table class="table table-bordered">
            <thead>
              <tr>
                <th class="product-thumbnail">Image</th>
                <th class="product-name">Category</th>
                <th class="product-name">Product</th>
                <th class="product-price">Price</th>
                <th class="product-quantity">Quantity</th>
                <th class="product-total">Total</th>
                <th class="">Action</th>
              </tr>
            </thead>
            <tbody style="overflow: auto;">
              @if(!$keranjang->count())
                  <tr>
                      <td colspan="7">Tidak ada antrian</td>
                  </tr>
              @endif
              @foreach ($keranjang as $ker)
              <tr>
                <td class="product-thumbnail">
                  <a href="/product/{{ $ker->product->id }}"><img src="{{ asset('storage/' . $ker->product->image1) }}" alt="Image" class="img-fluid"></a>
                </td>
                <td>{{ $ker->product->category }}</td>
                <td class="product-name">
                  @if ($ker->product->category == "Album")
                  <h2 class="h5 text-black">{!! $ker->keterangan !!}</h2>
                  
                  @elseif ($ker->product->category == "Akun Premium")
                  <h2 class="h5 text-black">{{ $ker->product->judul }}</h2>

                  @endif
                </td>
                <td><span>Rp.<input type="text" disabled style="border:0; background-color:transparent;" class="text-photo d-inline" width="30px" id="hargg" width="20px" value="{{ $ker->harga }}" size="3"></span></td>
                <td>
                  <div class="input-group mb-3" style="max-width: 120px;" id="covv">
                    </div>
                    <input type="text" disabled class="border-0 form-control text-center" style="background-color:transparent;" id="jumlahh" name="jumlah" value="{{ $ker->jumlah }}" placeholder="" size="4" aria-label="Example text with button addon" aria-describedby="button-addon1">
                    </div>
                  </div>
                </td>

                <td id="tot">
                </td>

                <td>
                  <form action="/ongkir/{{ $ker->id }}" class="text-photo d-inline" method="get">
                    @csrf
                    <button class="btn btn-primary px-1" style="padding: 0" type="submit">Checkout</button>
                  </form>
                  <form action="/keranjang/{{ $ker->id }}" class="text-photo d-inline" method="post">
                      @method('delete')
                      @csrf
                      <button class="btn btn-danger px-1" style="padding: 0" type="submit">Remove</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="row mb-5">
          <div class="col-md-6 mb-3 mb-md-0">
            <a class="btn btn-outline-primary btn-sm btn-block" href="/product">Continue Shopping</a>
          </div>
          <div class="col-md-6">
              {{-- <button class="btn btn-primary btn-sm btn-block">Update Cart</button> --}}
          </div>
        </div>
      </div>
      <div class="col-md-6 pl-5">
        <div class="row justify-content-end">
          <div class="col-md-7">
            <div class="row">
              <div class="col-md-12 text-right border-bottom mb-5">
                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
              </div>
            </div>
            <div class="row mb-5">
              <div class="col-md-6">
                <span class="text-black">Total</span>
              </div>
              <div class="col-md-6 text-right">
                <strong class="text-black"></strong>
              </div>
            </div>

            <div class="row">
              <div class="col-md-12">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection