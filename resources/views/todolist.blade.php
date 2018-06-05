@extends('layouts.TDhome')

@section('content')



    {!! Form::open(['method'=>'POST','action'=>'ToDoController@store']) !!}

        {!! Form::token() !!}
        <div class="form-group">
        {!! Form::text('todo',null,['class'=>'form-control','required','placeholder'=>'create new to do']) !!}<br>

        </div>
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

    @if(count($dos)>0)

    <table class="table table-hover">
      <thead class="table-dark">
        <tr>
          <th scope="col"></th>
          <th scope="col"></th>

            <th scope="col"></th>

            <th scope="col"></th>
            <th scope="col">Added</th>
            <th scope="col">Updated</th>
            <th scope="col"></th>
        </tr>
      </thead>
        @foreach($dos as $do)
          <tbody>
            <tr>
              <th scope="row">-</th>
              <td><h5>{{$do->todo}}</h5></td>
                <td>
                    @if($do->completed == 0)
                        {!! Form::model($do,['method'=>'PUT','action'=>['ToDoController@update',$do->id]]) !!}
                        {!! Form::token() !!}
                           <input type="hidden" name="completed" value="1">
                           {!! Form::submit('check',['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    @else
                        {!! Form::model($do,['method'=>'PUT','action'=>['ToDoController@update',$do->id]]) !!}
                        {!! Form::token() !!}
                            <input type="hidden" name="completed" value="0">
                    {{--اسم ال الفيلد المخفى اسمه لازم يكون نفس اسم العمود--}}
                          {!! Form::submit('Completed!',['class'=>'btn btn-success']) !!}
                        {!! Form::close() !!}
                    @endif
                </td>
                <td>
                    {!! Form::model($do,['method'=>'GET','action'=>['ToDoController@edit',$do->id]]) !!}
                        {!! Form::token() !!}
                        {!! Form::submit('Update',['class'=>'btn btn-light']) !!}
                    {!! Form::close() !!}
                </td>
                <td>{{$do->created_at ? $do->created_at->diffForHumans() : ' No date'}}</td>
                <td>{{$do->updated_at ? $do->updated_at->diffForHumans() : ' No date'}}</td>
                <td>
                    {!! Form::model($do,['method'=>'DELETE','action'=>['ToDoController@destroy',$do->id]]) !!}
                    {!! Form::token() !!}
                    {!! Form::submit('X',['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
          </tbody>
        @endforeach
    </table>
        @else
        <div class="alert alert-light"><h1 align="center">Create your first todo. </h1></div>
    @endif


@stop