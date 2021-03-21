<?php

namespace App\Http\Controllers\Admin;
use App\FeildType;
use App\Question;
use App\Section;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Section $section)
    {
        $feild_types = FeildType::get();
        return view('admin.question.create')
        ->with('section' , $section)
        ->with('feild_types', $feild_types);
     }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Section $section , Question $question ,Request $request)
    {
          $request['section_id'] = $request['section_id'] ?? $section->id ;
          $data = $request->validate([
          'title' => ['required'],
          'section_id' => ['required'],
          'feild_type_id' => ['required'],
          ]);

          Question::create($data);

          session()->flash('msg' , 's: Question created successfully');
          return redirect(route('admin.section.edit' , ['section' => $section->id]))
          ->with('section' , $section);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Section $section , Question $question)
    {
         $feild_types = FeildType::get();
         return view('admin.question.edit')
         ->with("section" , $section)
         ->with('question' , $question)
         ->with('feild_types' , $feild_types);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Section $section , Question $question ,Request $request)
    {
           $request['section_id'] = $request['section_id'] ?? $section->id ;
           $data = $request->validate([
           'title' => ['required'] ,
           'section_id' => ['required'] ,
           'feild_type_id' => ['required'] ,
           ]);
           $question->update($data);
           session()->flash('msg' , 's: Question updated successfully');
           return redirect(route('admin.section.edit' , ['section' => $section->id]))
           ->with('section' , $section);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section , Question $question)
    {
        $question->delete();
        session()->flash('msg' , 's: Question deleted successfully ');
        return redirect(route('admin.section.edit' , ['section' => $section->id]))
        ->with('section' , $section);
    }
}
