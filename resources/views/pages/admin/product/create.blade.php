@extends('layouts.admin')

@section('title', 'Tambah Product Dashboard | BWA Store')

@section('content')
         <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">List Product</h2>
                <p class="dashboard-subtitle">
                    Create New Product
                </p>
              </div>
             <div class="dashboard-content">
                  <div class="row">
                    <div class="col-md-8">
                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                      <div class="card">
                        <div class="card-body">
                            <form action="{{route('product.store')}}" method="POST">
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="name">Name Product</label>
                                            <input type="text" name="name" class="form-control" >
                                        </div>

                                        <div class="form-group">
                                            <label for="user_id">User Product</label>
                                            <select name="user_id" id="user_id" class="form-control">
                                                    <option value="">Pilih</option>
                                                @foreach($users as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="categories_id">Kategori Product</label>
                                            <select name="categories_id" id="categories_id" class="form-control">
                                                    <option value="">Pilih</option>
                                                @foreach($category as $item)
                                                    <option value="{{$item->id}}">{{$item->name}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                      
                                         <div class="form-group">
                                            <label for="price">Harga Product</label>
                                            <input type="number" name="price" class="form-control" >
                                        </div>

                                         <div class="form-group">
                                            <label for="description">Deskripsi Product</label>
                                            <textarea name="description" id="editor"></textarea>
                                        </div>

                                        <div class="form-group text-right justify-content-end">
                                            <button type="submit" class="btn btn-success px-5">Save Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                      </div>
                    </div>
                  </div>
             </div>
            </div>
        </div>
@endsection

@push('addon-scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .then( editor => {
                
                } )
            .catch( error => {
                console.error( error );
                } );
    </script>
@endpush