@extends('layouts.admin')

@section('title', 'Product Gallery Dashboard | BWA Store')

@section('content')
         <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">List Product Gallery</h2>
                <p class="dashboard-subtitle">
                  Look what you have made today!
                </p>
              </div>
             <div class="dashboard-content">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="card">
                        <div class="card-body">
                          <div class="row">
                            <div class="col-4">
                              <a href="{{route('product-gallery.create')}}" class="btn btn-primary">Tambah Product</a>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-12">
                              {{-- dataTable --}}
                              <div class="table table-responsive">
                                <table class="table table-hover scroll-horizontal-vertical" id="crudTable">
                                  <thead>
                                    <tr>
                                      <th>ID</th>
                                      <th>Produck</th>
                                      <th>Photo</th>
                                      <th>Aksi</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    {{-- tbody --}}
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
             </div>
            </div>
        </div>
@endsection

@push('addon-scripts')
      <script>
            var dataTable = $('#crudTable').DataTable(
              {
                processing : true,
                serverSide : true,
                orderings : true,
                ajax : {
                  url : '{!! url()->current() !!}'
                },
                columns : [
                  {data : 'id',name : 'id'},
                  {data : 'product.name',name : 'product.name'},
                  {data : 'photo',name : 'photo'},
                  {
                    data : 'action',
                    name : 'action',
                    orderable : false,
                    seacrhcable : false,
                    width : '15%'
                  },
                ]
              });
      </script>
@endpush
