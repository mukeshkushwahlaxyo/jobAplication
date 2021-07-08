<div class="row">
	<div class="col-md-12 form-group"><h4 class="font-weight-bold">Basic Details</h4></div>
	</div>
	<div class="row">
		<div class="col-md-4 form-group error-div">
			<label for="name" class="required">Name</label>
			<input type="text" name="name" value="{{isset($data) ? $data->name : old('name')}}" class="form-control required" placeholder="Enter your name">
			@error('name')
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror	
		</div>
		<div class="col-md-4 form-group  error-div">
			<label for="email" class="required">Email</label>
			<input type="email" name="email" value="{{isset($data) ? $data->email :old('email')}}" class="form-control required" placeholder="Enter your email">
			@error('email')
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>
		<div class="col-md-4 form-group error-div">
			<label for="contact" class="required">Contact</label>
			<input type="text" name="contact" value="{{isset($data) ? $data->contact : old('contact')}}" class="form-control required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{isset($data) ? $data->contact : old('contact')}}" placeholder="Enter your contact number">
			@error('contact')
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 form-group error-div">
			<label for="gender" class="required">Gender</label>
			<select name="gender" class="form-control required">
				<option value="">Select Gender</option>
				@foreach(Gender() as $key => $gender)
					<option value="{{$key}}" {{isset($data) ? $data->gender === $key ? 'selected' : $key == old('gender') ? 'selected' : '':'' }}> {{$gender}}</option>
				@endforeach
			</select>
			@error('gender')
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>

		<div class="col-md-4 form-group error-div">
			<label for="address" class="required">Address</label>
			<input type="text" name="address" value="{{isset($data) ? $data->address : old('address')}}" class="form-control required" placeholder="Enter your address">
		</div>
		<div class="col-md-4 form-group error-div" >
			<label for="city_id" class="required">Location</label>
			<select name="city_id" class="form-control required">
				<option value="">Select Location</option>
				@foreach(City() as $c_key => $city)
					<option value="{{$c_key}}" {{isset($data) ? $data->city_id === $c_key ? 'selected' : $c_key == old('city_id') ? 'selected' : '':'' }}>{{$city}}</option>
				@endforeach
			</select>
			@error('city_id')
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>
	</div>
	<div class="row">
		<div class="col-md-4 form-group error-div">
			<label for="current_ctc" class="required">Current CTC</label>
			<input type="text" name="current_ctc" value="{{isset($data) ? $data->current_ctc : old('current_ctc')}}" class="form-control required"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter your current ctc">
			@error('current_ctc')
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>
		<div class="col-md-4 form-group error-div">
			<label for="expected_ctc" class="required">Expected CTC</label>
			<input type="text" name="expected_ctc" value="{{isset($data) ? $data->expected_ctc : old('expected_ctc')}}" class="form-control required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter your expected ctc">
			@error('expected_ctc')
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>
		<div class="col-md-4 form-group error-div">
			<label for="notice_period" class="required">Notice Period <span class="text-muted">(In Days)</span></label>
			<input type="text" name="notice_period" value="{{isset($data) ? $data->notice_period : old('notice_period')}}" class="form-control required" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" placeholder="Enter your notice period in days">
			@error('notice_period')
                <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 form-group"><h4 class="font-weight-bold">Education Details</h4></div>
	</div>
	
	<div class="row">
		<div class="col-md-12 form-group">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Eduation Name</th>
						<th>Board University</th>
						<th>Year</th>
						<th>CGPA/Percentage</th>
					</tr>
				</thead>
				<tbody>
				@php $count = 0; @endphp
					@foreach(Eductaion() as $edu_key => $education )
						<tr>
							<td>
								<input type="text"  readonly="readonly" name="eduName[]" value="{{$edu_key}}" class="form-control">
							</td>
							<td>
								<input type="text" name="board[]" value="{{isset($data) ? $data->educations[$count]->board:''}}" class="form-control" placeholder="Enter board/university name">
							</td>
							<td>
								<input type="text"  name="year[]" value="{{isset($data) ? $data->educations[$count]->year:''}}" class="form-control"  oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');">
							</td>
							<td>
								<input type="text"  name="percent[]" value="{{isset($data) ? $data->educations[0]->percent:''}}" class="form-control"  oninput="this.value = this.value.replace(/[^0-9|.]/g, '').replace(/(\..*)\./g, '$1');" data>
							</td>
						</tr>
						@php $count++; @endphp
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-md-12 form-group"><h4 class="font-weight-bold">Work Experience</h4></div>
	</div>
	<div class="row">
		<div class="col-md-12 form-group">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="required">Company Name</th>
						<th class="required">Designation</th>
						<th class="required">From</th>
						<th class="required">To</th>
						<th></th>
					</tr>
				</thead>
				<tbody id="expBody">
					@if(isset($data))
						@foreach($data->experiences as $exKey =>  $experience)
							<tr id="row{{$exKey}}">
								<td class="error-di form-group">
									<input type="text" name="company[]" value="{{$experience->company}}" class="form-control" placeholder="Enter company name">
								</td>
								<td class="error-di form-group">
									<input type="text" name="designation[]" value="{{$experience->designation}}" class="form-control" placeholder="Enter designation">
								</td>
								<td class="error-di form-group">
									<input type="text" name="from[]" value="{{date('Y-m-d',strtotime($experience->from))}}" class="form-control datepicker" placeholder="Enter from date" data-date-format="yyyy-mm-dd">
								</td>
								<td class="error-di form-group">
									<input type="text" name="to[]" value="{{date('Y-m-d',strtotime($experience->to))}}" class="form-control datepicker" placeholder="Enter to date" data-date-format="yyyy-mm-dd">
								</td>
								<td class="error-di form-group">
									@if($exKey != 0)
										<a href="javascript:void(0)" class="btn btn-sm btn-danger removeBtn" id="{{$exKey}}"><i class="fa fa-minus"></i></a>
									@else
									<a href="javascript:void(0)" class="btn btn-sm btn-success" id="addMore"><i class="fa fa-plus"></i></a>
									@endif
								</td>
							</tr>
							@endforeach
					@else
						<tr id="row0">
							<td class="error-di form-group">
								<input type="text" name="company[]" value="" class="form-control" placeholder="Enter company name"	>
							</td>
							<td  class="error-di form-group">
								<input type="text" name="designation[]" value="" class="form-control" placeholder="Enter designation">
							</td>
							<td  class="error-di form-group">
								<input type="text" name="from[]" value="" class="form-control datepicker" placeholder="Enter from date" data-date-format="yyyy-mm-dd">
							</td>
							<td  class="error-di form-group">
								<input type="text" name="to[]" value="" class="form-control datepicker" placeholder="Enter to date" data-date-format="yyyy-mm-dd">
							</td>
							<td  class="error-di form-group">
								<a href="javascript:void(0)" class="btn btn-sm btn-success" id="addMore"><i class="fa fa-plus"></i></a>
							</td>
						</tr>
					@endif	
				</tbody>
			</table>
		</div>
	</div>

	<hr>
	<div class="row">
		<div class="col-md-12 form-group"><h4 class="font-weight-bold">Language Known</h4></div>
	</div>
	@foreach(Languages() as $l_key => $language)
		<div class="row">
			<div class="col-md-3 form-group">
				<input {{ isset($data) ? count(collect($data->languages)->where('langName',$l_key)) !=0 ? 'checked="checked"' : '':'' }} type="checkbox" name="langName[]" value="{{$l_key}}" class="checkBoxChange" id="{{$l_key}}"> {{$language}}
			</div>
			@foreach(LanOptions() as $lq_key => $languageOption)
			<div class="col-md-2 form-group">
				<input type="checkbox" name="{{$l_key}}[]" value="{{$lq_key}}" class="answer_{{$l_key}}" 
				@if(isset($data))
					@forelse (collect($data->languages)->where('langName',$l_key) as $option)
					   {{$option->answer == $lq_key ? 'checked="checked"' : '' }}
					@empty
					 disabled="disabled"
					@endforelse 
				@else
					disabled="disabled"
				@endif		
					> {{$languageOption}}
			</div>							
			@endforeach
		</div>
	@endforeach
	<hr>
	<div class="row">
		<div class="col-md-12 form-group"><h4 class="font-weight-bold">Technical Experience</h4></div>
	</div>
	@php $tec = 0; @endphp
	@foreach(Skils() as $te_key => $technical)
		<div class="row">
			<div class="col-md-3 form-group">
				<input {{isset($data) ? $data->technicals[$tec]->techName === $te_key ? 'checked' : '':''}} type="checkbox" name="techName[]" value="{{$te_key}}" class="checkBoxChange"> {{$technical}}
			</div>
			@foreach(SkilsOption() as $tq_key => $technicalOption)
			<div class="col-md-2 form-group">
				<input type="radio" name="{{$te_key}}" {{isset($data) ? $data->technicals[$tec]->answer === $tq_key ? 'checked' : '':''}} value="{{$tq_key}}" class="answer_{{$te_key}}" disabled="disabled"> {{$technicalOption}}
			</div>							
			@endforeach
		</div>
	@php $tec++; @endphp
	@endforeach