<?php

namespace App\Http\Controllers\Storage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function upload(Request $request)
    {
        // if($request->hasFile('file')){

        //     $file = $request->file('file');
        //     $filename = $file->getClientOriginalName();
        //     $path = storage_path().'/app/uploads/';
        //     return $file->move($path, $filename);
        // }
        // $fileNameWithExt = $request->file('file')->getClientOriginalName();
        // $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        // $extension = $request->file('file')->getClientOriginalExtension();
        // $fileNameToStore= $filename.'_'.time().'.'.$extension;
        // $path = $request->file('file')->storeAs('uploads', $fileNameToStore);
        // return $path;
        if ($request->hasFile('video')) {
            $video = $request->file('video');
            $config['allowed_types'] ='*';
            //Display File Name
            $videoName = $video->getClientOriginalName();

            //Display File Extension
            $extension = strtolower($video->getClientOriginalExtension());

            //Display File Mime Type
            $mime = $video->getMimeType();
            $new_videoname = uniqid("Video-", true).'-'.now()->timestamp.'.'.$extension;

            //Move Uploaded File
            $destinationPath = '/uploads/videos/';
            $video->move(public_path($destinationPath), $new_videoname);
            return $destinationPath.$new_videoname;
        }

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            //Display File Name
            $coverName = $cover->getClientOriginalName();

            //Display File Extension
            $extension = strtolower($cover->getClientOriginalExtension());

            //Display File Mime Type
            $mime = $cover->getMimeType();
            $new_covername = uniqid("Cover-", true).'-'.now()->timestamp.'.'.$extension;

            //Move Uploaded File
            $destinationPath = '/uploads/images/';
            $cover->move(public_path($destinationPath), $new_covername);
            return $destinationPath.$new_covername;
        }

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            //Display File Name
            $avatarName = $avatar->getClientOriginalName();

            //Display File Extension
            $extension = strtolower($avatar->getClientOriginalExtension());

            //Display File Mime Type
            $mime = $avatar->getMimeType();
            $new_avatarname = uniqid("avatar-", true).'-'.now()->timestamp.'.'.$extension;

            //Move Uploaded File
            $destinationPath = '/uploads/images/';
            $avatar->move(public_path($destinationPath), $new_avatarname);
            return $destinationPath.$new_avatarname;
        }
    }
}
