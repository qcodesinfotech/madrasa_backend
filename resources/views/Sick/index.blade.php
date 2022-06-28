@extends('layouts.master')
@section('content')
<div class="app-wrapper">
	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">
			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Sick Leave  </h1>
				</div>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							<div class="col-auto">
								<style>
									input {
										text-transform: capitalize;
									}

									.cell{
										text-align:center;
									}
								</style>
							</div>
							<button type="button" onMouseOver="this.style.color='#15A362'" onMouseOut="this.style.color='#676778'" style="border-radius:5px;padding:4px;background-color:white;border:1px solid #676778;;color:#676778; " class="col-auto" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap"><i class="fa fa-plus" aria-hidden="true"></i> Add </button>

							<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Add Sick Student Detail</h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											@if ($errors->any())

											<div class="alert alert-danger">
												<strong>Whoops!</strong> There were some problems with your input.<br><br>
												  <ul>
													@foreach ($errors->all() as $error)
													<li>{{ $error }}</li>
													@endforeach
												  </ul>
											</div>
											@endif

                                            <form action="{{ route('addsickleave') }}"
                                              method="POST">
												@csrf
												@method('post')
												{{-- <div class="mb-3">
													<label for="recipient-name" class="col-form-label">Student</label>
                                                    <select name="" id="">

                                                        <option value="">select option</option>
                                                    </select>
													<input type="number" name="s_id" class="form-select" id="" placeholder="student id" required>

												</div> --}}

                                                <div class="mb-3">
													<label for="recipient-name" class="col-form-label">Student</label>
													<select name="student_id" class="form-select" id="" required>
														<option value="">Select Student</option>
														@foreach ($students as $data)
														<option value="{{$data->id}}">{{$data->name}}</option>
														@endforeach
													</select>
												</div>

												{{-- <div class="mb-3">
													<label for="recipient-name" class="col-form-label">Admission Number</label>
													<select name="admission_no" class="form-select"  required>
														 --}}





                                                <div class="mb-3">
													<label for="recipient-name" class="col-form-label">Date&Time</label>
													<input type="datetime-local" name="date_time" class="form-select" id=""placeholder="Date & Time" required>

												</div>
                                                <div class="mb-3">
													<label for="recipient-name" class="col-form-label">Reason</label>
													<input type="text" name="reason" class="form-select" id=""placeholder="Reason " required>

												</div>
                                                <div class="mb-3">
													<label for="recipient-name" class="col-form-label"> Session</label>
													<input type="text" name="session" class="form-select" id=""placeholder="Session" required>

												</div>
                                                <div class="mb-3">
													<label for="recipient-name" class="col-form-label">Teacher Id</label>
													<select name="teacher_id" class="form-select" id="" required>
														<option value="">Select teacher</option>
														@foreach ($users as $data)
														<option value="{{$data->id}}">{{$data->full_name}}</option>
														@endforeach
													</select>

												</div>
                                                <div class="mb-3">
													<label for="recipient-name" class="col-form-label"> Description</label>
													<input type="text" name="description" class="form-select" id=""placeholder="Description " required>
                                                 </div>
                                                                                   


										</div>
										<div class="modal-footer">
											<a href="sick" class="btn btn-secondary">Close</a>
											<button type="submit" name="submit" class="btn btn-primary">Save</button>
											</form>

										</div>
									</div>
								</div>
							</div>


						</div>
					
					</div>
			
				</div>
				
			</div>
			<div class="tab-content" id="orders-table-tab-content">
				<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="table-responsive">
								@if ($message = Session::get('success'))
								<div class="alert alert-success">
									<p>{{ $message }}</p>
								</div>
								@endif
								<table class="table app-table-hover mb-0 text-left">
									<thead>
										<tr>
										
                                            <th class="cell">Id</th>
                                            <th class="cell">Student</th>
                                            <th class="cell">Date&Time</th>
                                            <th class="cell">Reason</th>
                                            <th class="cell">Session</th>
                                            <th class="cell">Teacher</th>
                                            <th class="cell">Description</th>
                                
                                
                                            <th class="cell" width="280px">Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $i=1; ?>
										@foreach ($sick_leave as $data)
										<tr>
											<td class="cell">{{ $i++ }}</td>
											<td class="cell"><span class="truncate">{{ $data->student_name }}</span></td>
											<td class="cell"><span class="truncate">{{ $data->date_time }}</span></td>
											<td class="cell"><span class="truncate">{{ $data->reason}}</span></td>
                                            <td class="cell"><span class="truncate">{{ $data->session}}</span></td>
											<td class="cell"><span class="truncate">{{ $data->teacher_name}}</span></td>
											<td class="cell"><span class="truncate">{{ $data->description}}</span></td>

											<td class="cell">
                                                        <a href="{{ route('edit',$data->id)  }}" class="btn btn-primary"><i class="fas fa-edit fa-1x"></i></a>
                                                    <form action="{{ route('destroy',$data->id)}}" method="POST" >
                                                        @csrf
                                                        @method('DELETE')
                                                    <button type="submit" onclick="return confirm(' you want to delete?');" class="btn btn-danger"><i class="fas fa-trash fa-1x"></i></button>
                                                    </form>

											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
							<!--//table-responsive-->

						</div>
						<!--//app-card-body-->
					</div>
				
				</div>

				<div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body" id="mediumBody">
								<div>

								</div>
							</div>
						</div>
					</div>
				</div>


				<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
				<!-- Script -->
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
				<script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js' type='text/javascript'></script>

				<!-- Font Awesome JS -->
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
				</script>
				<script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
				</script>
				<script>
					// display a modal (medium modal)
					$(document).on('click', '#mediumButton', function(event) {
						event.preventDefault();
						let href = $(this).attr('data-attr');
						$.ajax({
							url: href,
							beforeSend: function() {
								$('#loader').show();
							},
							// return the result
							success: function(result) {
								$('#mediumModal').modal("show");
								$('#mediumBody').html(result).show();
							},
							complete: function() {
								$('#loader').hide();
							},
							error: function(jqXHR, testStatus, error) {
								console.log(error);
								alert("Page " + href + " cannot open. Error:" + error);
								$('#loader').hide();
							},
							timeout: 8000
						})
					});
				</script>
				@endsection