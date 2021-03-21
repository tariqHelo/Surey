<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;
use App\SectionExcel;
// use Maatwebsite\Excel\Excel;
use ZipStream\File;

class ExceleController extends Controller
{
     public function storeExcel(Section $section)
     {

     return \Excel::download(new SectionExcel($section), 'invoices.xlsx');

     // \Maatwebsite\Excel\Facades\Excel::store(new SectionExcel($section),
     //  "public/sections/$section->title.xlsx");
     // session()->flash('msg' , 's: file updated successfully');
     // return redirect(route('admin.section.show' , ['section' => $section->id]));
     }
     public function downloadFile($section_file_name)
     {
     try {
          return response()->download("storage/sections/$section_file_name.xlsx");
          return "thank you " ;
          }
               catch (\Exception $e){
               abort(404);
          }
     }
}
