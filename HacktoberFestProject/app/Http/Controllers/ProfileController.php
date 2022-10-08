<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $list = Profile::leftJoin('provinces', 'provinces.id', '=', 'profiles.province_id')
        ->select('profiles.id', 'profiles.name', 'profiles.lastname', 'profiles.tel', 'profiles.email', 'provinces.name_th as province_name')
        ->orderBy('profiles.created_at', 'desc')
        ->paginate(20);
        return view('profiles.index', [
            'list' => $list,
        ]);
    }

    public function create() {
        $d = new Profile();
        $province_name = null;
        $title = 'เพิ่มข้อมูลโปรไฟล์ผู้ใช้งาน';
        return view('profiles.form', [
            'd' => $d,
            'title' => $title,
            'province_name' => $province_name,
        ]);
    }

    public function edit(Profile $profile)
    {
        $province_name = $profile->province ? $profile->province->name_th : null;
        $title = 'แก้ไขข้อมูลโปรไฟล์ผู้ใช้งาน';
        return view('profiles.form', [
            'd' => $profile,
            'title' => $title,
            'province_name' => $province_name,
        ]);
    }

    public function show(Profile $profile)
    {
        $province_name = $profile->province ? $profile->province->name_th : null;
        $title = 'ดูข้อมูลโปรไฟล์ผู้ใช้งาน';
        return view('profiles.form', [
            'd' => $profile,
            'title' => $title,
            'province_name' => $province_name,
            'view' => true
        ]);
    }

    public function destroy($id)
    {
        $profile = Profile::find($id);
        $profile->delete();

        return response()->json([
            'success' => true,
            'message' => 'Complete',
        ]);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $profile = Profile::firstOrNew(['id' => $request->id]);
        $profile->name = $request->name;
        $profile->lastname = $request->lastname;
        $profile->tel = $request->tel;
        $profile->email = $request->email;
        $profile->province_id = $request->province_id;
        $profile->address = $request->address;
        $profile->status = 1;
        $profile->save();

        $redirect_route = route('profiles.index');
        return response()->json([
            'success' => true,
            'message' => 'ok',
            'redirect' => $redirect_route
        ]);
    }
}
