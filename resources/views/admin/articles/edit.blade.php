@extends('admin::layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('Статьи')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($article, ['route' => ['admin.articles.update', $article->id], 'method' => 'patch', 'enctype' => 'multipart/form-data']) !!}

                        @include('admin.articles.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
