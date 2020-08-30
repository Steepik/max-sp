<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProjectRequest;
use App\Photos;
use App\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function index()
    {
        return view('frontend.admin.project.index');
    }

    public function saveProject(AdminProjectRequest $request)
    {
        if($request->hasFile('photos')) {
            // Create project
            $projectId = Projects::create([
                'user_id' => Auth::user()->id,
                'address' => $request->name,
                'review' => $request->review,
                'admin' => true,
            ]);

            $path = config('app.uploads') . 'projects/';

            // Make dirs
            if (!File::isDirectory($path)) {
                File::makeDirectory($path . '/' . $projectId->id);
            }

            foreach ($request->photos as $file) {
                $photosName = $file->getClientOriginalName() . '.' . $file->extension();
                $file->move($path . '/' . $projectId->id, $photosName);

                // Add photo to db
                Photos::create([
                    'project_id' => $projectId->id,
                    'path' => 'uploads/projects/' . $projectId->id . '/' . $photosName,
                ]);
            }
        }

        return redirect(route('admin-panel'))->with('success', 'Проект был успешно добавлен на сайт ');
    }
}
