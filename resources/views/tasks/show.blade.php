@extends('layout.master')

@section('title')
  Task
@endsection

@section('styles')
  <link rel="stylesheet" href="/css/content.css">
@endsection

@section('content')
	<div class="container">
		<div class="group-item">
			@if(!$user->isTeacher())
				<button>
					<a href="{{ route('createsolution', $task->id) }}">Create solution</a>
				</button>
			@else
				<button type="button" class="btn btn-danger button-join">
					<a href="{{ route('deletetask', $task->id) }}">
						Remove task
					</a>
				</button>
			@endif

			<h2>
				Title: {{ $task->title }}
			</h2>
			
			<hr>

			<h3 class="audiofile">
				Audio:
			</h3>
			<form action="{{ route('getTaskFile', $task->id) }}" method="POST">
				{{ csrf_field() }}
				<input type="submit" value="download audio">
			</form>
			<br>
			<h3>
				Description: {{ $task->description }}
			</h3>

			<p class="group-meta">
				<strong>Teacher: {{ $task->teacher->user->name }}</strong>
			</p>

		</div>
	</div>
	
	
@endsection