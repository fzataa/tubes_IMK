@extends('layouts.main')

@section('isi')
<div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="h3 mb-3 text-black text-center">Your Order</h2>
          <div class="border p-4 rounded" role="alert">
            <table class="table site-block-order-table mb-5">
                <thead>
                  <th>Product</th>
                  <th>Total</th>
                </thead>
                @php
                    $tot = $prod->cart->jumlah * $prod->cart->harga
                @endphp
                <tbody>
                  <tr>
                    <td>{!! $prod->cart->keterangan !!}<br><span style="color: rgba(0, 0, 0, 0.5);">Each Version </span><strong class="mx-2">x</strong>{{$prod->cart->jumlah}}</td>
                    <td>Rp.{{ $prod->cart->harga }} X {{ $prod->cart->jumlah }} : Rp.{{ $tot }}</td>
                  </tr>
                  <tr>
                    <td>{{ strtoupper($prod->kurir) }}</td>
                    <td>Rp.{{ $prod->ongkir }}</td>
                  </tr>
                  <tr>
                      @php
                          $val = 0;
                          $val = $tot + $prod->ongkir;
                      @endphp
                    <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                    <td class="text-black font-weight-bold"><strong>Rp.{{$val}}</strong></td>
                  </tr>
                </tbody>
              </table>
      
      
              <div class="form-group">
                  <form action="/transacti" method="post">
                      @csrf
                      <input type="hidden" name="cart_id" value="{{ $prod->cart_id }}">
                      <input type="hidden" name="product_id" value="{{ $prod->cart->product_id }}">
                      <input type="hidden" name="address_id" value="{{ $prod->id }}">
                      <input type="hidden" name="jumalh" value="{{ $val }}">
                      <input type="hidden" name="total" value="{{ $val }}">
                      <input type="hidden" name="status" value="Upload Payment Proofment">
                      <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Place Order</button>
                  </form>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection