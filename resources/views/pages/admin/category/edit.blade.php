@extends('layouts.admin')

@section('title', 'Edit Categories Dashboard | BWA Store')

@section('content')
         <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">List Categories</h2>
                <p class="dashboard-subtitle">
                    Edit New Category
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
                            <form action="{{route('category.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="name">Name Kategori</label>
                                            <input type="text" name="name" class="form-control" value="{{$item->name}}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="foto">Foto</label>
                                            <input type="file" name="photo" class="form-control">
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

