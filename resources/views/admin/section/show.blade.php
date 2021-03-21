@extends('layouts.admin')
@section('content')
@include('layouts.msg')
<div class="col">
            <div class="">
                <a href="{{ route("admin.sections.index") }}">
                    <button  class="btn btn-lg btn-danger" >back to sections</button>
                </a>
                <a href="{{ url('file/'.$section->id ) }}">
                    <button
                        class="btn btn-lg btn-success">
                           download excel file
                    </button>
                </a>
                {{-- <a href="{{ url('/download/file/'.$section->title ) }}">
                    <button
                       class="btn btn-lg btn-success">
                           download excel file
                    </button>
                </a> --}}
            </div>

    <div class="card-body">
        @if(count($section->questionAnswers) > 0)
            <div class="table table-striped">
                <table class="table">
                    <thead >
                    <tr>
                        @php $keys = []; @endphp
                        @foreach($section->questions as $value)
                        <th class="thead-dark">{{ $value->title }}</th>
                        @php array_push($keys , $value->title); @endphp
                        @endforeach
                    </tr>
                    </thead>
                    <tbody class="px-12">
                        @foreach($section->questionAnswers as  $answer)
                            <tr>
                            @php $answers = json_decode($answer->value); @endphp
                            @foreach($keys as $key)
                                <td class="border px-12 py-2">
                                    {{ $answers->{$key} }}
                                </td>
                            @endforeach
                                <td class="border px-12 py-2">
                                    <a href="{{ route('admin.questionanswer.delete' , ['answer' => $answer->id ]) }}" >
                                        <button onclick='return confirm("Are you sure??")' type="submit"
                                                class="hover:bg-red-700 text-white font-bold py-2 px-2 rounded-full">
                                            <img src="https://img.icons8.com/color/30/000000/delete-forever.png"/>
                                        </button>
                                    </a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-danger mx-5 my-5 border border-red-400 text-red-700 px-4 py-3 rounded relative "
                    role="alert">
                <strong class="font-bold">Opss !!</strong>
                <span class="block sm:inline">we havent any section to show here , you can create new section</span>
            </div>
        @endif
  </div>

</div>
   
@endsection

{{-- 
{
    "سكنك": "غزة",
    "الجنس": "Fmail",
    "كم عمرك": "12",
    "الإيميل": "tariq.@gmail.com",
    "هل تحب التطوع": "لا",
    "تاريخ الميلاد": "1994-12-04",
    "مستوي التعليم": "جامعي",
    "هل تبحث عن عمل": "لا",
    "مجال تخصصك الدراسي": "صحيح",
    "هل تحب العمل الدراسي": "أكيد"
} --}}