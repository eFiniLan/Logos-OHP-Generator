<?php
$OHPFolder = __DIR__ . DIRECTORY_SEPARATOR . 'OHPGen' . DIRECTORY_SEPARATOR;
include_once $OHPFolder . 'vendor' . DIRECTORY_SEPARATOR . 'autoload.php';
?>
<!DOCTYPE html>
<html lang="utf-8">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LOGOS OHP Generator</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="assets/bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="assets/dist/css/skins/_all-skins.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="layout-top-nav skin-blue">
<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="/" class="navbar-brand"><b>恩道教會</b></a>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="/">OHP Generator</span></a></li>
                    <li><a href="/verseRetriever.php">Verse Retriever</a></li>
                </ul>
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>
</header>
<div class="content-wrapper">
    <section class="content-header">
        <h1>
            LOGOS OHP Generator
            <small>beta</small>
        </h1>
    </section>
    <section class="content">
        <form role="form" id="ohpContainer" class="ohpContainer" target="_blank" action="/generate.php?type=ohp" method="post">
<!--            <div class="row">-->
<!--                <div class="col-md-12">-->
<!--                    <div class="box box-primary">-->
<!--                        <div class="box-header with-border">-->
<!--                            <div class="input-group input-group-sm">-->
<!--                                <select></select>-->
<!--                                <span class="input-group-btn">-->
<!--                                    <button type="button" class="btn btn-info btn-flat">存檔</button>-->
<!--                                </span>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="box-body">-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <?php printWorshipRow('早禱會', 'morningPrayer'); ?>
            <?php printWorshipRow('敬拜讚美', 'worship'); ?>
            <?php printSimpleRow('關手機', 'opening'); ?>
            <?php printHymnRow('主日 - 唱詩 (1)', 'hymn1'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="input-group input-group-sm">
                                <h4>讀經</h4>
                                <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat newReadingBtn" data-target="reading">新增</button>
                                </span>
                            </div>
                        </div>
                        <div class="box-body" id="reading">
                            <input type="hidden" name="reading[type]" value="reading">
						</div>
                    </div>
                </div>
            </div>
            <?php printHymnRow('主日 - 唱詩 (2)', 'hymn2'); ?>
            <?php printSimpleRow('認信', 'apostlesCreed'); ?>
			<div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="input-group input-group-sm">
                                <h4>獻詩</h4>
                            </div>
                        </div>
                        <div class="box-body">
                            <input type="hidden" name="groupWorship[type]" value="groupWorship">
                            <div class="form-group">
                                <input type="text" class="form-control" id="song" name="groupWorship[collections][song]" placeholder="詩歌">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="group" name="groupWorship[collections][group]" placeholder="團契/牧區">
                            </div>
                        </div>
                    </div>
                </div>			
			</div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="input-group input-group-sm">
                                <h4>講道</h4>
                            </div>
                        </div>
                        <div class="box-body">
                            <input type="hidden" name="preach[type]" value="preach">
                            <div class="form-group">
                                <input type="text" class="form-control" id="title" name="preach[title]" placeholder="證道主題">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="preacher" name="preach[preacher]" placeholder="講道牧師">
                            </div>
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <div class="input-group input-group-sm">
                                        <h5>序言</h5>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat newReadingBtn" data-target="preface">新增</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="box-body" id="preface" data-id="preach[preface]">
                                </div>
                            </div>
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <div class="input-group input-group-sm">
                                        <h5>證道大鋼</h5>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat newOutlineBtn" data-target="outlines">新增</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="box-body" id="outlines">
                                </div>
                            </div>
                            <div class="box box-primary">
                                <div class="box-header with-border">
                                    <div class="input-group input-group-sm">
                                        <h5>結論</h5>
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-info btn-flat newReadingBtn" data-target="conclusion">新增</button>
                                        </span>
                                    </div>
                                </div>
                                <div class="box-body" id="conclusion" data-id="preach[conclusion]">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php printSimpleRow('奉獻', 'tithing'); ?>
            <?php printSimpleRow('新朋友', 'visitor'); ?>
            <?php printReportRow('報告', 'newReportBtn', 'report'); ?>
            <?php printReportRow('代禱', 'newIntercessionBtn', 'intercession'); ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="input-group input-group-sm">
                                <h4>上周奉獻</h4>
                            </div>
                        </div>
                        <div class="box-body">
                            <input type="hidden" name="dedication[type]" value="dedication">
                            <div class="form-group">
                                <input type="text" class="form-control" name="dedication[summary]" placeholder="奉獻統計">
                            </div>
                            <?php for ($i = 0; $i < 4; $i++) { $id = uuidv4(); ?>
                            <div class="form-group">
                                <div class="col-md-2">
                                    <input type="text" class="form-control" name="dedication[collections][<?=$id;?>][type]" placeholder="類別">
                                </div>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" name="dedication[collections][<?=$id;?>][sum]" placeholder="統計">
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <div class="input-group input-group-sm">
                                <h4>金句</h4>
                            </div>
                        </div>
                        <div class="box-body">
                            <input type="hidden" name="weeklyVerse[type]" value="weeklyVerse">
                            <div class="form-group">
                                <input type="text" class="form-control" name="weeklyVerse[collections][verse]" placeholder="經文">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="weeklyVerse[collections][chapter]" placeholder="經文出處">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php printReportRow('大主日 - 受洗人', 'newBaptizeBtn', 'baptize'); ?>
            <?php printHymnRow('主日 - 唱詩 (3)', 'hymn3'); ?>
            <?php printSimpleRow('主禱文', 'lordsPrayer'); ?>
            <?php printSimpleRow('結束', 'ending'); ?>
            <div class="row">
                <div class="col-md-3">
                    <span class="input-group-btn">
                        <input type="submit" class="btn btn-info btn-flat" value="OHP!">
                    </span>
                </div>
                <div class="col-md-3">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="useLogo" value="1">使用 Logo
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </section>
</div>
</body>
<!-- jQuery 3 -->
<script src="assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="assets/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
    $(document).ready(function() {
        //Initialize Select2 Elements
		$(document).on('click', '.newReportBtn', function() {
            var id = uuidv4();
            var holder = $(this).data('target');
            $('#' + holder).append("" +
                "<div class=\"input-group input-group-sm rootGroup\">" +
                "   <span class=\"input-group-addon deleteBtn\">" +
                "       <i class=\"fa fa-close\"></i>" +
                "   </span>" +
				"   <input type=\"text\" class=\"form-control\" name=\"" + holder + "[collections]["+id+"]\" placeholder=\"\">" +
				"</div>"
			);
		});

        $(document).on('click', '.newBaptizeBtn', function() {
            var id = uuidv4();
            var holder = $(this).data('target');
            $('#' + holder).append("" +
                "<div class=\"input-group input-group-sm rootGroup\">" +
                "   <span class=\"input-group-addon deleteBtn\">" +
                "       <i class=\"fa fa-close\"></i>" +
                "   </span>" +
                "   <input type=\"text\" class=\"form-control\" name=\"" + holder + "[collections]["+id+"]\" placeholder=\"\">" +
                "</div>"
            );
        });

		$(document).on('click', '.newIntercessionBtn', function() {
            var id = uuidv4();
            var holder = $(this).data('target');
            $('#' + holder).append("" +
                "<div class=\"input-group input-group-sm rootGroup\">" +
                "   <span class=\"input-group-addon deleteBtn\">" +
                "       <i class=\"fa fa-close\"></i>" +
                "   </span>" +
				"   <input type=\"text\" class=\"form-control\" name=\"" + holder + "[collections]["+id+"]\" placeholder=\"\">" +
				"</div>"
			);
		});

		$(document).on('click', '.deleteBtn', function() {
			$(this).parents('.rootGroup').remove();
		});

		$(document).on('click', '.newWorshipBtn', function() {
            var btnSelector = $(this);
            $.ajax({
                url: '/worshipListRetriever.php',
                type: 'get',
                dataType: "json"
            }).done(function(data) {
                var id = uuidv4();
                var holder = btnSelector.data('target');
                var html = "" +
                    "<div class=\"input-group input-group-sm rootGroup\">" +
                    "   <span class=\"input-group-addon deleteBtn\">" +
                    "       <i class=\"fa fa-close\"></i>" +
                    "   </span>" +
                    "   <select class=\"form-control select2 select2-hidden-accessible worshipSelector\" style=\"width: 100%\" name=\"" + holder + "[collections]["+id+"]\">" +
                    "			<option value=\"\"></option>";
                $.each(data, function(key, value) {
                    html += '<option value="' + value + '">' + value + '</value>';
                });
                html +=
                    "   </select>" +
                    "</div>";
                $('#' + holder).append(html);
                $('.worshipSelector').select2();
            });
        });

		$(document).on('click', '.newHymnBtn', function() {
		    var btnSelector = $(this);
            $.ajax({
                url: '/hymnListRetriever.php',
                type: 'get',
                dataType: "json"
            }).done(function(data) {
                var id = uuidv4();
                var holder = btnSelector.data('target');
                var html = "" +
                    "<div class=\"input-group input-group-sm rootGroup\">" +
                    "   <span class=\"input-group-addon deleteBtn\">" +
                    "       <i class=\"fa fa-close\"></i>" +
                    "   </span>" +
                    "   <select class=\"form-control select2 select2-hidden-accessible hymnSelector\" style=\"width: 100%\" name=\"" + holder + "[collections]["+id+"]\">" +
                    "			<option value=\"\"></option>";
                $.each(data, function(key, value) {
                    html += '<option value="' + value + '">' + value + '</value>';
                });
                html +=
                    "   </select>" +
                    "</div>";
                $('#' + holder).append(html);
                $('.hymnSelector').select2();
            });
        });

		$(document).on('click', '.newReadingBtn', function() {
		    var id = uuidv4();
            var holder = $(this).data('target');
            var holderSelector = $('#' + holder);
            var nameVal = holderSelector.data('id');
            if (nameVal == undefined) {
                nameVal = holder;
            }
            holderSelector.append("" +
				"<div class=\"input-group input-group-sm rootGroup\">" +
				"	<span class=\"input-group-addon deleteBtn\">" +
				"		<i class=\"fa fa-close\"></i>" +
				"	</span>" +
				"	<div class=\"col-md-3\">" +
				"		<label>卷</label>" +
				"		<select class=\"form-control select2 select2-hidden-accessible bookSelector\" style=\"width: 100%\" name=\"" + nameVal + "[collections]["+id+"][book]\">" +
				"			<option value=\"\"></option>" +
				<?php
				foreach (\Core\VerseTable::$table as $shortName => $details) {
					echo '"				<option value=\"' . $details[2] . '\">' . $shortName . ' - ' . $details[0] . ' (' . $details[2] . ')' . '</option>" +';
				}
				?>
				"		</select>" +
				"	</div>" +
				"	<div class=\"col-md-3\">" +
				"		<label>章</label>" +
				"		<select class=\"form-control select2 select2-hidden-accessible chapterSelector\" style=\"width: 100%\" name=\""+nameVal+"[collections]["+id+"][chapter]\">" +
				"		</select>" +
				"	</div>" +
				"	<div class=\"col-md-3\">" +
				"		<label>開始</label>" +
				"		<select class=\"form-control select2 select2-hidden-accessible segmentStartSelector\" style=\"width: 100%\" name=\""+nameVal+"[collections]["+id+"][start]\">" +
				"		</select>" +
				"	</div>" +
				"	<div class=\"col-md-3\">" +
				"		<label>結束</label>" +
				"		<select class=\"form-control select2 select2-hidden-accessible segmentEndSelector\" style=\"width: 100%\" name=\""+nameVal+"[collections]["+id+"][end]\">" +
				"		</select>" +
				"	</div>" +
				"</div>"
			);
            $('.bookSelector').select2();
            $('.chapterSelector').select2();
            $('.segmentStartSelector').select2();
            $('.segmentEndSelector').select2();
        });

		$(document).on('click', '.newOutlineBtn', function() {
		    var id = uuidv4();
		    var outlineId = uuidv4();
            var holder = $(this).data('target');
            $('#' + holder).append("" +
                "<div class=\"box box-primary\">" +
                "<div class=\"box-header with-border\">" +
                "<div class=\"form-group\">" +
                "<input type=\"text\" class=\"form-control\" name=\"preach[outline]["+id+"][title]\" placeholder=\"大綱\">" +
                "</div>" +
                "<div class=\"input-group input-group-sm\">" +
                "<h6>讀經</h6>" +
                "<span class=\"input-group-btn\">" +
                "<button type=\"button\" class=\"btn btn-info btn-flat newReadingBtn\" data-target=\""+outlineId+"\">新增</button>" +
                "</span>" +
                "</div>" +
                "</div>" +
                "<div class=\"box-body\" id=\""+outlineId+"\" data-id=\"preach[outline]["+id+"]\">" +
                "</div>" +
                "</div>"
            );
        });

		$(document).on('change', '.bookSelector', function() {
            var rootGroup = $(this).parents('.rootGroup');
            var book = $(this).children("option:selected"). val();
            $.ajax({
                url: '/bibleListRetriever.php',
                type: 'get',
                dataType: "json",
                data: {
                    book: book
                }
            }).done(function(data) {
                updateChapterSelector(rootGroup, data);
            });
        });

		$(document).on('change', '.chapterSelector', function() {
		    var rootGroup = $(this).parents('.rootGroup');
            var book = rootGroup.find('.bookSelector').children("option:selected"). val();
            var chapter = $(this).children("option:selected"). val();
            // var book = $(this).children("option:selected"). val();
            $.ajax({
                url: '/bibleListRetriever.php',
                type: 'get',
                dataType: "json",
                data: {
                    book: book,
                    chapter: chapter
                }
            }).done(function(data) {
                updateSegmentSelector(rootGroup, data);
            });
        });

        function uuidv4() {
            return 'xxxxxxxx-xxxx-4xxx-yxxx-xxxxxxxxxxxx'.replace(/[xy]/g, function(c) {
                var r = Math.random() * 16 | 0, v = c == 'x' ? r : (r & 0x3 | 0x8);
                return v.toString(16);
            });
        }

        function updateChapterSelector(rootGroup, list) {
            var selector = rootGroup.find('.chapterSelector');
            selector.find("option").remove();
            selector.append('<option value=""></value>');
            $.each(list, function(key, value) {
                selector.append('<option value="' + value + '">' + value + ' 章</value>');
            });
        }

        function updateSegmentSelector(rootGroup, list) {
            var startSelector = rootGroup.find('.segmentStartSelector');
            var endSelector = rootGroup.find('.segmentEndSelector');

            startSelector.find("option").remove();
            endSelector.find("option").remove();

            startSelector.append('<option value=""></value>');
            endSelector.append('<option value=""></value>');
            $.each(list, function(key, value) {
                startSelector.append('<option value="' + value + '">' + value + ' 節</value>');
                endSelector.append('<option value="' + value + '">' + value + ' 節</value>');
            });
        }

        $('*[data-target="worship"]').trigger("click");
        $('*[data-target="worship"]').trigger("click");
        $('*[data-target="worship"]').trigger("click");
        $('*[data-target="worship"]').trigger("click");
        $('*[data-target="hymn1"]').trigger("click");
        $('*[data-target="hymn2"]').trigger("click");
        $('*[data-target="outlines"]').trigger("click");
        $('*[data-target="outlines"]').trigger("click");
        $('*[data-target="outlines"]').trigger("click");
        $('*[data-target="report"]').trigger("click");
        $('*[data-target="report"]').trigger("click");
        $('*[data-target="report"]').trigger("click");
        $('*[data-target="report"]').trigger("click");
        $('*[data-target="report"]').trigger("click");
        $('*[data-target="report"]').trigger("click");
        $('*[data-target="report"]').trigger("click");
        $('*[data-target="report"]').trigger("click");
        $('*[data-target="intercession"]').trigger("click");
        $('*[data-target="intercession"]').trigger("click");
        $('*[data-target="hymn3"]').trigger("click");
    });
</script>
</html>
<?php

function printSimpleRow($title, $target) {
    echo '
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="input-group input-group-sm">
                        <h4>' . $title . '</h4>
                    </div>
                </div>
                <div class="box-body">
                    <input type="hidden" name="' . $target . '[type]" value="' . $target . '">
                </div>
            </div>
        </div>
    </div>
    ';
}

function printHymnRow($title, $target) {
    echo '
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="input-group input-group-sm">
                        <h4>' . $title . '</h4>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat newHymnBtn" data-target="' . $target . '">新增</button>
                        </span>
                    </div>
                </div>
                <div class="box-body" id="' . $target . '">
                    <input type="hidden" name="' . $target . '[type]" value="hymn">
                </div>
            </div>
        </div>
    </div>
    ';
}

function printWorshipRow($title, $target) {
    echo '
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="input-group input-group-sm">
                        <h4>' . $title . '</h4>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat newWorshipBtn" data-target="' . $target . '">新增</button>
                        </span>
                    </div>
                </div>
                <div class="box-body" id="' . $target . '">
                    <input type="hidden" name="' . $target . '[type]" value="worship">
                </div>
            </div>
        </div>
    </div>
    ';
}

function printReportRow($title, $btnClass, $target) {
    echo '
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="input-group input-group-sm">
                        <h4>' . $title . '</h4>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat ' . $btnClass . '" data-target="' . $target . '">新增</button>
                        </span>
                    </div>
                </div>
                <div class="box-body" id="' . $target . '">
                    <input type="hidden" name="' . $target . '[type]" value="' . $target . '">
                </div>
            </div>
        </div>
    </div>
    ';
}

function uuidv4()
{
    return sprintf( '%04x%04x-%04x-%04x-%04x-%04x%04x%04x',
        // 32 bits for "time_low"
        random_int( 0, 0xffff ), random_int( 0, 0xffff ),

        // 16 bits for "time_mid"
        random_int( 0, 0xffff ),

        // 16 bits for "time_hi_and_version",
        // four most significant bits holds version number 4
        random_int( 0, 0x0fff ) | 0x4000,

        // 16 bits, 8 bits for "clk_seq_hi_res",
        // 8 bits for "clk_seq_low",
        // two most significant bits holds zero and one for variant DCE1.1
        random_int( 0, 0x3fff ) | 0x8000,

        // 48 bits for "node"
        random_int( 0, 0xffff ), random_int( 0, 0xffff ), random_int( 0, 0xffff )
    );
}