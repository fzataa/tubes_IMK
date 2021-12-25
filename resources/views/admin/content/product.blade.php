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
                    @if (session()->has('success'))
                        <div class="alert alert-success bg-success text-white mb-2" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session()->has('delsuccess'))
                        <div class="alert alert-success bg-success text-white mb-2" role="alert">
                            {{ session('delsuccess') }}
                        </div>
                    @endif
                    @if (session()->has('editsuccess'))
                        <div class="alert alert-success bg-success text-white mb-2" role="alert">
                            {{ session('editsuccess') }}
                        </div>
                    @endif
                    <div class="card-header">
                        <h5 class="d-block">Products</h5>
                        <span>Detail Laporan Produk</span>
                    </div>
                    <div class="card-block table-border-style">
                        <a href="/products/create" class="btn btn-info mb-3">Insert New Product</a>
                        <div class="table-responsive">
                            <table class="table" id="datatables">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Category</th>
                                        {{-- <th>Album</th> --}}
                                        {{-- <th>Description</th>
                                        <th>Price ver</th>
                                        <th>Price Full</th>
                                        <th>Rate</th> --}}
                                        <th>Judul/Group</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $p )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td><img style="width:100px; height:50px; width:70px" src="{{ asset('storage/' . $p->image1) }}" alt=""></td>
                                        <td>{{ $p->category }}</td>
                                        {{-- <td>{{ $p->album }}</td> --}}
                                        {{-- <td>{{ Str::limit($p->desc, 10) }}</td>    
                                        <td>{{ $p->price_ver }}</td>
                                        <td>{{ $p->price_full }}</td>
                                        <td>{{ $p->rate }}</td> --}}
                                        @if ($p->category == "Album")
                                        <td>{{ $p->grup }}</td>
                                        @else
                                        <td>{{ $p->judul }}</td>
                                        @endif
                                        <td>
                                            <a href="/products/{{ $p->id }}" class="badge bg-info ti-eye border-0"><span class="tooltiptext">Show</span></a>
                                            <form action="/products/{{ $p->id }}/edit" method="get">
                                                @csrf
                                                <input type="hidden" name="id" id="id" value="{{ $p->id }}">
                                                <button class="badge bg-primary ti-pencil-alt border-0"><span class="tooltiptext">Update</span></button>
                                            </form>
                                            <form action="/products/{{ $p->id }}" method="post" class="d-inline">
                                              @method('delete')
                                              @csrf
                                              <button class="badge bg-danger ti-trash border-0" onclick="return confirm('Are You Sure ?')"><span class="tooltiptext">Delete</span></button>
                                            </form>
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