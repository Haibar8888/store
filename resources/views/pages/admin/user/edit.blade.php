@extends('layouts.admin')

@section('title', 'Edit User Dashboard | BWA Store')

@section('content')
         <div
            class="section-content section-dashboard-home"
            data-aos="fade-up"
          >
            <div class="container-fluid">
              <div class="dashboard-heading">
                <h2 class="dashboard-title">Edit User</h2>
                <p class="dashboard-subtitle">
                    Edit New User
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
                            <form action="{{route('user.update',$item->id)}}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="row justify-content-center">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <label for="name">Name User</label>
                                            <input type="text" name="name" class="form-control" value="{{$item->name}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Email User</label>
                                            <input type="email" name="email" class="form-control" value="{{$item->email}}" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password User</label>
                                            <input type="password" name="password" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <select name="roles" id="roles" class="form-control">
                                                <option value="{{$item->roles}}" selected>{{$item->roles}}</option>
                                                <option value="ADMIN">Admin</option>
                                                <option value="USER">User</option>
                                            </select>
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

