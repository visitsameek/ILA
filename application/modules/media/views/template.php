<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php echo SITE_TITLE;?> Admin | Dashboard </title>

		<link rel="shortcut icon" href="<?php echo base_url(); ?>front/images/sft_wellness_fav_icon.png">

        <!-- Bootstrap -->
        <link href="<?php echo base_url(); ?>theme/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo base_url(); ?>theme/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo base_url(); ?>theme/vendors/nprogress/nprogress.css" rel="stylesheet">
        <!-- bootstrap-wysiwyg -->
        <link href="<?php echo base_url(); ?>theme/vendors/google-code-prettify/bin/prettify.min.css" rel="stylesheet">

        <!-- Custom styling plus plugins -->
        <link href="<?php echo base_url(); ?>theme/build/css/custom.min.css" rel="stylesheet">

        <?php load_media_style(); ?>
       
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="<?php echo base_url(); ?>admin" class="site_title"><img src="<?php echo base_url(); ?>front/images/sft_wellness_logo.png" height="40" alt="<?php echo SITE_TITLE;?>" />&nbsp;&nbsp;<span>Admin Panel </span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
						<div class="profile clearfix">
						  <div class="profile_pic">
							<img src="<?php echo base_url(); ?>front/images/vivian.jpg" alt="Admin" class="img-circle profile_img" />
						  </div>
						  <div class="profile_info">
							<span>Welcome,</span>
							<h2>Vivian Nguyen</h2>
						  </div>
						</div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <?php echo $left_menu; ?>
                    </div>

                    <!-- top navigation -->
                    <?php echo $header; ?>
                    <!-- /top navigation -->

                    <!-- page content -->
                    <div class="right_col" role="main">
                        <?php echo $content; ?>
                    </div>
                    <!-- /page content -->

                    <!-- footer content -->
                    <footer>
                        <div class="pull-right">
                            <?php echo SITE_TITLE;?> - Admin Panel 
                        </div>
                        <div class="clearfix"></div>
                    </footer>
                    <!-- /footer content -->
                </div>
            </div>

            <!-- compose -->
            <div class="compose col-md-6 col-xs-12">
                <div class="compose-header">
                    New Message
                    <button type="button" class="close compose-close">
                        <span>×</span>
                    </button>
                </div>

                <div class="compose-body">
                    <div id="alerts"></div>

                    <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor">
                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                            </ul>
                        </div>

                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a data-edit="fontSize 5">
                                        <p style="font-size:17px">Huge</p>
                                    </a>
                                </li>
                                <li>
                                    <a data-edit="fontSize 3">
                                        <p style="font-size:14px">Normal</p>
                                    </a>
                                </li>
                                <li>
                                    <a data-edit="fontSize 1">
                                        <p style="font-size:11px">Small</p>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="btn-group">
                            <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
                            <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
                            <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
                            <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
                        </div>

                        <div class="btn-group">
                            <a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
                            <a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
                            <a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
                            <a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
                        </div>

                        <div class="btn-group">
                            <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
                            <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
                            <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
                            <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
                        </div>

                        <div class="btn-group">
                            <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
                            <div class="dropdown-menu input-append">
                                <input class="span2" placeholder="URL" type="text" data-edit="createLink" />
                                <button class="btn" type="button">Add</button>
                            </div>
                            <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
                        </div>

                        <div class="btn-group">
                            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
                            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
                        </div>

                        <div class="btn-group">
                            <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
                            <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
                        </div>
                    </div>

                    <div id="editor" class="editor-wrapper"></div>
                </div>

                <div class="compose-footer">
                    <button id="send" class="btn btn-sm btn-success" type="button">Send</button>
                </div>
            </div>
            <!-- /compose -->

            <!-- jQuery -->
            <script src="<?php echo base_url(); ?>theme/vendors/jquery/dist/jquery.min.js"></script>
            <!-- Bootstrap -->
            <script src="<?php echo base_url(); ?>theme/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
            <!-- FastClick -->
            <script src="<?php echo base_url(); ?>theme/vendors/fastclick/lib/fastclick.js"></script>
            <!-- NProgress -->
            <script src="<?php echo base_url(); ?>theme/vendors/nprogress/nprogress.js"></script>
            <!-- bootstrap-wysiwyg -->
            <script src="<?php echo base_url(); ?>theme/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js"></script>
            <script src="<?php echo base_url(); ?>theme/vendors/jquery.hotkeys/jquery.hotkeys.js"></script>
            <script src="<?php echo base_url(); ?>theme/vendors/google-code-prettify/src/prettify.js"></script>

            <!-- Custom Theme Scripts -->
            <script src="<?php echo base_url(); ?>theme/build/js/custom.min.js"></script>

            <?php load_media_script(); ?>
            <!-- bootstrap-wysiwyg -->
            
            <script>
                $(document).ready(function () {
                    function initToolbarBootstrapBindings() {
                        var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier',
                            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
                            'Times New Roman', 'Verdana'
                        ],
                                fontTarget = $('[title=Font]').siblings('.dropdown-menu');
                        $.each(fonts, function (idx, fontName) {
                            fontTarget.append($('<li><a data-edit="fontName ' + fontName + '" style="font-family:\'' + fontName + '\'">' + fontName + '</a></li>'));
                        });
                        $('a[title]').tooltip({
                            container: 'body'
                        });
                        $('.dropdown-menu input').click(function () {
                            return false;
                        })
                                .change(function () {
                                    $(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');
                                })
                                .keydown('esc', function () {
                                    this.value = '';
                                    $(this).change();
                                });

                        $('[data-role=magic-overlay]').each(function () {
                            var overlay = $(this),
                                    target = $(overlay.data('target'));
                            overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
                        });

                        if ("onwebkitspeechchange" in document.createElement("input")) {
                            var editorOffset = $('#editor').offset();

                            $('.voiceBtn').css('position', 'absolute').offset({
                                top: editorOffset.top,
                                left: editorOffset.left + $('#editor').innerWidth() - 35
                            });
                        } else {
                            $('.voiceBtn').hide();
                        }
                    }

                    function showErrorAlert(reason, detail) {
                        var msg = '';
                        if (reason === 'unsupported-file-type') {
                            msg = "Unsupported format " + detail;
                        } else {
                            console.log("error uploading file", reason, detail);
                        }
                        $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>' +
                                '<strong>File upload error</strong> ' + msg + ' </div>').prependTo('#alerts');
                    }

                    initToolbarBootstrapBindings();

                    $('#editor').wysiwyg({
                        fileUploadError: showErrorAlert
                    });

                    prettyPrint();
                });
            </script>
            <!-- /bootstrap-wysiwyg -->

            <!-- compose -->
            <script>
                $('#compose, .compose-close').click(function () {
                    $('.compose').slideToggle();
                });
            </script>
            <!-- /compose -->
    </body>
</html>