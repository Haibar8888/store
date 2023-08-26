<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

// request validation
use App\Http\Requests\Admin\UserRequest;
use App\Http\Requests\Admin\UpdateUserRequest;
// datatable
use Yajra\DataTables\Facades\DataTables;

// model
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if(request()->ajax())
        {
            $query = User::query();

            return DataTables::of($query)
                ->addColumn('action',function($item){
                    return '
                        <div class="dropdown w-100">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href=" '. route('user.edit',$item->id) .' ">Edit</a>
                                <form method="POST" action="'.route('user.destroy',$item->id).'">
                                    '.method_field('DELETE'). csrf_field() .'
                                    <button type="submit" class="dropdown-item text-danger">
                                        delete
                                    </button>
                                </form>
                            </div>
                        </div>
                    ';
                })
                ->editColumn('photo',function($item) {
                    return $item->photo ? '<img src="'.Storage::url($item->photo).'" style="max-width:15%;"/>' : '';
                })
                ->rawColumns(['action','photo'])
                ->make();

        }
        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        //
        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()->route('user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = User::findOrFail($id);
        return view('pages.admin.user.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, $id)
    {
        //
        $data = $request->all();
        
        $item = User::findOrFail($id);

         if($request->password === null) {
           $data['password'] = $item->password;
        }else{
             $data['password'] = Hash::make($request->password);
        }

        $item->update($data);
       
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $item = User::findOrFail($id);
        $item->delete();

        return redirect()->route('user.index');
    }
}
