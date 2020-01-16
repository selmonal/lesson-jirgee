@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        	<div class="card">
        		<div class="card-header">
        			Profile Settings
        		</div>

        		<div class="card-body">
					<form action="{{ url('settings/profile/update-image') }}" method="POST" enctype="multipart/form-data">
						@csrf

						<div class="form-group">
							<label for="exampleFormControlFile1">Update profile image</label>
							<input type="file" name="image" class="form-control-file">
						</div>

						<button type="submit" class="btn btn-primary">Update</button>
					</form>
        		</div>
        	</div>
        </div>
    </div>
</div>
@endsection