<div class="">
    <div class="page-title">
        <div class="title_left"></div>
    </div>
    <div class="clearfix"></div>
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Course</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>

                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
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
                    <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" action="" method="post">
                     <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Course Title <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <input type="text" id="title" name="title" class="form-control col-md-7 col-xs-12" value="<?php echo isset($course_details->title) ? $course_details->title : ""; ?>"  >
                            </div>
                        </div> 
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Course Category <span class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="course_category_id" name="course_category_id" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <?php 
                                    if(!empty($category_list)){
                                        foreach ($category_list as $category){ ?>
                                            <option value="<?php echo $category->id; ?>" <?php echo ($course_details->course_category_id==$category->id) ? "selected" : ""; ?>><?php echo $category->category; ?></option>
                                       <?php  }
                                    }
                                    ?>
                                </select>
                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Age From
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="age_from" name="age_from" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <?php
                                      for ($i=1;$i<=20;$i++){ ?>
										<option value="<?php echo $i; ?>" <?php echo ($course_details->age_from==$i) ? "selected" : ""; ?>><?php echo $i;?></option>
                                    <?php } ?>
                                </select>                               
                            </div>
                        </div>
						<div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Age To
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <select id="age_to" name="age_to" class="form-control col-md-7 col-xs-12" >
                                    <option value="">Select</option>
                                    <?php
                                      for ($i=1;$i<=20;$i++){ ?>
										<option value="<?php echo $i; ?>" <?php echo ($course_details->age_to==$i) ? "selected" : ""; ?>><?php echo $i;?></option>
                                    <?php } ?>
                                </select>                               
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <button type="submit" class="btn btn-primary" onclick="window.history.back()">Cancel</button>
                                <input type="submit" name="submit" id="submit" class="btn btn-success" value="Submit">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
</div>
</div>

<script>
    $(document).ready(function(){   
        
        $('.form-control').focus(function(){
            $('.validation').remove('.validation');
        });              
        $('#submit').click(function(e){        
           if($('#title').val()==""){         
               $("#title").parent().append("<div class='validation'>Please enter course title</div>");
                return false;
           }else if($('#course_category_id').val()==""){         
               $("#course_category_id").parent().append("<div class='validation'>Please select course category </div>");
                return false;
           }else{
               return true;                 
           }
        });
    });
</script>
</body>
