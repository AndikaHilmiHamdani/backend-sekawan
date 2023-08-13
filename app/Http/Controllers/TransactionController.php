<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $transaction =  Transaction::with('cars','driver_names','manajer_names')->get();
        //dd($transaction);
        return view('transaction.transaction',compact('transaction'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = User::all();
        $car = Car::all(); 
        return view('transaction.transaction-add',compact('user','car'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'manajer_name' => 'required',
            'car_name' => 'required',
            'driver_name' => 'required',
            'status' => 'required',
        ]);
        
        $request = Transaction::create([
            'manajer_name' => $request['manajer_name'],
            'car_name' => $request['car_name'],
            'driver_name' => $request['driver_name'],
            'status' => $request['status'],
           
        ])->save();
        //dd($request);
        return redirect()->route('transaction.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $relasi = Transaction::with('cars','driver_names','manajer_names')->find($id);
        $transaction = Transaction::with('cars','driver_names','manajer_names')->find($id);
        $car = Car::all();
        $driver_name = User::all();
        $manajer_name = User::all();
        //dd($relasi);
        return view('transaction.transaction-edit',compact('transaction','car','driver_name','manajer_name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'manajer_name' => 'required',
            'car_name' => 'required',
            'driver_name' => 'required',
            'status' => 'required',
        ]);
       
        Transaction::find($id)->update($request->all());
        return redirect()->route('transaction.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        Transaction::find($id)->delete();
        return redirect()->route('transaction.index')->with('sukses', 'data berhasil dihapus');
    }

    function approve_driver(Request $request, string $id) {
        $request->validate([
            'status' => 'required',
        ]);

        Transaction::find($id)->update($request->all());
        return redirect()->route('transaction.index');
    }
    function approve_manajer(Request $request, string $id) {
        $request->validate([
            'status' => 'required',
        ]);

        Transaction::find($id)->update($request->all());
        return redirect()->route('transaction.index');
    }
}
