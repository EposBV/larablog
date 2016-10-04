@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Todo list</div>

                <div class="panel-body">
                    <h2> Todo list! <small>(<a href='/newTask'>New task</a>)</small></h2>

                    <ul class="items">
                        @foreach ($useritems as $useritem)
                        <li>
                            {{ Form::open() }}
                            <div class="itemrow">
                                <input
                                    onclick="this.form.submit();"
                                    type="checkbox" 
                                    {{ $useritem->done ? "checked=checked" : '' }} 
                                />
                                <input type="hidden" name="id"  value="{{ $useritem->id }}" />
                                <span {{ $useritem->done ? "class=checked" : '' }} >{{ $useritem->task }}</span>
                            </div>
                            
                            @if ($useritem->done_at !== NULL)
                            <small class="donedate">{{date('d-m-y H:i', strtotime($useritem->done_at)) }}</small>
                            @endif
                            <small class="edittask"><a href="/editTask/{{$useritem->id}}")>edit</a></small>
                            <small class="deletetask"><a href="/deleteTask/{{$useritem->id}}">x</a></small>
                            {{ Form::close() }}
                        </li>
                        @endforeach
                    </ul>
                    </form> 

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
