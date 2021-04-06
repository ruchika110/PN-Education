@extends('front.master')

@section("title",'Courses | PN Infosys Edu.')

@section('content')

<div class="row">
	<div class="col-md-4"></div>
			<div class="col-md-4">
				<br><br>
<form method="post" action="{{url('front/login_save')}}">
	@csrf

	Email:
	<input class="form-control" type="text" name="email" placeholder="Enter Email">
	<br>

	Password:
	<input class="form-control" type="text" name="password" placeholder="Password">
	<br>

	<input class="btn btn-success" type="submit" name="submit" value="Login">
	<br><br>
</form>

<input class="btn btn-success" type="submit" name="submit" value="Create an Account">
	<br><br>
</div><!-----end col-md-4----->
<div class="col-md-4"></div>
</div><!-----end row----->

@endsection