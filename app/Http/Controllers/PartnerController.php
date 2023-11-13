<?php

namespace App\Http\Controllers;

use App\Http\Requests\storePartnerRequest;
use App\Http\Requests\updatePartnerRequest;
use App\Models\head;
use App\Models\partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
    public function index(){

            $homePage['header'] =head::all();
            $homePage['partners'] =partner::all();


            return response()->json(['data'=>$homePage]);

        }

    public function store(storePartnerRequest $request){
        if (auth()->check() && auth()->user()->role == 'admin') {
            $partner = new partner();
            $partner->partner = $request->input('partner');
            $partner->description = $request->input('description');
            // $partner->image = $request->input('image');
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('images');
                $partner->image = $filePath;
            }
            $partner->website = $request->input('website');
            $partner->profile = $request->input('profile');
            $partner->facebook = $request->input('facebook');
            $partner->whatsapp = $request->input('whatsapp');
            $partner->instagram = $request->input('instagram');
            $partner->phone = $request->input('phone');
            $partner->save();

                return response()->json(['message' => 'done created task', 'data'=>$partner]);
            }

        return response()->json(['message' => 'not for you']);
}

    public function update($partner,updatePartnerRequest $request){
        if (auth()->check() && auth()->user()->role == 'admin') {
            $singlePartner=partner::Find($partner);
            if (!$singlePartner) {
                return response()->json(['message' => 'Note not found'], 404);
            }

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $fileName = $file->getClientOriginalName();
                $filePath = $file->store('images');
                $singlePartner->update([
                    'image'=> $filePath,
                    'partner'=> $request->input('partner'),
                    'description'=> $request->input('description'),
                    'website'=> $request->input('website'),
                    'profile'=> $request->input('profile'),
                    'facebook'=> $request->input('facebook'),
                    'whatsapp'=> $request->input('whatsapp'),
                    'instagram'=> $request->input('instagram'),
                    'phone'=> $request->input('phone'),
                ]);

            }else{ return response()->json(['message' => 'image not file, please try again and send the image as a file']);}


        return response()->json(['message' => 'Task updated','task' => $singlePartner]);

        }}

        public function destroy($partner){
            if (auth()->check() && auth()->user()->role == 'admin') {
                $singlePartner=partner::Find($partner);
                if (!$singlePartner){
                    return response()->json(['message' => 'Note not found']);
                };
                $singlePartner->delete();
                return response()->json(['message' => 'done delete']);

            }
  return response()->json(['message' => 'not for you']);
}
}
