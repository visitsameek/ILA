<div class="">
    <div class="page-title">
        <div class="title_left"></div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Contact User List</h2>
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
                                    <th>Name</th>
									<th>Email</th> 
									<th>Phone</th>
									<th>Message</th>
									<th>Contact Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($contact_users)) { ?>
                                    <?php foreach ($contact_users as $key => $con) { ?>
                                        <tr>
                                            <td><?php echo ($key + 1) . '.' ?></td>  
                                            <td><?php echo isset($con->name) ? $con->name : "---"; ?></td>
											<td><?php echo isset($con->email_id) ? $con->email_id : "---"; ?></td>
											<td><?php echo isset($con->phone) ? $con->phone : "---"; ?></td>
											<td><?php echo isset($con->message) ? $con->message : "---"; ?></td>
											<td><?php echo isset($con->created_on) ? $con->created_on : "---"; ?></td>
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
