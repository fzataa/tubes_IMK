@extends('layouts.main')

@section('isi')

<div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
          <div class="site-blocks-table">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('cansuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('cansuccess') }}
                    </div>
                @endif
                @if (session()->has('revsuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('revsuccess') }}
                    </div>
                @endif
            @if ($detail == "Arrived")
            <h1 class="text-black">Not Reviewed</h1>
            @endif
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th class="product-thumbnail">Image</th>
                  <th class="product-name">Category</th>
                  <th class="product-name">Product</th>
                  <th class="product-name">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-total">Courier</th>
                  <th class="product-remove">Status</th>
                </tr>
              </thead>
              <tbody style="overflow: auto;">
                @if(!$tran->count())
                    <tr>
                        <td colspan="7">No Transaction</td>
                    </tr>
                @endif
                
                @foreach ($tran as $ker)

                  @if ($ker->status == "Upload Payment Proofment")
                    @php
                      $del = false;
                      $now = Carbon\Carbon::now();
                      $date = $ker->created_at->addDays(1);
                      if($now->gte($date)){
                        $del = true;
                      }else {
                        $del = false;
                      }
                    @endphp
                    @if ($del)
                      @php
                      $var = App\Models\Transaction::where([
                          ['user_id','=', auth()->user()->id],
                          ['id','=', $ker->id],
                          ['status','=', 'Upload Payment Proofment'],
                      ])->first();

                      App\Models\Transaction::destroy($var->id);

                      @endphp
                    
                    @endif
                  @endif

                @if ($ker->status != " ")
                <tr>
                  <td class="product-thumbnail">
                    <a href="/product/{{ $ker->product->id }}"><img src="{{ asset('storage/' . $ker->product->image1) }}" alt="Image" class="img-fluid"></a>
                  </td>
                  <td>{{ $ker->product->category }}</td>
                  <td class="product-name">
                    @if ($ker->product->category == "Album")
                    <a href="/invoice/{{ $ker->id }}"><h2 class="h5 text-black">{!! $ker->cart->keterangan !!}</h2></a>
                    
                    @else
                    <a href="/invoice/{{ $ker->id }}"><h2 class="h5 text-black">{{ $ker->product->judul }}</h2></a>

                    @endif
                  <td>
                      {{ $ker->cart->jumlah }}
                  </td>
                  <td>
                      Rp.{{ $ker->total }}
                  </td>
                  <td>
                      {{ strtoupper($ker->address->kurir) }}
                  </td>

                  <td>
                    <a href="/invoice/{{ $ker->id }}">{{ $ker->status }}</a>
                  </td>
                </tr>
                @else
                    <tr>
                        <td colspan="7">No Transaction</td>
                    </tr>
                @endif
                @endforeach


              </tbody>
            </table>
            
            @if ($detail == "Arrived")
                
            <h1 class="text-black mt-5">Reviewed</h1>
            <table class="table table-bordered">
            <thead>
              <tr>
                <th class="product-thumbnail">Image</th>
                <th class="product-name">Category</th>
                <th class="product-name">Product</th>
                <th class="product-name">Quantity</th>
                <th class="product-total">Total</th>
                <th class="product-total">Courier</th>
                <th class="product-remove">Status</th>
              </tr>
            </thead>
            <tbody style="overflow: auto;">
              @if(!$norev->count())
                  <tr>
                      <td colspan="7">No Transaction</td>
                  </tr>
              @endif

              @foreach ($norev as $rev)
              @if ($rev->status != " ")
              <tr>
                <td class="product-thumbnail">
                  <a href="/product/{{ $rev->product->id }}"><img src="{{ asset('storage/' . $rev->product->image1) }}" alt="Image" class="img-fluid"></a>
                </td>
                <td>{{ $rev->product->category }}</td>
                <td class="product-name">
                  @if ($rev->product->category == "Album")
                  <a href="/invoice/{{ $rev->id }}"><h2 class="h5 text-black">{!! $rev->cart->keterangan !!}</h2></a>
                  
                  @else
                  <a href="/invoice/{{ $rev->id }}"><h2 class="h5 text-black">{{ $rev->product->judul }}</h2></a>

                  @endif
                <td>
                    {{ $rev->cart->jumlah }}
                </td>
                <td>
                    Rp.{{ $rev->total }}
                </td>
                <td>
                    {{ strtoupper($rev->address->kurir) }}
                </td>

                <td>
                  <a href="/invoice/{{ $rev->id }}">{{ $rev->status }}</a>
                </td>
              </tr>
              @else
                  <tr>
                      <td colspan="7">No Transaction</td>
                  </tr>
              @endif
              @endforeach
            </tbody>
          </table>
          @endif

          </div>
        </div>
      </div>



@endsection