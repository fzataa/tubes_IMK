@extends('admin.layouts.index')

@section('section')

<style>
    .badge {
      position: relative;
      display: inline-block;
      border-bottom: 1px dotted black;
    }
    
    .badge .tooltiptext {
      visibility: hidden;
      width: 120px;
      background-color: black;
      color: #fff;
      text-align: center;
      border-radius: 6px;
      padding: 5px 0;
      position: absolute;
      z-index: 1;
      top: -5px;
      left: 110%;
    }
    
    .badge .tooltiptext::after {
      content: "";
      position: absolute;
      top: 50%;
      right: 100%;
      margin-top: -5px;
      border-width: 5px;
      border-style: solid;
      border-color: transparent black transparent transparent;
    }
    .badge:hover .tooltiptext {
      visibility: visible;
    }
    </style>




    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <!-- Basic table card start -->
                <div class="card">
                  @if (session()->has('succeess'))
                      <div class="alert alert-success bg-success text-white mb-2" role="alert">
                          {{ session('succeess') }}
                      </div>
                  @endif
                    <div class="card-header">
                        <h5>Transactions</h5>
                        <span>Status : {{ $detail }}</span>
                    </div>
                    <div class="card-block table-border-style">
                      @if ($detail == "Arrived")
                        <form action="/export-excel" method="get" class="mb-3">
                          @csrf
                          <button class="btn btn-primary">Export To Excel</button>
                        </form>
                      @endif
                        <div class="table-responsive">
                            <table class="table" id="datatables">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Product</th>
                                    <th>Courier</th>
                                    <th>Address</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Tracking Number</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($tran as $p )
                                  @php
                                    $city = App\Models\City::where('city_id', $p->address->city_id)->first();
                                  @endphp
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $p->user->name }}</td>
                                        <td>{!! $p->cart->keterangan !!}</td>
                                        <td>{{ strtoupper($p->address->kurir) }}</td>
                                        <td>{{ $city->name }}, {{ $p->address->province->name }}</td>
                                        <td>{{ $p->cart->jumlah }}</td>
                                        <td>Rp.{{ $p->total }}</td>
                                        @if ($p->status == "On Shipping")
                                          <td>{{ $p->resi }}</td>
                                        @elseif($p->status == "Arrived")
                                          <td>Product Arrived Already</td>
                                          @else
                                          <td>Not Shipping Yet</td>
                                        @endif
                                        <td>{{ $p->tanggal }}</td>
                                        <td>
                                            <a href="/transaction/waiting-for-verification-or-on-shipping/{{ $p->id }}" class="badge bg-info ti-eye border-0"><span class="tooltiptext">Show</span></a>
                                        </td>
                                    </tr>
                                  @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- Basic table card end -->
            </div>
            <!-- Page-body end -->
        </div>
    </div>
    
@endsection