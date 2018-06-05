@extends('layouts.TDhome')

@section('content')
    <h1>Edit Mission:</h1><br>
    {!! Form::model($todo,['method'=>'PUT','action'=>['ToDoController@update',$todo->id]]) !!}
        {!! Form::token() !!}
        <input type="text" name="todo" value="{{$todo->todo}}" class="col-lg-10"> <br><br>
        {!! Form::submit('Update',['class'=>'btn btn-light']) !!}
    {!! Form::close() !!}

     @if(count($errors)>0)

             <div class="alert alert-danger">
                 @foreach($errors->all() as $error)
                     <ul>
                         <li>{{$error}}</li>
                     </ul>
                 @endforeach
             </div>
         @endif

@stop