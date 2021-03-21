@extends('layouts.admin')
@section('content')

     {{-- <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.sections.index") }}">
                الرجوع للقسم 
            </a>
        </div>
    </div> --}}
    <div class="card-header">
       <a class="btn btn-success" href="{{ route("admin.sections.index") }}">
                الرجوع للإقسام 
        </a>
         <a href="{{ route('admin.section.status' , ['section' => $section->id] ) }}">
            {{-- <button
                    class="bg-{{ $section->closed_at == null ? "red" : "green"}}-500 hover:bg-{{ $section->closed_at == null ? "red" : "green"}}-700 text-white font-bold py-2 px-5 mt-4 mx-4  rounded-full">
                {{ $section->closed_at == null ? __('Dashboard.Close') : __('Dashboard.Open')}}
            </button> --}}
            <button 
              class="bg-{{ $section->closed_at == null ? "red" : "green"}}
              -500 hover:bg-{{ $section->closed_at == null ? "red" : "green"}}
              -700 text-white font-bold btn btn-outline-primary rounded-full">
                 {{ $section->closed_at == null ? __('إيقاف') : __('تشغيل')}}
             </button>
       </a>
    </div>
    
    <div class="card-header">
    
        <form method="POST" action="{{ route('admin.section.update' , ['section' => $section->id]) }}">
            @csrf
            <div class="form-group">
                <label class="required" for="title">إسم القسم</label>
                <input class="form-control" type="text" name="title" id="title"
                 value="{{ old('title')?? $section->title }}">
               
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    حفظ
                </button>
            </div>
        </form>
    </div>
</div>

     <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
         
        </div>
    </div>
    

<div class="card-body">
     <div class="card-header">
      <a class="btn btn-primary" href="{{ route('admin.question.create' , ['section' => $section->id]) }}">
               إضافة سؤال
            </a>
    </div>
        <div class="table-responsive mt-2">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                 <thead class="thead-dark">
                    <tr>
                       <th class=" px-4 py-2">Title</th>
                        <th class="px-4 py-2">Create At</th>
                        <th class="px-4 py-2">Feild Type</th>
                        <th class="px-4 py-2"></th>
                    </tr>
                 </thead>
            
                <tbody>
                   @foreach($section->questions as $question)
                                <tr>
                                    <td class="border px-12 py-2">{{ $question->title }}</td>
                                    <td class="border px-12 py-2">{{ $question->created_at }}</td>
                                    <td class="border px-12 py-2">{{ $question->feialdType->type }}</td>
                                    <td class="border px-3 py-2">
                                        <a href="{{ route('admin.question.edit' , ['section' => $section->id , 'question' => $question->id ]) }}">
                                            <button
                                                    class="hover:bg-green-700 text-white font-bold py-2 px-2 rounded-full">
                                                <img src="https://img.icons8.com/dusk/30/000000/change.png"/>
                                            </button>
                                        </a>
                                        <a href="{{ route('admin.question.delete' , ['section' => $section->id , 'question' => $question->id ]) }}" >
                                            <button onclick='return confirm("Are you sure??")' type="submit"
                                                    class="hover:bg-red-700 text-white font-bold py-2 px-2 rounded-full">
                                                <img src="https://img.icons8.com/color/30/000000/delete-forever.png"/>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection