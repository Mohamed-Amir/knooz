<?php


namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\About;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class AboutController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = About::get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        return view('Admin.About.index');
    }


    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $About = About::find($id);
        return $About;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $About = About::find($request->id);
        $this->save_About($request,$About);
        return $this->apiResponseMessage(1,'تم تعديل المعلومات بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_About($request,$About){
        $About->about_ar = $request->about_ar;
        $About->about_en = $request->about_en;
        $About->phone = $request->phone;
        $About->whatsApp = $request->whatsApp;
        $About->email = $request->email;
        $About->address = $request->address;
        if($request->image) {
            deleteFile('About',$About->image);
            $About->image=saveImage('About',$request->image);
        }
        $About->save();
    }

    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    private function mainFunction($data)
    {
        return Datatables::of($data)->addColumn('action', function ($data) {
            $options = '<td class="sorting_1"><button  class="btn btn-info waves-effect btn-circle waves-light" onclick="editFunction(' . $data->id . ')" type="button" ><i class="fa fa-spinner fa-spin" id="loadEdit_' . $data->id . '" style="display:none"></i><i class="sl-icon-wrench"></i></button>';
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('image', function ($data) {
            $image = '<a href="'. getImageUrl('About',$data->image).'" target="_blank">'
                .'<img  src="'. getImageUrl('About',$data->image) . '" width="50px" height="50px"></a>';
            return $image;
        })->rawColumns(['action' => 'action','image' => 'image','checkBox'=>'checkBox'])->make(true);
    }
}
