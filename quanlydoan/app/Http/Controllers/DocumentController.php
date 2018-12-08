<?php


namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Student;
use App\GroupStudent;
use App\Group;
use App\Document;
use DateTime;
use Validator;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class DocumentController extends Controller
{   

    public function getDocument($id_group) {
        #$id_group = $request->get('id_group');

        $studentDocuments = DB::table('group')->join('document', 'group.id_group', '=', 'document.id_group')->join('user','document.user_upload','=','user.username')
                        ->select('document.id_document','document.path', 'document.evaluate', 'user.full_name', 'document.created_at')
                        ->where('group.id_group', '=', $id_group)->where('user.position','=',1)->get();

        $teacherDocuments = DB::table('group')->join('document', 'group.id_group', '=', 'document.id_group')->join('user','document.user_upload','=','user.username')
                        ->select('document.id_document','document.path', 'document.evaluate', 'user.full_name', 'document.created_at')
                        ->where('group.id_group', '=', $id_group)->where('user.position','=',2)->get();  
                        
        $project = DB::table('group')->join('teacher', 'group.id_teacher', '=', 'teacher.id_teacher')
                        ->join('user', 'user.username', '=', 'teacher.username')
                        ->select('group.*', 'user.full_name')
                        ->where('group.id_group', '=', $id_group)->first();
                        #print($project);
        if(Auth::user()->position==1)                
           return view('student.document', ['project'=>$project,'studentDocuments'=> $studentDocuments,'teacherDocuments'=> $teacherDocuments]);
        elseif(Auth::user()->position==2)                
         return view('teacher.document', ['project'=>$project,'studentDocuments'=> $studentDocuments,'teacherDocuments'=> $teacherDocuments]);
    } 

    public function uploadFile(Request $request,$id_group) {
        $id_group = $id_group;
        if(Auth::user()->position==1){
           $path = '../app/public/filemanager/'.$id_group.'/student/';
           $destination_path = storage_path('../app/public/filemanager/'.$id_group.'/student');
        }
        elseif(Auth::user()->position==2){
           $path = '../app/public/filemanager/'.$id_group.'/teacher/';
           $destination_path = storage_path('../app/public/filemanager/'.$id_group.'/teacher');
        }


        $file = $request->file('file');
       
        $validator = Validator::make(
            #private $document_ext = ['doc', 'docx', 'pdf', 'odt'];
                        [
                            'file' => $file,
                            'extension' => Str::lower($file->getClientOriginalExtension()),
                        ],
                        [
                            'file' => 'required|max:100000',
                            'extension' => 'required|in:doc,docx,zip,rar,pdf,rtf,xlsx,xls,txt, csv'
                        ]
                    );

            if($validator->passes()){
                $filename = $file->getClientOriginalName();
                $filenamenoext = pathinfo($filename, PATHINFO_FILENAME);
                $extension = pathinfo($filename, PATHINFO_EXTENSION);
                

                $count = 0;
                #$document=Document::where('path',$path.$filename)->get();
                while(Document::where('path',$path.$filename)->get()->count() > 0){
                    $count++;
                    $filename = $filenamenoext.'('.$count.').'.$extension;

                }
                $upload_success = $file->move($destination_path, $filename);
                if ($upload_success) {
                        #if needed, save to your table
                        #['id_group', 'path', 'evaluate', 'user_upload', 'create_at']
                        
                        $document = new Document();
                        $document->id_group = $id_group;
                        $document->path = $path.$filename;
                        $document->user_upload =Auth::user()->username;
                        $document->evaluate =0;
                        $document->created_at = new DateTime();
                        $document->save();
                        print($document);
                        return;
                        $data = array(
                            "id_document" => $document->id_document,
                            "path"=>$document->path,
                            "user_upload"=> $document->user_upload,
                            "created_at"=> $document->created_at,
                        );
                        echo json_encode($data);
                        
                }
            }else{
               
            $data = array(
                "error" => $validator->errors()->all()
            );
            
            echo json_encode($data);
        }
            }
        
      
           




    public function downloadFile($id_group,$id_document)
    {  
        $document = Document::where('id_document',$id_document)->first();
        #$file_path = storage_path('') . "/" . $filename;
        return Response::download($document->path);
    }

    
    public function deleteFile($id_group,$id_document){
        $document = Document::where('id_document',$id_document)->first();
        $result = Storage::delete($document->path);
        Document::where('id_document',$id_document)->delete();
        print $result;
        return;

        

    }


}
