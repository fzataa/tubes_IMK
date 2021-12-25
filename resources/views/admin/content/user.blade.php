@extends('admin.layouts.index')

@section('section')
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <!-- Basic table card start -->
                <div class="card">
                    <div class="card-header">
                        @if (Request::is('users'))
                            <h5>Users</h5>
                            <span>Detail Laporan Pengguna</span>
                        @else
                            <h5>Customers</h5>
                            <span>Detail Laporan Pelanggan</span>
                        @endif
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="datatables">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>No. Telepon</th>
                                    <th>Email</th>
                                    <th>Tipe</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $p )
                                      <tr>
                                          <td>{{ $loop->iteration }}</td>
                                          <td>{{ $p->name }}</td>
                                          <td>{{ $p->username }}</td>
                                          <td>{{ $p->no_telp }}</td>
                                          <td>{{ $p->email }}</td>
                                          <td>@if (auth()->user()->tipe == 3)
                                                @if ($p->tipe == 1)
                                                    Main Admin
                                                @elseif($p->tipe == 3)
                                                    Admin 
                                                @else
                                                    User
                                                @endif

                                              @else 
                                                @if ($p->tipe == 1)
                                                        <button class="btn btn-primary btn-round waves-effect waves-light px-2 py-1">
                                                            
                                                            Main Admin
                                                        </button>
                                                        @elseif($p->tipe == 3)
                                                        <form action="/users" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $p->id }}">
                                                        <input type="hidden" name="tipe" value="0">
                                                        <button class="btn btn-primary btn-round waves-effect waves-light px-2 py-1" onclick="return confirm('Apakah anda ingin mengubah tipe pengguna?')" type="submit" >
                                                        
                                                                Admin
                                                            </button>
                                                        </form>
                                                        @else
                                                        <form action="/users" method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{ $p->id }}">
                                                        <input type="hidden" name="tipe" value="3">
                                                        <button class="btn btn-primary btn-round waves-effect waves-light px-2 py-1" onclick="return confirm('Apakah anda ingin mengubah tipe pengguna?')" type="submit" >
                                                        
                                                                User
                                                            </button>
                                                        </form>
                                                    @endif
                                              @endif 
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