@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div id="app">
                    <div class="panel-heading">Tasks</div>

                    <div class="panel-body">
                        <ul v-for="task in tasks">
                            <li> @{{ task.task }} <button @click="removeTask(task.id)" class="pull-right"> Delete </button> </li>
                        </ul>

                        <hr />

                        <input v-model="newTask" style="width:70%" /> <button @click="addTask" class="pull-right"> Add Task </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
