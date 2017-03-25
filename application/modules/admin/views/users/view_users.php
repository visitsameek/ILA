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
                    <h2>Registered User Details</h2>
					<a href="<?php echo base_url();?>admin/user/list_registered_users" class="btn btn-primary pull-right">Back to List</a>
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
										<div class="col-md-3"><strong>First Name:</strong></div><div class="col-md-3"><?php echo !empty($user_details->first_name) ? $user_details->first_name : '---'; ?></div>
										<div class="col-md-3"><strong>Last Name:</strong></div><div class="col-md-3"><?php echo !empty($user_details->last_name) ? $user_details->last_name : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>Phone Number:</strong></div><div class="col-md-3"><?php echo !empty($user_details->phone) ? $user_details->phone : '---'; ?></div>
										<div class="col-md-3"><strong>Email Address:</strong></div><div class="col-md-3"><?php echo !empty($user_details->email_id) ? $user_details->email_id : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>Gender:</strong></div><div class="col-md-3"><?php echo !empty($user_details->gender) ? $user_details->gender : '---'; ?></div>
										<div class="col-md-3"><strong>Date of Birth:</strong></div><div class="col-md-3"><?php echo !empty($user_details->birthdate) ? $user_details->birthdate : '---'; ?></div>
									</div>
                                    <div class="row">
										<div class="col-md-3"><strong>City:</strong></div><div class="col-md-3"><?php echo !empty($user_details->city) ? $user_details->city : '---'; ?></div>
										<div class="col-md-3"><strong>Center:</strong></div><div class="col-md-3"><?php echo !empty($user_details->center) ? $user_details->center : '---'; ?></div>
									</div>
									<div class="row">
										<div class="col-md-3"><strong>Registered Date:</strong></div><div class="col-md-3"><?php echo !empty($user_details->created_on) ? $user_details->created_on : '---'; ?></div>
										<div class="col-md-3"><strong>Current Student:</strong></div><div class="col-md-3"><?php echo $user_details->current_student == 0 ? 'No' : 'Yes'; ?></div>
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
