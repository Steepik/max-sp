<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AddProjectToUserRequest;
use App\Http\Requests\AddUserRequest;
use App\Mail\ClientMail;
use App\Photos;
use App\Projects;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    const DOCUMENTS_DIR_NAME = 'documents';
    const PHOTOS_DIR_NAME = 'photos';

    public function index()
    {
        $users = User::getUsers()->get();

        return view('frontend.admin.index', compact('users'));
    }

    public function addUserShow()
    {
        return view('frontend.admin.user.add');
    }

    public function addUser(AddUserRequest $request)
    {
        $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

        $path = config('app.uploads') . 'profile/' . $user->id . '';
        File::makeDirectory($path);
        File::makeDirectory($path . '/projects');

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        Mail::to($request->email)->send(new ClientMail($data));

        return redirect(route('admin-panel'))->with('success', 'Пользователь был успешно добавлен');
    }

    public function showProjectForm(int $userId)
    {
        return view('frontend.admin.user.add_project', compact('userId', $userId));
    }

    public function saveProject(AddProjectToUserRequest $request, int $userId)
    {
        if($request->hasFile('documents') && $request->hasFile('photos')) {
            // Create project
            $projectId = Projects::create([
                'user_id' => $userId,
                'address' => $request->name,
            ]);

            $path = config('app.uploads') . 'profile/' . $userId . '/projects/' . $projectId->id;

            // Make dirs
            if (!File::isDirectory($path)) {
                File::makeDirectory($path);
            }

            if (!File::isDirectory($path . '/' . self::DOCUMENTS_DIR_NAME)) {
                File::makeDirectory($path . '/' . self::DOCUMENTS_DIR_NAME);
            }

            if (!File::isDirectory($path . '/' . self::PHOTOS_DIR_NAME)) {
                File::makeDirectory($path . '/' . self::PHOTOS_DIR_NAME);
            }

            foreach ($request->documents as $file) {
                $docName = $file->getClientOriginalName();
                $file->move($path . '/' . self::DOCUMENTS_DIR_NAME, $docName);
            }

            foreach ($request->photos as $file) {
                $photosName = $file->getClientOriginalName();
                $file->move($path . '/' . self::PHOTOS_DIR_NAME, $photosName);

                // Add photo to db
                Photos::create([
                    'project_id' => $projectId->id,
                    'path' => 'uploads/profile/' . $userId . '/projects/' . $projectId->id . '/photos/' . $photosName,
                ]);
            }
        }

        return redirect(route('admin-panel'))->with('success', 'Проект был успешно добавлен пользователю ');
    }

    public function delete($userId)
    {
        User::where('id', $userId)->delete();

        return redirect()->back()->with('success', 'Пользователь  был удален');
    }
}
