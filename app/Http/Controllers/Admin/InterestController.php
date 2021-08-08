<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreInterestRequest;
use App\Http\Requests\UpdateInterestRequest;
use App\Models\Interest;
use App\Actions\Interest\StoreInterest;
use App\Actions\Interest\UpdateInterest;
class InterestController extends Controller
{
    public function index(){
        $interests = Interest::paginate(20);
        return view('admin.interests.index')->with('interests', $interests);
    }

    public function store(StoreInterestRequest $request){
        try{
            (new StoreInterest())->run($request);
            return redirect()->route('admin.interests.index')->with('success', 'Interest added successfully');
        }catch(\Exception $e){
            return back()->with('error', $e->getMessage());
        } 
    }

    public function update(UpdateInterestRequest $request, $id)
    {
        try {
            (new UpdateInterest())->run($id, $request);
            return redirect()->route('admin.interests.index')->with('success', 'Interest updated successfully');
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }

    public function delete($id)
    {
        Interest::findOrFail($id)->delete();
        return redirect()->route('admin.interests.index')->with('success', 'Interest Deleted');
    }

    public function restore($id)
    {
        Interest::findOrFail($id)->restore();
        return redirect()->route('admin.interests.index')->with('success', 'Interest Restored');
    }
}
