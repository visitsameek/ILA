<div class="">
    <div class="page-title">
        <div class="title_left"></div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Course List</h2>
					<a href="<?php echo base_url();?>admin/course/add_course" class="btn btn-info pull-right">Add Course</a>
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
                                    <th>Course Name</th>
                                    <th>Action</th>              
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($courses)) { ?>
                                    <?php foreach ($courses as $key => $con) { ?>
                                        <tr>
                                            <td><?php echo ($key + 1) . '.' ?></td>  
                                            <td><?php echo isset($con->course_title) ? $con->course_title : "---"; ?></td>   
                                            <td>
                                                <a href="<?php echo base_url('admin/course/edit_course') . '/' . encode_url($con->id); ?>" class="btn btn-info btn-xs">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>
												<a href="<?php echo base_url('admin/course/view_course') . '/' . encode_url($con->id); ?>" class="btn btn-primary btn-xs">
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
