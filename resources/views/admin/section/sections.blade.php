@extends('layouts.admin')
@section('content')
 <div style="margin-bottom: 10px;" class="row">
        {{-- <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.section-create") }}">
                إضافة قسم جديد
            </a>
        </div> --}}
    </div>
    @can('create_section')
        <div class="card-header">
             <a class="btn btn-success" href="{{ route("admin.section-create") }}">
                إضافة قسم جديد
            </a>
        </div>
    @endcan
 <div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th class="px-2 py-2">Title</th>
                        <th class="px-2 py-2"style="width: 10%">Create At</th>
                        <th class="px-2 py-2"style="width: 6%">Closed At</th>
                        <th class="px-2 py-2"style="width: 4%">Count</th>
                        <th class="px-2 py-2">Link</th>
                        <th class="" style="width: 15%">Action </th>
                    </tr>
                </thead>
                <tbody>
               @foreach($sections as $section)
                                <tr>
                                    <td class="border px-4 py-2">{{ $section->title }}</td>
                                    <td class="border px-4 py-2">{{ $section->created_at }}</td>
                                    <td class="border px-4 py-2">{{ $section->closed_at ?? "active" }}</td>
                                    <td class="border px-4 py-2">{{ count($section->questionAnswers)  }}</td>
                                    <td class="border text-blue-700 px-4 py-2"><a href="{{ route('admin.questionnaire.show' , ['section' => $section->title]) }}" target="_blank">{{ route('admin.questionnaire.show' , ['section' => $section->title]) }}</a></td>
                                    <td class="border px-3 py-2">
                                        @can('edit_section')
                                            <a href="{{ route('admin.section.edit' , ['section' => $section->id]) }}">
                                            <button

                                                    class="hover:bg-green-700 text-white font-bold py-2 px-2 rounded-full">
                                                <img src="https://img.icons8.com/dusk/30/000000/change.png"/>
                                            </button>
                                            </a>
                                        @endcan
                                        @can('delete_section')
                                            <a href="{{ route('admin.section.delete' , ['section' => $section->id]) }}">
                                                <button onclick='return confirm("Are you sure??")' type="submit"
                                                        class="hover:bg-red-700 text-white font-bold py-2 px-3 rounded-full">
                                                    <img src="https://img.icons8.com/color/30/000000/delete-forever.png"/>
                                                </button>
                                            </a> 
                                        @endcan
                                        @can('show_data')
                                            <a href="{{ route('admin.section.show' , ['section' => $section->id]) }}">
                                                <button
                                                        class="hover:bg-gray-700 text-white font-bold py-2 px-3 rounded-full">
                                                    <img src="https://img.icons8.com/dusk/30/000000/survey.png"/>

                                                </button>
                                            </a>
                                        @endcan
                                           {{-- <a href="{{ route('admin.questionnaire.show' , ['section' => $section->title]) }}" target="_blank">
                                            <button
                                                   class="hover:bg-blue-700 text-white font-bold py-2 px-3 rounded-full">
                                                  <img src="https://img.icons8.com/officel/30/000000/visible.png"/>                              
                                            </button>
                                            </a> --}}
                                    </td>
                                </tr>
                            @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection