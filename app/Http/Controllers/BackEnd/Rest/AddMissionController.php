<?php

namespace App\Http\Controllers\BackEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session, Storage, Image;
use App\Models\AlbumModel;
use App\Models\AddMissionModel;
use App\Models\ContactModel;
use App\Libs\EventSocket;


Class AddMissionController extends Controller {

    public function getList(Request $request, AddMissionModel $addMissionModel) {
        $addMission = $addMissionModel->orderBy('id','desc')
                                      ->paginate(15);
        return response()->json($addMission);
    }

    public function getCheck($id, AddMissionModel $addMissionModel, EventSocket $redis) {
        $addMission = $addMissionModel::find($id);
        DB::beginTransaction();
        try {
            $addMission->status = "AVAILABLE";
            $addMission->save();
            DB::commit();
            $redis->socketIO('addmission', $addMission);
            return response()->json(['status'=>true ], 200);

        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['messages'=>'Lỗi hệ thống' ], 402);
        }
    }

    public function getContact(ContactModel $contactModel) {
        $contact = $contactModel->orderBy('id','desc')
                                      ->paginate(15);
        return response()->json($contact);
    }
}
