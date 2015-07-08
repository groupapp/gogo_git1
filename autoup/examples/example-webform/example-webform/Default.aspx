<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="Default.aspx.cs" Inherits="example_webform.Default" %>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title></title>
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="css/jquery.gritter.css" rel="stylesheet" />
    <link href="css/app.css" rel="stylesheet" />
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
                  <script src="js/html5shiv.js"></script>
                <![endif]-->
</head>
<body>
    <div class="container">
        <div class="masthead">
            <div class="navbar">
                <div class="navbar-inner">
                    <div class="container">
                        <ul class="nav">
                            <li class="active"><a href="#">Default</a> </li>
                            <li><a href="#">Verse 1</a> </li>
                            <li><a href="#">Verse 2</a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="intro">
            <h1>
                HTML5 &amp; AJAX UPLOADER</h1>
            <div class="span10 offset2">
                <dl class="dl-horizontal">
                    <dt>Pure JS</dt>
                    <dd>
                        no out-of-box JS Framework used</dd>
                    <dt>Flexible</dt>
                    <dd>
                        can be used in any app,website easy to implement</dd>
                    <dt>Customizable</dt>
                    <dd>
                        can be customized by user</dd>
                </dl>
            </div>
            <a class="btn btn-large btn-success tryit" href="#">Try it!</a>
        </div>
        <form class="row-fluid" id="dropper" action="Default.aspx">
        <div class="text-center">
            <input id="fileInput" name="fileInput" type="file" class="btn btn-file" multiple />
            <button type="submit" class="btn btn-success"><i class="icon-white icon-arrow-up"></i>Start Upload</button>
        </div>
        <div style="padding-bottom: 20px">
        </div>
        <div class="row-fluid">
            <div class="span12 drop-zone" id="dropPlace">
            </div>
        </div>
        <div class="row-fluid images" id="imageHolder">
        </div>
        </form>
        <hr />
        <div class="footer">
            <p>
                &copy; tQera 2013</p>
        </div>
    </div>
    <script src="js/jquery-1.9.1.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/jquery.gritter.min.js"></script>
    <script src="Scripts/tQera.Uploader.js"></script>
        <script>
            $('.tryit').click(function () {
                $('#dropper').show('fast');
            });

            var d = new tQEraUploader(
{
    drop: true,
    imageHolder: document.getElementById("imageHolder"),
    dragHoverClass: "drop_hover",
    image_thumb_width: 128,
    image_thumb_height: 128,
    dropPlace: document.getElementById("dropPlace"),
    form: document.getElementById("dropper"),
    fileInput: document.getElementById("fileInput"),
    file_closebutton_class: "btn btn-danger close",
    file_class: "list-i",
    file_filter: "",
    image_thumb: true,
    limit: 0,
    ajax: {
        url: '<%= ResolveUrl("~/WebService1.asmx/Receive") %>',
        clearAfterUpload: true
    },
    watermark: {
        position: "top right",
        text: "www.example.com"
    },
    html5Error:
        function (uploader) {

            uploader.settings.imageHolder.style.display = "none";
            //document.getElementById("dropper").removeChild(imageholder);

            uploader.settings.dropPlace.style.display = "none";
            var error = document.createElement("p");
            error.className = "text-center";
            error.appendChild(document.createTextNode("Your browser doesn't support HTML5, we can offer you a new browser from here !"));
            uploader.settings.form.appendChild(error);
        },
    progress:
                 function (data) {
                     var template = document.getElementById(data.template);
                     console.log(data.template);
                     if (template) {
                         var progress = document.getElementById("progress_" + data.template);

                         if (progress) {
                             progress.style.width = data.percent + "%";
                         }
                         else {
                             var div = document.createElement("div");
                             div.className = "progress progress-striped active";

                             progress = document.createElement("div");
                             progress.id = "progress_" + data.template;
                             progress.className = "bar";
                             progress.style.width = data.percent + "%";
                             div.appendChild(progress);

                             template.appendChild(div);
                         }
                     }

                 },
    success:
        function (event) {
            console.log("Its uploaded ");
            console.log(event);
        },
    error:
        function (event) {
            $.gritter.add({
                // (string | mandatory) the heading of the notification
                title: 'Error!',
                // (string | mandatory) the text inside the notification
                text: event
            });
        }
});

            function CheckThumb() {
                if (d.settings.image_thumb)
                    return "Images and Thumbnails are created<br />Thumbnails are on";
                else
                    return "Images are created <br />but no thumbnails are created. <br />Thumbnails are off";
            }

            $(function () {
                //watermark: {
                //        position: "bottom right",
                //        text: "www.tqera-jlbfg-IJ.com",
                //        color: "gray",
                //        font: "bold helvetica",
                //        font_size: "72px",
                //        alpha: 0.7
                //},="watermarkText" /></li>

                $('#watermarkText').change(function () {
                    d.settings.watermark.text = $('#watermarkText').val();
                });
                $('#watermarkColor').change(function () {
                    d.settings.watermark.color = $('#watermarkColor').val();
                });
                $('#watermarkFont').change(function () {
                    d.settings.watermark.font = $('#watermarkFont').val();
                });
                $('#watermarkFontSize').change(function () {
                    d.settings.watermark.font_size = $('#watermarkFontSize').val();
                });
                $('#watermarkAlpha').change(function () {
                    d.settings.watermark.alpha = $('#watermarkAlpha').val();
                });
                $('#watermarkPosition').change(function () {
                    d.settings.watermark.position = $('#watermarkPosition').val();
                });
                $('#g-Limit').change(function () {
                    d.settings.limit = $('#g-Limit').val();
                });
                $('#g-Thumb').change(function () {
                    if ($('#g-Thumb').is(":checked")) {
                        d.settings.image_thumb = true;
                    }
                    else {
                        d.settings.image_thumb = false;
                    }
                });
            });

    </script>
</body>
</html>
