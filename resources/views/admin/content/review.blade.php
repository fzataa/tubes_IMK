@extends('admin.layouts.index')

@section('section')
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page-body start -->
            <div class="page-body">
                <!-- Basic table card start -->
                <div class="card">
                    <div class="card-header">
                        <h5>Reviews</h5>
                        <span>Detail Laporan Review</span>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table" id="datatables">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>User</th>
                                    <th>Review</th>
                                    <th>Rate</th>
                                    <th>Image</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($review as $r )
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $r->user->username }}</td>
                                        <td>{{ $r->review }}</td>
                                        <td>{{ $r->rate }}</td>
                                        <td><img width="100px" src="{{ asset('storage/' . $r->image) }}" alt=""></td>
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