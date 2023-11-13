<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePartnerRequest;
use App\Http\Requests\updateHeadRequest;
use App\Http\Requests\updatePartnerRequest;
use App\Models\head;
use App\Models\partner;
use Illuminate\Http\Request;

class HeadController extends Controller
{
    public function update($header,updateHeadRequest $request){
        if (auth()->check() && auth()->user()->role == 'admin') {
            $singlePartner=head::Find($header);
            if (!$singlePartner) {
                return response()->json(['message' => 'Note not found'], 404);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('images');
                $singlePartner->update([
                    'head'=> $request->input('head'),
                    'image'=> $filePath,
                ]);

            }




            return response()->json(['message' => 'Task updated','task' => $singlePartner]);  }}


}
