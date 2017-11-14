<?php

namespace App\Http\Controllers;

use GrahamCampbell\Markdown\Facades\Markdown;
use Illuminate\Http\Request;

class FilesController extends Controller
{
    public function index()
    {
        $folders = scandir(config('app.courses_folder'));

        return view('files.folders', ['folders' => $folders]);
    }

    public function showFolder($folder)
    {
        $files = scandir(config('app.courses_folder').'/'.$folder);

        return view('files.files', ['folder' => $folder, 'files' => $files]);
    }

    public function showFile($folder, $file)
    {
        $infos = pathinfo(config('app.courses_folder').'/'.$folder.'/'.$file);
        if($infos['extension'] == 'md'){
            $file = file_get_contents(config('app.courses_folder').'/'.$folder.'/'.$file);
            $markdown = Markdown::convertToHtml($file);

            return view('files.file', ['markdown' => $markdown]);
        }

        return response()->file(config('app.courses_folder').'/'.$folder.'/'.$file);
    }
}
