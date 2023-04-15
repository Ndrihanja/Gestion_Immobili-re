<?php

namespace App\Http\Controllers;

use App\Models\Terrain;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TerrainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $terrainList = Terrain::all();
        return view('terrain.terrain', compact('terrainList'));
    }

    // index page add-terrain
    public function terrainAdd()
    {

        return view('terrain.add-terrain');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function terrainSave(Request $request)
    {
        $validator =   Validator::make($request->all(), [
            'surface'  => 'required|string',
            'aire'  => 'required|string',
        ]);



        DB::beginTransaction();
        try {
            $terrain = new Terrain();
            $terrain->surface = $request->surface;
            $terrain->aire = $request->aire;
            $terrain->save();

            Toastr::success('Has been add successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Fail, Add new terrain :)', 'Error');
            return redirect()->back();
        }
    }

    // index page terrain grid
    public function terrainGrid()
    {
        return view('terrain.terrain-grid');
    }


    /** view for edit terrain */
    public function terrainEdit($id)
    {
        $terrainEdit = Terrain::where('id', $id)->first();

        return view('terrain.edit-terrain', compact('terrainEdit'));
    }

    /** update record */
    public function terrainUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

            $updateRecord = [
                'surface' => $request->surface,
                'aire' => $request->aire,
            ];
            Terrain::where('id', $request->id)->update($updateRecord);

            Toastr::success('Has been update successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, update terrain  :)', 'Error');
            return redirect()->back();
        }
    }




    /** terrain delete */
    public function terrainDelete(Request $request)
    {
        DB::beginTransaction();
        try {

            Terrain::destroy($request->terrain_id);

            DB::commit();
            Toastr::success('Terrain deleted successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Terrain deleted fail :)', 'Error');
            return redirect()->back();
        }
    }
}
