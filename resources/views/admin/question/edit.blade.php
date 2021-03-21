@extends('layouts.admin')
@section('content')
<div class="col-lg-12">
            <a class="btn btn-dark" href="{{ route('admin.section.edit' , ['section' => $section->id]) }}">
                الرجوع للقسم
            </a>
        </div>
    </div>
    <div class="container">
        
        <div class="row mt-5">
            <div class="col-12 offset-2 mt-8">
                <div class="card">
                    <div class="card-header bg-info">
                        <h3 class="text-white">تعديل السؤال</h3>
                    </div>
                    <div class="card-body">
                    
                       <form method="POST" action="{{ route('admin.question.update' , ['section' => $section->id , 'question' => $question->id]) }}">
                        @csrf
                        @method('POST')
                            <div class="form-group">
                                <label>عنوان السؤال:</label>
                                <input type="text" name="title"  value="{{ old('title')?? $question->title }}"
                                 class="form-control" placeholder="عنوان السؤال">
                            </div>
                   
                            <div class="form-group">
                                <label>نوع السؤال:</label>
                                 <select class="form-control" name="feild_type_id" id="exampleFormControlSelect1">
                                    @foreach($feild_types as $type)
                                       <option value="{{ $type->id }}">{{ $type->type }}</option>
                                    @endforeach
                                </select>
                            </div>
                   
                            <div class="form-group text-center">
                                <button class="btn btn-success btn-submit">حفظ</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection