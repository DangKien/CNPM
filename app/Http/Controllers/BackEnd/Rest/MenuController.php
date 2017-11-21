<?php

namespace App\Http\Controllers\BackEnd\Rest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Session, Image, Storage, File;
use App\Models\MenuModel;
use App\Models\CateMenuModel;

class MenuController extends Controller
{
	public function getList(Request $request, MenuModel $menuModel) {
		$menu = $menuModel->with('cates')->paginate(10);
		return response()->json($menu);
	}

	public function getListCateMenu(CateMenuModel $cateMenuModel) {
		$cate_menu = $cateMenuModel::all();
		return response()->json($cate_menu);

	}

	public function getInsert(Request $request, MenuModel $menuModel) { 

		//$this->validateInsert($request);

		DB::beginTransaction();
		try {
			if (!$request->hasFile('image')) {
				return response()->json(['messages' => "Không tìm thấy tệp ảnh "], 422);
			}
			$path      = $request->image->hashName('');
			$newImage  = Image::make($request->image)->resize(500, 500, function ($constraint) {
			     $constraint->aspectRatio();
			})->encode('png');

			$menuModel->week      = $request->week;
			$menuModel->month     = $request->month;
			$menuModel->year      = $request->year;
			$menuModel->cate_menu = $request->cateId;
			$menuModel->url_image = $path;
			$menuModel->save();

			$url_image = Storage::disk('public')->put('images/menu/title_menu/'.$path, $newImage);
			$image     = Storage::disk('public')->put('images/menu/menu', $request->image);
			DB::commit();

			return response()->json(['status' => true], 200);

		} catch (Exception $e) {
			DB::rollback();
		}
	}

	public function getEdit($id, MenuModel $menuModel) {

		if (isset($id) && !empty($id)) {
			$menu = $menuModel::find($id);
			return response()->json($menu);
		} else {
			return response()->json(['messages' => 'Id không tồn tại'], 422); 
		}
	}

	public function getUpdate($id, Request $request, MenuModel $menuModel) {
		$menu = $menuModel::find($id);
		$path_image = $menu->url_image;
		if (isset($id) && !empty($id)){
			//$this->validateUpdate($request);
			DB::beginTransaction();
			try {
				if (!$request->hasFile('image')) {
					$path = $path_image;
				}
				else {
					$path      = $request->image->hashName('');
					$newImage  = Image::make($request->image)->resize(500, 500, function ($constraint) {
					     $constraint->aspectRatio();
					})->encode('png');
					$url_image = Storage::disk('public')->put('images/menu/title_menu/'.$path, $newImage);
					$image     = Storage::disk('public')->put('images/menu/menu', $request->image);

					$filename_lib = public_path().'/storage/images/menu/title_menu/'.$path_image;
					$filename_title = public_path().'/storage/images//menu/menu/'.$path_image;
					File::delete([$filename_lib, $filename_title]);
				}

				$menu->week      = $request->week;
				$menu->month     = $request->month;
				$menu->year      = $request->year;
				$menu->cate_menu = $request->cateId;
				$menu->url_image = $path;
				$menu->save();
				DB::commit();

				return response()->json(['status' => true], 200);

				} catch (Exception $e) {
					DB::rollback();
				}
		}else {
			return response()->json(['messages' => 'Id không tồn tại'], 422); 
		}
	}
	
	public function getDelete($id, MenuModel $menuModel) {

		if (isset($id) && !empty($id)) {
			DB::beginTransaction();
			try {
				$menu = $menuModel::find($id);
				$path_image = $menu->url_image;

				$filename_lib = public_path().'/storage/images/menu/title_menu/'.$path_image;
				$filename_title = public_path().'/storage/images//menu/menu/'.$path_image;
				File::delete([$filename_lib, $filename_title]);

				$menu->delete();
				DB::commit();
				return response()->json(['status' => true], 200); 
				

			} catch (Exception $e) {
				DB::rollback();
			}
			

		} else {
			return response()->json(['messages' => 'Id không tồn tại'], 422); 
		}
	}


	public function validateInsert($request){
	    return $this->validate($request, [
			'name'        => 'required|unique:catetogys,name',
			'description' => 'required',
			'speacies'    => 'required'
	    	], [
			'name.required'        => 'Tên mớn không được để trống',
			'name.unique'          => 'Đã có món ăn này',
			'description.required' => 'Mô tả món ăn không được bỏ trống',
			'speacies.required'    => 'Loại món ăn được bỏ trống'
	    	]
		);
	}
	public function validateUpdate($request){
	    return $this->validate($request, [
			'name'        => 'required',
			'speacies'       => 'required',
			'description' => 'required',
	    	], [
			'name.required'        => 'Tên mớn không được để trống',
			'description.required' => 'Mô tả món ăn không được bỏ trống',
			'speacies.required'    => 'Loại món ăn được bỏ trống'
	    	]
		);
	}
}
