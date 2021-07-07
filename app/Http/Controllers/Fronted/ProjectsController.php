<?php

namespace App\Http\Controllers\Fronted;

use App\Interfaces\UserInterface;
use App\Models\Project_images;
use App\Models\Projects;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator,Auth,Artisan,Hash,File,Crypt;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\Consults;
use App\Http\Controllers\Manage\EmailsController;

class ProjectsController extends Controller
{

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function allProjects(){
        $Projects = Projects::all();
        return view('Fronted.Projects.allProjects',compact('Projects'));
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function singleProject($id)
    {
        $Projects = Projects::where('id',$id)->first();
        if (!is_null($Projects)) {
            $project_image = Project_images::where('project_id',$id)->get();
            return view('Fronted.Projects.singleProject',compact('Projects','project_image'));
        }
    }

}
