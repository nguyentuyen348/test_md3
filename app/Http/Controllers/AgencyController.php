<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgencyCreateRequest;
use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AgencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $agencies=Agency::all();
        return view('backends.admin.agency.list',compact('agencies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('backends.admin.agency.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AgencyCreateRequest $request, Agency $agency)
    {
        $agency->name = $request->name;
        $agency->phone_number = $request->phone_number;
        $agency->email = $request->email;
        $agency->address = $request->address;
        $agency->manager = $request->manager;
        $agency->status = $request->status;
        $agency->save();

        Session::flash('success', 'success');
        return redirect()->action([AgencyController::class, 'index']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $agency = Agency::findOrFail($id);
        return view('backends.admin.agency.edit', compact('agency'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $agency = Agency::findOrFail($id);

        $agency->name = $request->name;
        $agency->phone_number = $request->phone_number;
        $agency->email = $request->email;
        $agency->address = $request->address;
        $agency->manager = $request->manager;
        $agency->status = $request->status;
        $agency->save();


        Session::flash('success', 'success');
        return redirect()->action([AgencyController::class, 'index']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $agency = Agency::findOrFail($id);
        $agency->delete();
        return redirect()->action([AgencyController::class, 'index'])
            ->with('success', 'delete success');
    }

    public function search(Request $request)
    {
        $agencySearch = $request->search;
        $agencies = Agency::where('name', 'LIKE', "%$agencySearch%")->get();
        return view('backends.admin.agency.list', compact('agencies'));
    }
}
