<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// request validation
use App\Http\Requests\Admin\ProductRequest;
// use App\Http\Requests\Admin\UpdateProductRequest;
// datatable
use Yajra\DataTables\Facades\DataTables;

// model
use App\Models\Product;
use App\Models\User;
use App\Models\Category;

class ProductController extends Controller
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
            $query = Product::with(['user','category']);

            return DataTables::of($query)
                ->addColumn('action',function($item){
                    return '
                        <div class="dropdown w-100">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href=" '. route('product.edit',$item->id) .' ">Edit</a>
                                <form method="POST" action="'.route('product.destroy',$item->id).'">
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
        return view('pages.admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = User::all();
        $category = Category::all();
        return view('pages.admin.product.create',compact('users', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        Product::create($data);

        return redirect()->route('product.index');
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
        $users = User::all();
        $category = Category::all();
        $item = Product::with(['user','category'])
                ->findOrFail($id);
        // dd($item);
        return view('pages.admin.product.edit',compact('item','users','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        $item = Product::findOrFail($id);
        $item->update($data);
        
        return redirect()->route('product.index');
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
        $item = Product::findOrFail($id);
        $item->delete();

        return redirect()->route('product.index');
    }
}
