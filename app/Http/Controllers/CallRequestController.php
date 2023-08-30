<?php

namespace App\Http\Controllers;

use App\Models\CallRequest;
use Illuminate\Http\Request;

class CallRequestController extends Controller
{

    public function store(Request $request) {

        CallRequest::create($request->all());

        return redirect()->back();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $call_requests = CallRequest::all();

        // dd(url()->current());

        return view('admin.callRequest.index', compact('call_requests'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CallRequest  $callRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(CallRequest $callRequest)
    {
        // dd(url()->current());
        $callRequest->delete();

        return redirect()->back();
    }
}
