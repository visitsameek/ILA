<div class="">
    <div class="page-title">
        <div class="title_left"></div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><?php echo !empty($course_details->title) ? $course_details->title : '---'; ?> Course Details</h2>
                    <ul class="nav navbar-right panel_toolbox">
						<li><a href="<?php echo base_url('admin/course/edit_course') . '/' . encode_url($course_details->id); ?>"><i class="fa fa-pencil"></i></a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <?php if ($this->session->flashdata('error_message')) { ?>
                        <div class="alert alert-warning">
                            <?php echo $this->session->flashdata('error_message'); ?>
                        </div>
                    <?php } ?>
                    <?php if ($this->session->flashdata('success_message')) { ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('success_message'); ?>
                        </div>
                    <?php } ?>

                    <br />

					<div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="general-tab" role="tab" data-toggle="tab" aria-expanded="true">General</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="level-tab" data-toggle="tab" aria-expanded="false">Levels</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content3" role="tab" id="schedule-tab" data-toggle="tab" aria-expanded="false">Schedules</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
					    <!-- general starts -->
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="general-tab">
						   <div class="panel panel-default">
								<div class="panel-body">
									<div class="panel panel-info">
										<div class="panel-heading">General Information</div>
										<div class="panel-body">
											<div class="row">
												<div class="col-md-3"><strong>Course Title:</strong></div><div class="col-md-3"><?php echo !empty($course_details->title) ? $course_details->title : '---'; ?></div>
												<div class="col-md-3"><strong>Course Category:</strong></div><div class="col-md-3"><?php echo !empty($course_details->course_category_id) ? $course_details->category : '---'; ?></div>
											</div>
											<div class="row">
												<div class="col-md-3"><strong>Age From:</strong></div><div class="col-md-3"><?php echo !empty($course_details->age_from) ? $course_details->age_from : '---'; ?></div>
												<div class="col-md-3"><strong>Age To:</strong></div><div class="col-md-3"><?php echo !empty($course_details->age_to) ? $course_details->age_to : '---'; ?></div>
											</div>
										</div>
									</div>
								</div>
							</div>
                        </div>
						<!-- general ends -->
						<!-- level starts -->
                        <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="level-tab">
                            <div class="x_title">
								<h2>Course Level List</h2>
								<a href="<?php echo base_url();?>admin/course/add_course_level/<?php echo encode_url($course_details->id);?>" class="btn btn-info pull-right">Add Course Level</a>
								<div class="clearfix"></div>
							</div>
							<div class="table-responsive">							
							<table id="table_id" class="table table-striped jambo_table bulk_action">
								<thead>
									<tr class="headings">
										<th>Sl.No.</th>
										<th>Course Level Name</th>
										<th>Duration (hours)</th>
										<th>Duration (months)</th>
										<th>Action</th>              
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($levels)) { ?>
										<?php foreach ($levels as $key => $con) { ?>
											<tr>
												<td><?php echo ($key + 1) . '.' ?></td>  
												<td><?php echo isset($con->title) ? $con->title : "---"; ?></td> 
												<td><?php echo isset($con->duration_hours) ? $con->duration_hours : "---"; ?></td> 
												<td><?php echo isset($con->duration_months) ? $con->duration_months : "---"; ?></td> 
												<td>
													<a href="<?php echo base_url('admin/course/edit_course_level') . '/' . encode_url($course_details->id) . '/' . encode_url($con->id); ?>" class="btn btn-info btn-xs">
														<i class="fa fa-pencil"></i> Edit
													</a>
												</td>
											</tr>
											<?php
										}
									} else {
										echo '<tr><td colspan="4">No Data Found</td></tr>';
									}
									?>                   
								</tbody>
							</table>
							</div>
                        </div>
						<!-- level ends -->
						<!-- schedule starts -->
                        <div role="tabpanel" class="tab-pane fade" id="tab_content3" aria-labelledby="schedule-tab">
                          <div class="x_title">
								<h2>Course Schedule List</h2>
								<a href="<?php echo base_url();?>admin/course/add_course_schedule/<?php echo encode_url($course_details->id);?>" class="btn btn-info pull-right">Add Course Schedule</a>
								<div class="clearfix"></div>
							</div>
							<div class="table-responsive">							
							<table id="table_id_2" class="table table-striped jambo_table bulk_action">
								<thead>
									<tr class="headings">
										<th>Sl.No.</th>
										<th>Level</th>
										<th>Center</th>
										<th>Class Code</th>
										<th>Weeks</th>
										<th>Hours</th>
										<th>Days</th>
										<th>Time</th>
										<th>Start Date</th>
										<th>Fee</th>
										<th>Status</th>
										<th>Action</th>              
									</tr>
								</thead>
								<tbody>
									<?php if (!empty($schedules)) { ?>
										<?php foreach ($schedules as $key => $con) { ?>
											<tr>
												<td><?php echo ($key + 1) . '.' ?></td>  
												<td><?php echo isset($con->course_level_title) ? $con->course_level_title : "---"; ?></td> 
												<td><?php echo isset($con->center_title) ? $con->center_title : "---"; ?></td> 
												<td><?php echo isset($con->class_code) ? $con->class_code : "---"; ?></td> 
												<td><?php echo isset($con->weeks) ? $con->weeks : "---"; ?></td> 
												<td><?php echo isset($con->hours) ? $con->hours : "---"; ?></td> 
												<td><?php echo isset($con->days) ? $con->days : "---"; ?></td> 
												<td><?php echo isset($con->class_time_from) ? $con->class_time_from.' - '.$con->class_time_to : "---"; ?></td> 
												<td><?php echo isset($con->start_date) ? $con->start_date : "---"; ?></td> 
												<td><?php echo isset($con->fee) ? $con->fee : "---"; ?></td> 
												<td><?php echo isset($con->status) ? $con->status : "---"; ?></td>
												<td>
													<a href="<?php echo base_url('admin/course/edit_course_schedule') . '/' . encode_url($course_details->id) . '/' . encode_url($con->id); ?>" class="btn btn-info btn-xs">
														<i class="fa fa-pencil"></i> Edit
													</a>
												</td>
											</tr>
											<?php
										}
									} else {
										echo '<tr><td colspan="4">No Data Found</td></tr>';
									}
									?>                   
								</tbody>
							</table>
							</div>
                        </div>
						<!-- schedule ends -->
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
