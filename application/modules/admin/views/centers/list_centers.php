<div class="">
    <div class="page-title">
        <div class="title_left"></div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Training Center List</h2>
					<a href="<?php echo base_url();?>admin/center/add_center" class="btn btn-info pull-right">Add Center</a>
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
                                    <th>Center Name in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?></th>
									<th>Address in <?php echo ($selected_lang==1)?"English":"Vietnamese"; ?></th>
									<th>Phone</th>
									<th>Email Address</th>
                                    <th>Action</th>              
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($centers)) { ?>
                                    <?php foreach ($centers as $key => $con) { ?>
                                        <tr>
                                            <td><?php echo ($key + 1) . '.' ?></td>  
                                            <td><?php echo isset($con->title) ? $con->title : "---"; ?></td>
											<td><?php echo isset($con->address) ? $con->address : "---"; ?></td>
											<td><?php echo isset($con->phone) ? $con->phone : "---"; ?></td>
											<td><?php echo isset($con->email_id) ? $con->email_id : "---"; ?></td>
                                            <td>
                                                <a href="<?php echo base_url('admin/center/edit_center') . '/' . encode_url($con->id); ?>" class="btn btn-info btn-xs">
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

                    <?php if (!empty($categories)) { ?>
                        <ul class="pagination">
                            <?php echo $page_link; ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- /page content -->


</div>
</div>

</body>
