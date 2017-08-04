@extends ('layouts.master')

@section ('content')

	<div class="col-sm-8">
		<h1>Sign In</h1>

		<form method="POST" action="{{ url('/login') }}">
			{{ csrf_field() }}
			
			<div class="form-group">
			<label for="email">Email: </label>
				<input type="email" name="email" id="email" class="form-control">
			</div>

			<div class="form-group">
				<label for="password">Password: </label>
				<input type="password" name="password" id="password" class="form-control">
			</div>

			<div class="form-group">

				<button type="submit" class="btn btn-primary">Sign in</button>

			</div>
			
		@include ('layouts.errors')
		</form>

	</div>

@endsection