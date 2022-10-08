<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Province;

class Select2Controller extends Controller
{
    function getProvinces(Request $request)
    {
        $list = Province::select('id', 'name_th')
            ->where(function ($query) use ($request) {
                if (!empty($request->s)) {
                    $query->where('name_th', 'like', '%' . $request->s . '%');
                }
            })
            ->get()->map(function ($item) {
                return [
                    'id' => $item->id,
                    'text' => $item->name_th
                ];
            });
        return response()->json($list);
    }
}
