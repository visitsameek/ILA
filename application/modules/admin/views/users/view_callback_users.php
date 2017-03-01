<div class="">
    <div class="page-title">
        <div class="title_left">

        </div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Request Callback User Details</h2>
					<a href="<?php echo base_url();?>admin/user/list_request_callback_users" class="btn btn-primary pull-right">Back to List</a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="table-responsive">
					  <div class="panel panel-default">
						<div class="panel-body">
							<div class="panel panel-info">
								<div class="panel-heading">General Information</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-3"><strong>Name:</strong></div><div class="col-md-3"><?php echo !empty($callback_user_details->name) ? $callback_user_details->name : '---'; ?></div>
										<div class="col-md-3"><strong>Country:</strong></div><div class="col-md-3"><?php echo !empty($callback_user_details->nicename) ? $callback_user_details->nicename : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>Phone Number:</strong></div><div class="col-md-3"><?php echo !empty($callback_user_details->phone) ? '(+'.$callback_user_details->country_code.') '. $callback_user_details->phone : '---'; ?></div>
										<div class="col-md-3"><strong>Email Address:</strong></div><div class="col-md-3"><?php echo !empty($callback_user_details->email_id) ? $callback_user_details->email_id : '---'; ?></div>
									</div>
                                                                        <div class="row">
										<div class="col-md-3"><strong>Sex:</strong></div><div class="col-md-3"><?php
                                                                                if(!empty($callback_user_details->sex)){
                                                                                    if($callback_user_details->sex == 'F')
                                                                                    echo 'Female';
                                                                                    else if($callback_user_details->sex == 'M') echo 'Male';
                                                                                    else echo 'Others';
                                                                                }else { echo '---'; }?></div>
										<div class="col-md-3"><strong>Age:</strong></div><div class="col-md-3"><?php echo !empty($callback_user_details->age) ? $callback_user_details->age : '---'; ?></div>
									</div>
									<div class="row"><?php
									if(!empty($callback_user_details->created)){
									    $date = DateTime::createFromFormat('Y-m-d H:i:s', $callback_user_details->created);
									    $callback_user_details->created = $date->format('d-m-Y');
									}?>
										<div class="col-md-3"><strong>Enquiry Date:</strong></div><div class="col-md-3"><?php echo !empty($callback_user_details->created_on) ? $callback_user_details->created_on : '---'; ?></div>
										<div class="col-md-3">&nbsp;</div>
									</div>
								</div>
							</div>
							<div class="panel panel-danger">
								<div class="panel-heading">Other Information</div>
								<div class="panel-body">
									<div class="row"><?php
									if(!empty($callback_user_details->preffered_call_date)){
									    $date = DateTime::createFromFormat('Y-m-d', $callback_user_details->preffered_call_date);
									    $callback_user_details->preffered_call_date = $date->format('d-m-Y');
									}?>
										<div class="col-md-3"><strong>Preffered Call Date:</strong></div><div class="col-md-3"><?php echo !empty($callback_user_details->preffered_call_date) ? $callback_user_details->preffered_call_date : '---'; ?></div>
										<div class="col-md-3"><strong>Preffered Call Time:</strong></div><div class="col-md-3"><?php echo !empty($callback_user_details->preffered_call_time) ? $callback_user_details->preffered_call_time : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>SkyPe id:</strong></div><div class="col-md-3"><?php echo !empty($callback_user_details->skype_id) ? $callback_user_details->skype_id : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>Callback Initiated:</strong></div><div class="col-md-3"><?php echo $callback_user_details->callback_intiated == 'Y' ? 'Yes' : 'No'; ?></div>
										<div class="col-md-3"><strong>Status:</strong></div><div class="col-md-3"><?php echo $callback_user_details->status == 0 ? 'Open' : 'Closed'; ?></div>
									</div>
								</div>
							</div>
						  </div>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
</div>
</div>

</body>
