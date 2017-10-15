<?php

namespace App\Http\Controllers\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;
use App\Models\ClassModel;

class ClassController extends Controller {

    public function getList() {
        $class = ClassModel::all();
        return response()->json($class);
    }

    public function getInsert(Request $request) {

        $this->validateInsert($request);
        DB::beginTransaction();
        try {
            $class = new ClassModel();
            $class->name = $request->name;
            $class->year = $request->year;
            $class->save();

            DB::commit();

            return response()->json(['status' => true, 200]);
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    public function getEdit($id, Request $request) {

        if (isset($id) && !empty($id)) {
            $class = ClassModel::find($id);
            return response()->json($class);
        } else {
            return response()->json(['status' => 'Id không tồn tại', 422]);
        }
    }

    public function getUpdate($id, Request $request) {
        if (isset($id) && !empty($id)) {
            $this->validateUpdate($request);
            DB::beginTransaction();
            try {
                $class = ClassModel::find($id);

                $class->name = $request->name;
                $class->year = $request->year;
                $class->status = $request->status;
                $class->save();

                DB::commit();

                return response()->json(['status' => true, 200]);
            } catch (Exception $e) {
                DB::rollback();
            }
        } else {
            return response()->json(['status' => 'Id không tồn tại', 422]);
        }
    }

    public function getDelete($id) {

        if (isset($id) && !empty($id)) {
            DB::beginTransaction();
            try {
                $class = ClassModel::find($id)->delete();
                return response()->json(['status' => true, 200]);
                DB::commit();
            } catch (Exception $e) {
                DB::rollback();
            }
        } else {
            return response()->json(['status' => 'Id không tồn tại', 422]);
        }
    }

    public function validateInsert($request) {
        return $this->validate($request, [
                    'name' => 'required',
                    ], [
                    'name.required' => 'Tên không được để trống',
                    ]
        );
    }

    public function validateUpdate($request) {
        return $this->validate($request, [
                    'name' => 'required',
                        ], [
                    'name.required' => 'Tên không được để trống',
                    ]
        );
    }

}
