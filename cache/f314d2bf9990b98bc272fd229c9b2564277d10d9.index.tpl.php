<?php /*%%SmartyHeaderCode:2066373751552cc8bd8475e5-10998991%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f314d2bf9990b98bc272fd229c9b2564277d10d9' => 
    array (
      0 => '/Applications/MAMP/htdocs/appautoanalyse/source/templates/index.tpl',
      1 => 1396662136,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2066373751552cc8bd8475e5-10998991',
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_552ccb5e4f9824_08040448',
  'has_nocache_code' => false,
  'cache_lifetime' => 120,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_552ccb5e4f9824_08040448')) {function content_552ccb5e4f9824_08040448($_smarty_tpl) {?><title>  
    AppAutoAnalyse - Free Online App Virus, Malware Scanner
</title>  

<link rel="stylesheet" type="text/css" href="/appautoanalyse/static/css/20140201.css">

<script src="/appautoanalyse/static/js/jquery.min.js"></script>
<script src="http://www.w3cschool.cc/try/bootstrap/twitter-bootstrap-v2/js/bootstrap-modal.js"></script>


<script src="/appautoanalyse/static/js/zztzyzjw-20140403.js" async></script>
<script src="/appautoanalyse/static/js/sha256.min-2013111401.js" async></script>


<div  class="container">

  <div id="logo" class="center">
    <!--
    <img width="595" height="94" src="https://www.virustotal.com/static/img/logo.png" alt="AppAutoAnalyse">
  -->
  </div>

  <div id="description" class="margin-top-2">
    AppAutoAnalyse is a free service that <em>analyzes suspicious files</em> and facilitates the quick detection of App Viruses and malwares.
  </div>        

  <ul id="action-options" class="tabs nav nav-tabs margin-top-2 center">
    <li class="active">
      <a data-toggle="tab">File
    </li>
  </ul>

   <div id="box" class="margin-top-3 margin-bottom-3 tab-content center">

    <div id="file" class="center box tab-pane active">
      <form id="frm-file" class="margin-all-0" action="/appautoanalyse/index.php?do=check" method="post" enctype="multipart/form-data">
        <div class="file-chooser center">
          <input id="file-choosen" type="file" name="file" size="50">
          <span id="file-name" class="file-name" style="-moz-user-select: none;text-align:left;">  
          </span>
          <span class="action" style="-moz-user-select:none;">
            Select File
          </span>
        </div>
      </form>

      <div class="text-gray">Maximum file size: 10MB</div>

      <div class="margin-top-3">
        <button id="btn-scan-file"
                class="btn btn-primary start xlarge"
                type="submit">Analyse</button>
      </div>
    </div>

<!-- file too large dialog -->
<div id="dlg-file-too-large" class="modal hide">
  <div class="modal-header">
     <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
    <h3>File too large</h3>
  </div>
  <div class="modal-body">
    <p>The submitted file exceeds the 64MB size limit.</p>
  </div>
  <div class="modal-footer">
    <a class="btn cancel" class="close" data-dismiss="modal" aria-hidden="true">Cancel</a>
  </div>
</div>

<!-- end file too large dialog -->

<!-- Upload progress dialog -->

<div id="dlg-upload-progress" class="modal hide">
  <div class="modal">
    <div class="modal-header">
      <a class="close" onclick="javascript:cancelUpload()" data-dismiss="modal" aria-hidden="true">x</a>
      <h3>Uploading file...</h3>
    </div>

    <div class="modal-body">
      <p>
        Please wait, do not close the window until the upload ends.
      </p>
      <p>
        The time required for this operation depends on the file size, the net load and your connection speed.
      </p>

      <div id="gif-upload-progress-bar" class="hide gif-progress-bar">
        <p>Please wait...</p>
        <span class="bar"></span>
      </div>

      <div id="hash-progress-bar" class="hide" >
        <p>Computing hash...</p>
        <div class="progress progress-danger progress-striped active">
          <div id="hash-progress" class="bar" style="width: 100%;">
          </div>
        </div>
      </div>

      <div id="upload-progress-bar" class="hide" >
        <p>Uploading file...</p>
        <div class="progress progress-danger progress-striped active">
          <div id="upload-progress" class="bar" style="width: 0%;">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- End of upload progress dialog -->


<!-- Re-analyse dialog -->

<div id="dlg-file-analysis-confirmation" class="modal hide">
  

  <div class="modal-header">
    <a class="close" data-dismiss="modal" aria-hidden="true">x</a>
    <h3>File already analysed</h3>
  </div>

  <div class="modal-body">
    <p>
      This file was last analysed on
      <strong><span id="last-analysis-date"> </span> UTC</strong>,
      it was first analysed on
      <strong><span id="first-analysis-date"> </span> UTC</strong>.
    </p>
    <p>
      You can take a look at the last analysis or analyse it right now.
    </p>
    <div id="empty-file-warning" class="alert"
         style="margin-bottom:0px;display:none;">
      <strong><i class="icon-warning-sign"></i> Warning!</strong>
      
      You submitted an empty file (0 bytes size).
      
    </div>
  </div>

  <div class="modal-footer">
    <img height="16" width="16" class="loading hide pull-left margin-top-1"
         alt="loading" src="/appautoanalyse/static/img/wait.gif"/>
    
    <a id="btn-file-reanalyse" class="btn"
       href="">
      Reanalyse</a>

    <a id="btn-file-view-last-analysis" class="btn btn-primary dialog"
       href="">
       View last analysis</a>

    
  </div>

</div>


<!-- End of re-analyse dialog -->


<!-- analyse process dialog -->
<div id="dlg-analyse-process" class="modal hide">
  <div class="modal-header">
    <h3>Analysing File...</h3>
  </div>
  <div class="modal-body">
    <p>The submitted file is being processed,please wait a minute.</p>
  </div>
</div>

<!-- End of analyse process dialog --><?php }} ?>
