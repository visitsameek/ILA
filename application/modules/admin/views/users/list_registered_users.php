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
                    <h2>Registered User List</h2>

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
                    <div class="table-responsive">
                        <table id="table_id" class="table table-striped jambo_table bulk_action">
                            <thead>
                                <tr class="headings">
                                    <th>Sl.No.</th>
									<th>User Type</th>
									<th>First Name</th>
									<th>Last Name</th>
                                    <th>Phone</th>
									<th>Email</th>									                                   
									<th>Registered Date</th>
									<th>Action Taken</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($users)) { ?>
                                    <?php foreach ($users as $key => $data) { ?>
                                        <tr>
                                            <td><?php echo ($key + 1) . '.' ?></td>
											<td><?php echo $data->user_type == 1 ? 'Registered' : ($data->user_type == 2 ? 'Callback' : ($data->user_type == 3 ? 'Contact' : 'Event')); ?></td>
											<td><a href="<?php echo base_url('admin/user/view_users') . '/' . encode_url($data->id); ?>"><?php echo $data->first_name; ?></a></td>
											<td><a href="<?php echo base_url('admin/user/view_users') . '/' . encode_url($data->id); ?>"><?php echo $data->last_name; ?></a></td>
											<td><?php echo $data->phone; ?></td>
											<td><?php echo $data->email_id; ?></td>
                                            <td><?php echo $data->created_on; ?></td>
											<td><?php echo $data->action_taken == 0 ? 'No' : 'Yes'; ?></td>
                                            <td>
												<a href="<?php echo base_url('admin/user/view_users') . '/' . encode_url($data->id); ?>" class="btn btn-primary btn-xs">
                                                    <i class="fa fa-folder"></i> View
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
            </div>
        </div>
    </div>

</div>

<!-- /page content -->


</div>
</div>

</body>
