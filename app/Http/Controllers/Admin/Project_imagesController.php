<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project_images;
use App\Models\Projects;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class Project_imagesController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Project_images::get();
        if($request->project_id)
            $data = Project_images::where('project_id',$request->project_id)->get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $project_id = $request->project_id;
        return view('Admin.Project_images.index',compact('project_id'));
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->save_video($request,new Project_images);
        return $this->apiResponseMessage(1,'تم اضافة الفيديو بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Project_images = Project_images::find($id);
        return $Project_images;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {
        $Project_images = Project_images::find($request->id);
        $this->save_video($request,$Project_images);
        return $this->apiResponseMessage(1,'تم تعديل الفيديو بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_video($request,$Project_images){
        if($request->image) {
            deleteFile('Project_images',$Project_images->image);
            $Project_images->image=saveImage('Project_images',$request->image);

        }
        $Project_images->project_id = $request->project_id;

        $Project_images->save();
    }

    /**
     * @param $id
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|int
     */
    public function destroy($id,Request $request)
    {
        if ($request->type == 2) {
            $ids = explode(',', $id);
            $Project_images = Project_images::whereIn('id', $ids)->get();
            foreach($Project_images as $row){
                $this->deleteRow($row);
            }
        } else {
            $Project_images = Project_images::find($id);
            $this->deleteRow($Project_images);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Project_images){
        deleteFile('Project_images',$Project_images->image);
        $Project_images->delete();
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
            $options .= ' <button type="button" onclick="deleteFunction(' . $data->id . ',1)" class="btn btn-dribbble waves-effect btn-circle waves-light"><i class="sl-icon-trash"></i> </button></td>';
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('image', function ($data) {
            $image = '<a href="'. getImageUrl('Project_images',$data->image).'" target="_blank">'
                .'<img  src="'. getImageUrl('Project_images',$data->image) . '" width="50px" height="50px"></a>';
            return $image;
        })->rawColumns(['action' => 'action','checkBox'=>'checkBox','image'=>'image'])->make(true);
    }
}
