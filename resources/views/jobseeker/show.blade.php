<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Show Job Application Form') }}
        </h2>
    </x-slot>

	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">Application Form
						<a href="{{route('jobapplication.index')}}" class="btn btn-sm btn-primary pull-right"> Back</a>
					</div>
					<div class="card-body">
						
							<div class="row">
								<div class="col-md-12 form-group"><h4 class="font-weight-bold">Basic Details</h4></div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label for="name">Name</label>

									<input type="text" name="name" value="{{old('name') ?? $job->name}}" class="form-control" placeholder="Enter your name" readonly="readonly">
									@error('name')
	                                    <span class="invalid-feedback d-block" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-md-4 form-group">
									<label for="email">Email</label>
									<input type="email" name="email" value="{{old('email') ?? $job->email}}" class="form-control" placeholder="Enter your email"  readonly="readonly">
									@error('email')
	                                    <span class="invalid-feedback d-block" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-md-4 form-group">
									<label for="contact">Contact</label>
									<input type="text" name="contact" value="{{old('contact') ?? $job->contact}}" class="form-control" oninput="this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*)\./g, '$1');" value="{{old('contact')}}" placeholder="Enter your contact number"  readonly="readonly">
									@error('contact')
	                                    <span class="invalid-feedback d-block" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label for="gender">Gender</label>
									<input type="text" name="gender" value="{{Gender()[$job->gender]}}" class="form-control" readonly="readonly">
									
								</div>
						
								<div class="col-md-4 form-group">
									<label for="address">Address</label>
									<input type="text" name="address" value="{{old('address') ?? $job->address}}" class="form-control" placeholder="Enter your address"  readonly="readonly">
								</div>
								<div class="col-md-4 form-group" >
									<label for="city_id">Location</label>
									<input type="text" name="city_id" value="{{City()[$job->city_id]}}" class="form-control" readonly="readonly">
									
									
								</div>
							</div>
							<div class="row">
								<div class="col-md-4 form-group">
									<label for="current_ctc">Current CTC</label>
									<input type="text" name="current_ctc" value="{{old('current_ctc') ?? $job->current_ctc}}" class="form-control"readonly="readonly">
									@error('current_ctc')
	                                    <span class="invalid-feedback d-block" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-md-4 form-group">
									<label for="expected_ctc">Expected CTC</label>
									<input type="text" name="expected_ctc" value="{{old('expected_ctc') ?? $job->expected_ctc}}" class="form-control"  readonly="readonly">
									@error('expected_ctc')
	                                    <span class="invalid-feedback d-block" role="alert">
	                                    <strong>{{ $message }}</strong>
	                                    </span>
	                                @enderror
								</div>
								<div class="col-md-4 form-group">
									<label for="notice_period">Notice Period <span class="text-muted">(In Days)</span></label>
									<input type="text" name="notice_period" value="{{old('notice_period') ?? $job->notice_period}}" class="form-control" readonly="readonly">
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
											@foreach($job->educations as $education )
												<tr>
													<td>
														<input type="text"  readonly="readonly" name="eduName[]" value="{{$education->educName}}" class="form-control">
													</td>
													<td>
														<input type="text" name="board[]" value="{{$education->board}}" class="form-control" readonly="readonly">
													</td>
													<td>
														<input type="text"  name="year[]" value="{{$education->year}}" class="form-control"  readonly="readonly">
													</td>
													<td>
														<input type="text"  name="percent[]" value="{{$education->percent}}" class="form-control" readonly="readonly">
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
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
												<th>Company Name</th>
												<th>Designation</th>
												<th>From</th>
												<th>To</th>
												
											</tr>
										</thead>
										<tbody id="expBody">
											@foreach($job->experiences as $exKey =>  $experience)
											<tr id="row{{$exKey}}">
												<td>
													<input type="text" name="company[]" value="{{$experience->company}}" class="form-control" readonly="readonly">
												</td>
												<td>
													<input type="text" name="designation[]" value="{{$experience->designation}}" class="form-control" readonly="readonly">
												</td>
												<td>
													<input type="text" name="from[]" value="{{date('Y-m-d',strtotime($experience->from))}}" class="form-control datepicker" readonly="readonly"  data-date-format="yyyy-mm-dd">
												</td>
												<td>
													<input type="text" name="to[]" value="{{date('Y-m-d',strtotime($experience->to))}}" class="form-control datepicker"readonly="readonly" data-date-format="yyyy-mm-dd">
												</td>
												
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>

							<hr>
							<div class="row">
								<div class="col-md-12 form-group"><h4 class="font-weight-bold">Language Known</h4></div>
							</div>
							{{-- @foreach( as $edLanguage ) --}}
								@foreach(Languages() as $l_key => $language)

								{{-- @if() --}}
									<div class="row">
										<div class="col-md-3 form-group">
											<input type="checkbox" name="langName[]" value="{{$l_key}}" class="checkBoxChange" id="{{$l_key}}" {{count(collect($job->languages)->where('langName',$l_key)) !=0 ? 'checked="checked"' : '' }} disabled="disabled"> {{$language}}
										</div>
										@foreach(LanOptions() as $lq_key => $languageOption)
											<div class="col-md-2 form-group">
												<input type="checkbox" name="{{$l_key}}[]" value="{{$lq_key}}" class="answer_{{$l_key}}" 

												@forelse (collect($job->languages)->where('langName',$l_key) as $option)
												   {{$option->answer == $lq_key ? 'checked="checked"' : '' }}
												@empty
												 
												@endforelse disabled="disabled"> {{$languageOption}}
											</div>							
										@endforeach
									</div>
								@endforeach
							{{-- @endforeach --}}
							<hr>
							<div class="row">
								<div class="col-md-12 form-group"><h4 class="font-weight-bold">Technical Known</h4></div>
							</div>
							@foreach(Skils() as $t_key => $technical)
								<div class="row">
									<div class="col-md-3 form-group">
										<input type="checkbox" name="techName[]" value="{{$t_key}}" class="checkBoxChange"  {{count(collect($job->technicals)->where('techName',$t_key)) !=0 ? 'checked="checked"' : '' }} disabled="disabled"> {{$technical}}
									</div>
									@foreach(SkilsOption() as $tq_key => $technicalOption)
									<div class="col-md-2 form-group">
										<input type="radio" name="{{$t_key}}" value="{{$tq_key}}" class="answer_{{$t_key}}" 
										@forelse (collect($job->technicals)->where('techName',$t_key) as $options)
										   {{$options->answer == $tq_key ? 'checked="checked"' : '' }}
										@empty
										 
										@endforelse disabled="disabled"> {{$technicalOption}}
									</div>							
									@endforeach
								</div>
							@endforeach

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</x-app-layout>
