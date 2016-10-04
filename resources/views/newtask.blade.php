@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (isset($task))
                    <h2>Edit Task</h2>
                    
                    @else
                    <h2>New Task</h2>
                    @endif

                    
                    @foreach ($errors->all() as $error)
                    
                    <p class='alert alert-danger'>{{$error}}</p>
                    @endforeach
                    
                    {{ Form::open() }}
                    
                    <input type="hidden" name="taskid" value="{{$task->id or '-1'}}">
                    
                    <input type="test" class='form-control' name='task' id='task' value="{{$task->task or ''}}" />
                    <br>
                    <input type='submit' class='btn btn-primary' value='Save' />
                    {{ Form::close() }}
                    @stop

                </div>
            </div>
        </div>
    </div>
</div>

