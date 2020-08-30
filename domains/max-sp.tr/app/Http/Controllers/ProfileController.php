<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendReviewRequest;
use App\Mail\ReviewMail;
use App\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Madnest\Madzipper\Madzipper;

class ProfileController extends Controller
{
    public function index()
    {
        if (Auth::user()->is_admin) {
            return redirect('/admin');
        }

        $projects = Projects::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->simplePaginate(10);

        if (!$projects->isEmpty()) {
            $projects->map(function ($item) {
                $files = File::allFiles(config('app.uploads') . 'profile/' . Auth::user()->id . '/projects/' . $item->id . '/documents');

                return $item['files'] = $files;
            });
        }


        return view('frontend.profile.index', compact('projects'));
    }

    public function download($project_id)
    {
        $zipFile = config('app.uploads') . 'profile/' . Auth::user()->id . '/zipfiles/files.zip';

        if (file_exists($zipFile)) {
            unlink($zipFile);
        }

        $files = File::allFiles(config('app.uploads') . 'profile/' . Auth::user()->id . '/projects/' . $project_id);
        $a = new Madzipper();
        $a->make($zipFile)->add($files)->close();

        return response()->download($zipFile);
    }

    public function sendReview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'review_text' => 'required|min:3'
        ],[
            'required' => 'Поле не может быть пустым',
            'min' => 'Текст отзыва должен быть не менее :min символов',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ]);
        }

        // Get project info
        $projectInfo = Projects::findOrFail($request->project_id);
        $data = [
            'address' => $projectInfo->address,
            'username' => Auth::user()->name,
            'review_text' => $request->review_text,
        ];

        Mail::to(env('MAIL_TO_ADDRESS'))->send(new ReviewMail($data));

        return response()->json([
            'success' => true,
            'message' => 'Отзыв отправлен'
        ]);
    }
}
