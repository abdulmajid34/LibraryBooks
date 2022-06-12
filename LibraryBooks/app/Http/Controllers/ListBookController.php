<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListBook;

class ListBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showDashboard()
    {
        return view('dashboard', [
            'books' => ListBook::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createFormBook');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'title' => 'required',
            'genre' => 'required',
            'rating' => 'required|max:10|numeric',
            'sinopsis' => 'required',
            
        ]);
        $validateData['created_at'] = new \DateTime();
        $validateData['updated_at'] = new \DateTime();
        ListBook::insert($validateData);
        return redirect()->route('dashboard')->with('success', trans('message.msg-success-createBook'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $updateData = ListBook::find($id);
        return view('updateBook')->with([
            'dataBooks' => $updateData
        ]);
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

        $dataDb = ListBook::find($id);
        $reqData = $request->except(['id']);
        $dataDb->update($reqData);
        return redirect()->route('dashboard')->with('success', trans('message.msg-success-updateBook'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $data = ListBook::find($id);
        $data->delete();
        return redirect()->route('dashboard')->with('success', trans('message.msg-success-deleteBook'));
    }
}

