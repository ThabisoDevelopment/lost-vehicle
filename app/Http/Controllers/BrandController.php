<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Brand;
use App\Http\Resources\BrandResource;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $brands = Brand::orderBy('id', 'desc')->paginate(12);
        return view('brand.brands')->with([ 'brands' => $brands]);;

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $brand = new Brand();
        $brand->name = $request->input('brand_name');
        $brand->brand_active = $request->input('brand_active');
        if ($brand->save()) {
            return redirect('/brands')->with('success', 'Brand created!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $brand = Brand::FindOrFail($id);
        // return new BrandResource($brand);
        return view('brand.show')->with([ 'brand' => $brand ]);
    }
      /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::FindOrFail($id);
        return view('brand.edit')->with([ 'brand' => $brand ]);
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
        $brand = Brand::FindOrFail($id);
        $brand->name = $request->input('brand_name');
        $brand->brand_active = $request->input('brand_active');
        if ($brand->save()) {
            return redirect('/brands')->with('success', 'Brand updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brand = Brand::FindOrFail($id);
        if($brand->delete()){
            return redirect('/brands')->with('success', 'Brand Deleted!');
        }
    }

    public function api($id)
    {
        $brand = Brand::FindOrFail($id);
        return new BrandResource($brand);
    }

    public function deactivate($id)
    {
        $brand = Brand::FindOrFail($id);
        $brand->brand_active = 0;;
        if ($brand->save()) {
            return redirect('/brand/'.$id)->with('success', 'Brand Deactivate!');
        }
    }
    public function activate($id)
    {
        $brand = Brand::FindOrFail($id);
        $brand->brand_active = 1;
        if ($brand->save()) {
            return redirect('/brand/'.$id)->with('success', 'Brand Acivated!');
        }
    }
}
