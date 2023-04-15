<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientList = Client::all();
        return view('client.client', compact('clientList'));
    }

    // index page add-client
    public function clientAdd()
    {

        return view('client.add-client');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function clientSave(Request $request)
    {
        $validator =   Validator::make($request->all(), [
            'nom_client'  => 'required|string',
            'prenom_client'  => 'required|string',
            'adresse'  => 'required|string',
            'phone'  => 'required|string',
            'email'  => 'required|string',
            'cin'  => 'required|string',
        ]);



        DB::beginTransaction();
        try {
            $client = new Client();
            $client->nom_client = $request->nom_client;
            $client->prenom_client = $request->prenom_client;
            $client->adresse = $request->adresse;
            $client->phone = $request->phone;
            $client->email = $request->email;
            $client->cin = $request->cin;
            $client->save();

            Toastr::success('Has been add successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();
            Toastr::error('Fail, Add new client :)', 'Error');
            return redirect()->back();
        }
    }

    // index page client grid
    public function clientGrid()
    {
        return view('client.client-grid');
    }


    /** view for edit client */
    public function clientEdit($id)
    {
        $clientEdit = Client::where('id', $id)->first();

        return view('client.edit-client', compact('clientEdit'));
    }

    /** update record */
    public function clientUpdate(Request $request)
    {
        DB::beginTransaction();
        try {

            $updateRecord = [
                'nom_client' => $request->nom_client,
                'prenom_client' => $request->prenom_client,
                'adresse' => $request->adresse,
                'phone' => $request->phone,
                'email' => $request->email,
                'cin' => $request->cin,
            ];
            Client::where('id', $request->id)->update($updateRecord);

            Toastr::success('Has been update successfully :)', 'Success');
            DB::commit();
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('fail, update client  :)', 'Error');
            return redirect()->back();
        }
    }




    /** client delete */ 
    public function clientDelete(Request $request)
    {
        DB::beginTransaction();
        try {

            Client::destroy($request->id);

            DB::commit();
            Toastr::success('Client deleted successfully :)', 'Success');
            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollback();
            Toastr::error('Client deleted fail :)', 'Error');
            return redirect()->back();
        }
    }
}
