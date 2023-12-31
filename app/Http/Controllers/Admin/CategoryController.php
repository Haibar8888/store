<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// request validation
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
// datatable
use Yajra\DataTables\Facades\DataTables;

// model
use App\Models\Category;

class CategoryController extends Controller
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
            $query = Category::query();

            return DataTables::of($query)
                ->addColumn('action',function($item){
                    return '
                        <div class="dropdown w-100">
                            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Action
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href=" '. route('category.edit',$item->id) .' ">Edit</a>
                                <form method="POST" action="'.route('category.destroy',$item->id).'">
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
        return view('pages.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['photo'] = $request->file('photo')->store('assets/category','public');

        Category::create($data);

        return redirect()->route('category.index');
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
        $item = Category::findOrFail($id);
        return view('pages.admin.category.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        //
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        if ($request->photo !== null) {
            $data['photo'] = $request->file('photo')->store('assets/category','public');
        }

        $item = Category::findOrFail($id);
        $item->update($data);
        
        return redirect()->route('category.index');
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
        $item = Category::findOrFail($id);
        $item->delete();

        return redirect()->route('category.index');
    }
}
