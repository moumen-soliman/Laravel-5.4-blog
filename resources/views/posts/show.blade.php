@extends ('layouts.master')

@section ('content')

	<div class="col-sm-8 blog-main">

		<h1>{{ $post->title }}</h1>

		{{ $post->body }}


		<div class="comments">
			<ul class="list-group"> 
				@foreach ($post->comments as $comment)
					<li class="list-group-item">
						<strong></strong>
						{{$comment->body}}
					</li>
				@endforeach
			</ul>
		</div>
		<hr>
		<!-- Add a Comment -->
		<div class="card">
			<div class="card-block">
				<form method="POST" action="{{ url('/posts/comments/') }}/{{$post->id}}">
				{{ csrf_field() }}

					<div class="form-group">
						<textarea name="body" placeholder="Your Comment here" class="form-control" required=""></textarea>
					</div>

					<div class="form-group">

						<button type="submit" class="btn btn-primary">Add Comment</button>

					</div>

				</form>

				@include ('layouts.errors')
			</div>
		</div>

	</div>

@endsection