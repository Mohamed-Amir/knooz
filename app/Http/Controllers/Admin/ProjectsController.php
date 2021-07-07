<?php


namespace App\Http\Controllers\Admin;

use App\Models\Categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Projects;
use Yajra\DataTables\DataTables;
use Auth, File;
use Illuminate\Support\Facades\Storage;


class ProjectsController extends Controller
{
    use \App\Traits\ApiResponseTrait;

    /**
     * @return mixed
     * @throws \Exception
     */
    public function allData(Request $request)
    {
        $data = Projects::get();
        if($request->project_id)
            $data = Projects::where('project_id',$request->project_id)->get();
        return $this->mainFunction($data);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $cat = Categories::all();
        $project_id = $request->project_id;
        return view('Admin.Projects.index',compact('cat','project_id'));
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'image' => 'required|image|max:2000',
            ],
            [
                'image.required' =>'من فضلك ادخل صوره ',
                'image.image' =>'من فضلك ادخل صورة صالحة'
            ]
        );
        $this->save_Projects($request,new Projects);
        return $this->apiResponseMessage(1,'تم اضافة المشروع بنجاح',200);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $Projects = Projects::find($id);
        return $Projects;
    }

    /**
     * @param Request $request
     * @return int
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request)
    {

        $Projects = Projects::find($request->id);
        $this->save_Projects($request,$Projects);
        return $this->apiResponseMessage(1,'تم تعديل المشروع بنجاح',200);
    }

    /**
     * @param $request
     * @param $brand
     */
    public function save_Projects($request,$Projects){
        $Projects->name_ar = $request->name_ar;
        $Projects->name_en = $request->name_en;
        $Projects->finishing_date = $request->finishing_date;
        $Projects->duration = $request->duration;
        $Projects->location = $request->location;
        $Projects->desc_ar = $request->desc_ar;
        $Projects->desc_en = $request->desc_en;
        $Projects->status = $request->status;
        $Projects->cat_id = $request->cat_id;
        if($request->image) {
            deleteFile('Projects',$Projects->image);
            $Projects->image=saveImage('Projects',$request->image);
        }
        $Projects->save();
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
            $Projects = Projects::whereIn('id', $ids)->get();
            foreach($Projects as $row){
                $this->deleteRow($row);
            }
        } else {
            $Projects = Projects::find($id);
            $this->deleteRow($Projects);
        }
        return response()->json(['errors' => false]);
    }

    /**
     * @param $cat
     */
    private function deleteRow($Projects){
        deleteFile('Projects',$Projects->image);
        $Projects->delete();
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
            $options .= ' <a href="/Admin/Project_images/index?project_id='.$data->id.'" title="صور المشروع " class="btn btn-success waves-effect btn-circle waves-light"><i class="icon-Add"></i> </a></td>';
            return $options;
        })->addColumn('checkBox', function ($data) {
            $checkBox = '<td class="sorting_1">' .
                '<div class="custom-control custom-checkbox">' .
                '<input type="checkbox" class="mybox" id="checkBox_' . $data->id . '" onclick="check(' . $data->id . ')">' .
                '</div></td>';
            return $checkBox;
        })->editColumn('image', function ($data) {
            $image = '<a href="'. getImageUrl('Projects',$data->image).'" target="_blank">'
                .'<img  src="'. getImageUrl('Projects',$data->image) . '" width="50px" height="50px"></a>';
            return $image;
        })->editColumn('status', function ($data) {
            $status = '<button class="btn waves-effect waves-light btn-rounded btn-success statusBut" >معروضة</button>';
            if ($data->status == 2)
                $status = '<button class="btn waves-effect waves-light btn-rounded btn-danger statusBut"  style="cursor:pointer !important" >غير معروضة</button>';
            return $status;
        })->rawColumns(['action' => 'action','image' => 'image','checkBox'=>'checkBox','status'=>'status'])->make(true);
    }
}
