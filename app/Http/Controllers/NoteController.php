<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoteMultiImage;
use App\Models\Note;
use Auth;


class NoteController extends Controller
{

    // public function ShowCv(){


    //     $file = 'upload/mycv.pdf';

    //      $headers = [
    //         'Content-Type' => 'application/pdf'
    //     ];

    //     return response()->download($file, 'Test File', $headers, 'inline');

    // }

    public function AddNote(Request $request){

         $uid = Auth::guard('web')->user()->id;

            
            $result =  Note::insertGetId([
                'user_id'=>$uid,
                'title'=>$request->title,
                'note'=>$request->note
            ]);

            if($result){

                return ['success'=>255,'id'=>$result];

            }

    }


    public function AddImages(Request $request){

            $uid = Auth::guard('web')->user()->id;
            $id = $request->id;
            $file = $request->file('FileKey');
            $fileName = uniqid().$file->getClientOriginalName();
            $file->move(public_path('upload/note_images'),$fileName);

            

            $location = 'upload/note_images/'.$fileName;

            $result =  NoteMultiImage::insert([
                'user_id'=>$uid,
                'note_id'=>$id,
                'multi_image'=>$location
            ]);

            if($result){

                return 200;
            }

            

    }

    public function GetNote(){



        $uid = Auth::guard('web')->user()->id;

        $arr = [];
        
        $noteData = Note::where('user_id',$uid)->orderBy('id', 'DESC')->get();

        
        foreach ($noteData as $value) {
            
            $multiImage = NoteMultiImage::where('note_id',$value->id)->orderBy('id', 'DESC')->get();

            $newArr = [
                'id'=>$value->id,
                'title'=>$value->title,
                'note'=>$value->note,
                'multiimage'=>$multiImage


            ];

            array_push($arr,$newArr);
        }

        return $arr;
       
        
    }


    public function DeleteNote(Request $request){

            $id =  $request->id;

            $getmultiImage = NoteMultiImage::where('note_id',$id)->get();

            $noteData = Note::where('id',$id)->delete();

            $multiImage = NoteMultiImage::where('note_id',$id)->delete();


             foreach ($getmultiImage as $value) {

                @unlink($value->multi_image);
            
            
                }


            return 255;


    }

    public function EdateNote(Request $request){

         $id =  $request->id;

         $getNote = Note::where('id',$id)->first();

    
        $multiImage = NoteMultiImage::where('note_id',$id)->get();

        $arr = [

            'note'=>$getNote,
            'noteimg'=>$multiImage
        ];

        return $arr;


    }

    public function UpdateNote(Request $request){



            $result = Note::where('id',$request->id)->update([

                'title'=>$request->title,
                'note'=>$request->note
            ]);

            return $result;


    }


    public function UpdateNoteImage(Request $request){

            $uid = Auth::guard('web')->user()->id;
            $id = $request->id;
            $file = $request->file('FileKey');
            $fileName = uniqid().$file->getClientOriginalName();
            $file->move(public_path('upload/note_images'),$fileName);
            $fileName = 'upload/note_images/'.$fileName;

            $result =  NoteMultiImage::insert([
                'user_id'=>$uid,
                'note_id'=>$id,
                'multi_image'=>$fileName
            ]);

            if($result){

                return 200;
            }


    }


    public function DeleteSingleImage(Request $request){

        $id =  $request->id;

        $noteid = NoteMultiImage::where('id',$id)->select('note_id','multi_image')->first();

        $multiImage = NoteMultiImage::where('id',$id)->delete();

        @unlink($noteid->multi_image);

        if($multiImage){

            return $noteid;
        }
    

    }




}
