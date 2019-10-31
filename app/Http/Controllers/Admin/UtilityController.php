<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Chotel\UtilityRequest;
use App\Model\Chotel\Utility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UtilityController extends Controller
{
    //
    public function getUtility()
    {

        $listUti = DB::table('utilities')
            ->select()
            ->get();
        //dd($listUti);
        return view('admin.utility.index', compact('listUti'));
    }


    // add
    public function getAddUtility()
    {
        return view('admin.utility.add');
    }

    public function postAddUtility(UtilityRequest $request)
    {
        $arrUti['uname'] = $request->ten_tb;
        //dd($arrUti);
        Utility::insert($arrUti);
        $request->session()->flash('msg', 'Add a utility successfully');
        return redirect()->route('admin.utility.getUtility');
    }

    //edit
    public function getEditUtility($id)
    {
        $utility = DB::table('utilities')
            ->select()
            ->where('uid', $id)
            ->first();
        //dd($utility);
        return view('admin.utility.edit', compact('utility'));
    }

    public function postEditUtility(UtilityRequest $request)
    {
        $uid = $request->uid;
        $arrUti['uname'] = $request->ten_tb;
        $result = DB::table('utilities')
            ->where('uid', $uid)
            ->update($arrUti);
        if ($result) {
            $request->session()->flash('msg', 'Update successfully');
        }
        return redirect()->route('admin.utility.getUtility');
    }

    public function deleteUtility($id)
    {
        //dd($id);
        $result = DB::table('utilities')
            ->where('uid', $id)
            ->delete();
        if ($result) {
            return redirect()->route('admin.utility.getUtility')->with('msg', 'Deleted successfully');
        }
        return redirect()->route('admin.utility.getUtility');
    }
}
