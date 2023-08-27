@extends('layouts.admin')

@section('title', 'Edit Product Dashboard | BWA Store')

@section('content')
         <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Edit Product</h2>
                <p class="dashboard-subtitle">
                    Edit New Product
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
                            <form action="{{route('product.update',$item->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row justify-content-center">
                                     <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" id="name" class="form-control" value="{{$item->name}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="user_id">Kategori Product</label>
                                            <select name="user_id" id="user_id" class="form-control">
                                                <option value="{{$item->user_id}}">{{$item->user->name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="categories_id">Kategori Product</label>
                                            <select name="categories_id" id="categories_id" class="form-control">
                                                <option value="{{$item->categories_id}}">{{$item->category->name}}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="price">Harga</label>
                                            <input type="number" name="price" id="price" class="form-control" value="{{$item->price}}">
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="editor">{!! $item->description !!}</textarea>
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

