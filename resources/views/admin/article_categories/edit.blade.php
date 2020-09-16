@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Article Category
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($articleCategory, ['route' => ['admin.article-categories.update', $articleCategory->id], 'method' => 'patch']) !!}

                        @include('admin.article_categories.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
