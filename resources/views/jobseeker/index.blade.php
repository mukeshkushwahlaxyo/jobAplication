<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Job Application Form') }}
        </h2>
    </x-slot>

<div class="container mt-5 py-12">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">Job Application Form</div>
				<div class="card-body">
					<table class="table table-bordered" id="jobTable">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Contact</th>
								<th>Gender</th>
								<th>Address</th>
								<th>Location</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							@php $count = 1; @endphp
							@foreach($jobs as $job)
								<tr>
									<td>{{$count++}}</td>
									<td>{{$job->name}}</td>
									<td>{{$job->email}}</td>
									<td>{{$job->contact}}</td>
									<td>{{$job->address}}</td>
									<td>{{Gender()[$job->gender]}}</td>
									<td>{{City()[$job->city_id]}}</td>
									<td>
										<a href="{{route('jobapplication.show',$job->jobSeekerId)}}" class="mr-2"><i class="fa fa-eye text-info" ></i></a>
									
										<a href="{{route('jobapplication.edit',$job->jobSeekerId)}}" class="mr-2"><i class="fa fa-edit text-success" ></i></a>
										
										<a href="{{route('jobapplication.delete',$job->jobSeekerId)}}" class="" onclick="return confirm('Are you sure?')"><i class="fa fa-trash text-danger" ></i></a>
										
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#jobTable').DataTable();	
	  

	  @if($message = Session::get('success'))
	  		alert("{{$message}}");
	  @endif 
	});
</script>
</x-app-layout>
