@extends ('layouts.master')

@section ('content')
   
   <div class="col-sm-8 blog-main">


	<h1> Publish a post</h1>

	<hr>

	<form method="POST" action="{{ url('posts')}}">

		{{ csrf_field() }} <!-- default to add in any form -->

		<div class="form-group">

		  <label for="title">Title</label>

		  <input type="text" class="form-control" id="title" placeholder="" name="title" >

		</div>

		<div class="form-group">

		  <label for="body">body</label>

		  <textarea id="body" name="body" class="form-control"></textarea>
		</div>

		<div class="form-group">

			<button type="submit" class="btn btn-primary">Publish</button>

		</div>

		@include ('layouts.errors')

	</form>



   </div>

@endsection