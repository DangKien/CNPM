<?php

namespace App\Http\Controllers\FrontEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EventModel;


Class EventCtrl extends Controller {

    public function getEvent (EventModel $eventModel){
        $event = $eventModel::select('id', 'name', 'begin_date', 'end_date')
                            ->get();

        return response()->json($event);
    }
    
}
