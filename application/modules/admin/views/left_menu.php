<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <div class="menu_section">
            <h3></h3>
            <ul class="nav side-menu">
                <li><a href="<?php echo base_url(); ?>admin"><i class="fa fa-windows"></i> Dashboard </a></li>
				<li>
                    <a><i class="fa fa-sitemap"></i> Master <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<li><a>Cities<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li class="sub_menu"><a href="<?php echo base_url(); ?>admin/master/list_cities">List Cities</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>admin/master/add_city">Add City</a>
                                </li>
                            </ul>
                        </li>
						<li><a>Districts<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li class="sub_menu"><a href="<?php echo base_url(); ?>admin/master/list_districts">List Districts</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>admin/master/add_district">Add District</a>
                                </li>
                            </ul>
                        </li>
                        <li><a>Course Categories<span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li class="sub_menu"><a href="<?php echo base_url(); ?>admin/master/list_course_categories">List Categories</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>admin/master/add_course_category">Add Category</a>
                                </li>
                            </ul>
                        </li>
					</ul>
                </li>
				<li><a><i class="fa fa-university"></i> Training Centers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="sub_menu"><a href="<?php echo base_url(); ?>admin/center/list_centers">List Centers</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/center/add_center">Add Center</a></li>
                    </ul>
                </li>
				<li><a><i class="fa fa-book"></i> Courses <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="sub_menu"><a href="<?php echo base_url(); ?>admin/course/list_courses">List Courses</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/course/add_course">Add Course</a></li>
                    </ul>
                </li>
				<li>
                    <a><i class="fa fa-users"></i> Users <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<li><a href="<?php echo base_url(); ?>admin/user/list_registered_users">Registered Users </a></li>
						<!-- <li><a href="<?php //echo base_url(); ?>admin/user/list_request_callback_users">Request Callback Users </a></li>
						<li><a href="<?php //echo base_url(); ?>admin/user/list_contact_users">Contact Users </a></li> -->
						<li><a href="<?php echo base_url(); ?>admin/user/list_newsletter_subscribers">Newsletter Subscribers </a></li>
					</ul>
                </li>
				<li>
                    <a href="<?php echo base_url(); ?>admin/etemp"><i class="fa fa-graduation-cap"></i>Members </a>
                </li>
				<li><a><i class="fa fa-user"></i> Teachers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="sub_menu"><a href="<?php echo base_url(); ?>admin/site/list_teachers">List Teachers</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/site/add_teacher">Add Teacher</a></li>
                    </ul>
                </li>
				<li><a><i class="fa fa-bullhorn"></i> Stories <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="sub_menu"><a href="<?php echo base_url(); ?>admin/site/list_stories">List Stories</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/site/add_story">Add Story</a></li>
                    </ul>
                </li>
				<li>
                    <a><i class="fa fa-tasks"></i> Site Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
						<li><a>Vision, Mission & Core Values</a>
                            <ul class="nav child_menu">
                                <li class="sub_menu"><a href="<?php echo base_url(); ?>admin/site/list_core_values">List Core Values</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>admin/site/add_core_values">Add Core Value</a>
                                </li>
                            </ul>
                        </li>
						<li><a>Awards & Recognition</a>
                            <ul class="nav child_menu">
                                <li class="sub_menu"><a href="<?php echo base_url(); ?>admin/site/list_awards">List Awards</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>admin/site/add_award">Add Award</a>
                                </li>
                            </ul>
                        </li>
						<li><a>ILA Community Network</a>
                            <ul class="nav child_menu">
                                <li class="sub_menu"><a href="<?php echo base_url(); ?>admin/site/list_networks">List Networks</a>
                                </li>
                                <li><a href="<?php echo base_url(); ?>admin/site/add_network">Add Network</a>
                                </li>
                            </ul>
                        </li>
					</ul>
                </li>
				<li><a><i class="fa fa-clone"></i> CMS Management <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="sub_menu"><a href="<?php echo base_url(); ?>admin/cms/list_cms">List Pages</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/cms/add_cms">Add Page</a></li>
                    </ul>
                </li>
				<li><a><i class="fa fa-newspaper-o"></i> News <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="sub_menu"><a href="<?php echo base_url(); ?>admin/site/list_news">List News</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/site/add_news">Add News</a></li>
                    </ul>
                </li>
				<li><a><i class="fa fa-calendar"></i> Events <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="sub_menu"><a href="<?php echo base_url(); ?>admin/site/list_events">List Events</a></li>
                        <li><a href="<?php echo base_url(); ?>admin/site/add_event">Add Event</a></li>
                    </ul>
                </li>
				<li>
                    <a href="<?php echo base_url(); ?>admin/etemp"><i class="fa fa-image"></i>Gallery </a>
                </li>
				<li>
                    <a href="<?php echo base_url(); ?>admin/etemp"><i class="fa fa-envelope"></i>Email Template </a>
                </li>
				
                <li>
                    <a><i class="fa fa-cog"></i>Settings <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="<?php echo base_url(); ?>admin/settings/general_settings">General Settings<span class="fa "></span></a></li>
                        <li><a href="<?php echo base_url(); ?>admin/settings/home_page_settings">HomePage Settings<span class="fa "></span></a></li>
                    </ul>
                </li>
                <!-- <li><a><i class="fa fa-video-camera"></i> Media <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li class="sub_menu"><a href="<?php //echo base_url(); ?>media">Add Media</a></li>
                    </ul>
                </li> -->
            </ul>
        </div>
    </div>
</div>


<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<div class="sidebar-footer hidden-small">
  <a href="<?php echo base_url(); ?>admin/settings/general_settings" data-toggle="tooltip" data-placement="top" title="Settings">
	<span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="FullScreen">
	<span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
  </a>
  <a data-toggle="tooltip" data-placement="top" title="Lock">
	<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
  </a>
  <a href="<?php echo base_url(); ?>admin/logout" data-toggle="tooltip" data-placement="top" title="Logout">
	<span class="glyphicon glyphicon-off" aria-hidden="true"></span>
  </a>
</div>
<!-- /menu footer buttons -->
</div>
