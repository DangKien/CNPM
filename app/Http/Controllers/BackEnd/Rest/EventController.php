<?php

namespace App\Http\Controllers\BackEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session;
use App\Models\EventModel;
use Carbon\Carbon;

class EventController extends Controller {

    public function getList(EventModel $eventModel) {
        $event = $eventModel->orderBy('id','desc')
                            ->paginate(15);

        return response()->json($event);
    }

    public function getInsert(Request $request, EventModel $eventModel) {

        $this->validateInsert($request);
        DB::beginTransaction();
        try {

            $now = Carbon::now()->format('Y-m-d');

            if (strtotime($request->beginDate) > strtotime($request->endDate)) {
                return response()->json(['messages' => 'Ngày bắt đầu không thể lớn hơn kết thúc'], 422);
            }
            if (strtotime($request->endDate) < strtotime($now)) {
                return response()->json(['messages' => 'Ngày sự kiện đã qua'], 422);
            }
            $eventModel->name       = $request->name;
            $eventModel->begin_date = $request->beginDate;
            $eventModel->end_date   = $request->endDate;
            $eventModel->content    = $request->content;
            $eventModel->save();

            DB::commit();
            return response()->json(['status' => true], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['messages' => 'Lỗi hệ thống'], 422);
        }
    }

    public function getEdit($id, Request $request,  EventModel $eventModel) {

        if (isset($id) && !empty($id)) {
            $event = $eventModel::find($id);
            return response()->json($event);
        } else {
            return response()->json(['status' => 'Id không tồn tại'], 422);
        }
    }

    public function getUpdate($id, Request $request, EventModel $eventModel) {
        if (isset($id) && !empty($id)) {

            $this->validateUpdate($request);

            DB::beginTransaction();
            try {
                if (strtotime($request->beginDate) > strtotime($request->endDate)) {
                    return response()->json(['messages' => 'Ngày bắt đầu không thể lớn hơn kết thúc'], 422);
                }
                $event = $eventModel::find($id);

                $event->name       = $request->name;
                $event->begin_date = $request->beginDate;
                $event->end_date   = $request->endDate;
                $event->content    = $request->content;
                $event->save();

                DB::commit();

                return response()->json(['status' => true], 200);
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['messages' => 'Lỗi hệ thống'], 422);
            }
        } else {
            return response()->json(['status' => 'Id không tồn tại'], 422);
        }
    }

    public function getDelete($id, EventModel $eventModel) {

        if (isset($id) && !empty($id)) {
            DB::beginTransaction();
            try {
                $event = $eventModel::find($id)->delete();
                
                DB::commit();
                return response()->json(['status' => true], 200);
            } catch (Exception $e) {
                DB::rollback();
                return response()->json(['messages' => 'Lỗi hệ thống'], 422);
            }
        } else {
            return response()->json(['status' => 'Id không tồn tại', 422]);
        }
    }

    public function validateInsert($request) {
        return $this->validate($request, [
            'name'      => 'required| between:1,255',
            'beginDate' => 'required| date_format:"Y-m-d"',
            'endDate'   => 'required| date_format:"Y-m-d"',
            'content'   => 'required| between:1,1000',
            ], [
            'name.required'         => 'Tên không được để trống',
            'name.between'          => 'Tên không vượt quá 255 kí tự',
            'beginDate.required'    => 'Ngày bắt đầu không được để trống',
            'beginDate.date_format' => 'Ngày bắt đầu không đúng định dạng',
            'endDate.required'      => 'Ngày kết thúc không được để trống',
            'endDate.date_format'   => 'Ngày kết thúc không đúng định dạng',
            'content.required'      => 'Nội dung sự kiện không được để trống',
            'content.between'       => 'Nội dung khôg vượt quá 1000 kí tự',
            ]
        );
    }

    public function validateUpdate($request) {
        return $this->validate($request, [
            'name'      => 'required| between:1,255',
            'beginDate' => 'required| date_format:"Y-m-d"',
            'endDate'   => 'required| date_format:"Y-m-d"',
            'content'   => 'required| between:1,1000',
            ], [
            'name.required'         => 'Tên không được để trống',
            'beginDate.required'    => 'Ngày bắt đầu không được để trống',
            'name.between'          => 'Tên không vượt quá 255 kí tự',
            'beginDate.date_format' => 'Ngày bắt đầu không đúng định dạng',
            'endDate.required'      => 'Ngày kết thúc không được để trống',
            'endDate.date_format'   => 'Ngày kết thúc không đúng định dạng',
            'content.required'      => 'Nội dung sự kiện không được để trống',
            'content.between'       => 'Nội dung khôg vượt quá 1000 kí tự',
            ]
        );
    }

}
