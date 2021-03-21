<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Section;
use App\QuestionAnswer;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $sections = Section::get();
        return view('admin.section.sections')
        ->with('sections' , $sections);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.section.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $section = $request->validate([
         'title' => ['required']
         ]);

        Section::create($section);

        session()->flash('msg' , 's: section created successfully');
        return redirect(route('admin.sections.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Section $section)
    {
           return view('admin.section.show')
           ->with('section' , $section) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section)
    {
        return view('admin.section.edit')
        ->with('section' , $section);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Section $section ,Request $request)
    {
            
        $data = $request->validate([
        'title' => ['required']
        ]);
        $section->update($data);

         session()->flash('msg' , 's: section created successfully');
         return redirect()->back();
    }
     public function status(Section $section)
     {
     /*
     * تغيير حالة القسم
     */
     $section->closed_at = $section->closed_at == null ? date('Y-m-d H:i:s') : null ;

     $section->save();
     return redirect(route('admin.section.edit' , ['section' => $section->id]));
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
          $section->delete();
          session()->flash('msg' , 's: section deleted successfully ');
          return redirect(route('admin.sections.index'));
    }
       public function deleteAnswer(QuestionAnswer $answer)
       {
       $answer->delete();

       session()->flash('msg' , 's: answer deleted successfully');
       return redirect(route('admin.section.show' , ['section' => $answer->section_id]));
       }
}
