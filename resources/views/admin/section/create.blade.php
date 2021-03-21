@extends('layouts.admin')
@section('content')
 <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route("admin.sections.index") }}">
                الرجوع للإقسام 
            </a>
        </div>
    </div>
   <div class="card">
    <div class="card-header">
       
    </div>

    <div class="card-body">

        <form method="POST" action="{{ route('admin.sections.store') }}">
            @csrf
            <div class="form-group">
                <label class="required" for="title">إسم القسم</label>
                <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}" required>
               
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>




    {{-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <a href="">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-5 mt-4 mx-4  rounded-full">
                        {{ __('Dashboard.Back to Sections') }}
                    </button>
                </a>

                    <form class="py-12 mr-1/4" action="" method="POST">
                        @method('POST')
                        @csrf
                        <div class="md:items-center mb-6">
                            <div class="md:w-1/3">
                                <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4"
                                       for="inline-full-name">
                                    {{ __('Dashboard.Title') }}
                                </label>
                            </div>
                            <div class="md:w-2/3">
                                <input
                                    class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                                    id="inline-full-name" type="text" placeholder="section title" name="title">
                            </div>
                        </div>

                        <div class="md:flex md:items-center">
                            <div class="md:w-1/3"></div>
                            <div class="md:w-2/3">
                                <button
                                    class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                                    type="submit">
                                    save
                                </button>
                            </div>
                        </div>
                    </form>

            </div>
        </div>
    </div> --}}
@endsection