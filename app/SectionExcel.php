<?php


namespace App;


use App\Section;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;



// class SectionExcel implements FromCollection , WithHeadings
class SectionExcel implements FromView
{

    protected $section ;
    public $columns = [];
    public function __construct(Section $section)
    {
        $this->section = $section ;
    }

    public function view(): View
    {

        $keys = [];
        $section = $this->section;
        foreach($section->questions as $value):
            array_push($keys , $value->title);
        endforeach;
        
        return view('exports.answers', [
            'keys'  =>  $keys,
            'section' => $this->section
        ]);
    }

    /*
    protected $section ;
    public $columns = [];
    public function __construct(Section $section)
    {
        $this->section = $section ;
    }

    public function collection()
    {
        $keys = collect();
        $temp = [];
        foreach($this->section->questionAnswers as $answer){
        //  $keys->push(json_decode($answer->value));
            $answers = json_decode($answer->value);

            foreach($this->columns as $k => $c): 
                $temp[$k] = $c;
                // array_push($keys , $answers->{$c});
            endforeach;
            $keys->push($temp);
        }
         // dd($keys);
        return $keys;
    }
    public function headings(): array
    {
        // TODO: Implement headings() method.
        $columns = [] ;
        foreach ($this->section->questions as $question){
            $columns = array_merge($columns , [$question->title]) ;
            array_push($this->columns , $question->title);
        }
        return $columns;
        // dd($columns);  




    }
    */
}
