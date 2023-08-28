<?php

namespace App\Http\Controllers;

use App\Models\CallRequest;
use Illuminate\Http\Request;

class CallRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $call_request = CallRequest::all();

        return view('admin.callRequest.index', compact('call_request'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CallRequest  $callRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(CallRequest $callRequest)
    {
        //
    }
}
