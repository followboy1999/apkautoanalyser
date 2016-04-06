
<title>
AntiAppVirus scan for 6a937bc213630e5d0757028201deb90e at AppAutoAnalyse
</title>


<link rel="stylesheet" type="text/css" href="/appautoanalyse/static/css/20140201.css">

<script src="/appautoanalyse/static/js/jquery.min.js"></script>
<script src="http://www.w3cschool.cc/try/bootstrap/twitter-bootstrap-v2/js/bootstrap-modal.js"></script>


<script src="/appautoanalyse/static/js/zztzyzjw-20140403.js" async></script>
<script src="/appautoanalyse/static/js/sha256.min-2013111401.js" async></script>

  
<script src="/appautoanalyse/static/js/jquery.tablesorter.min.js"></script>
<script src="/appautoanalyse/static/js/jquery.tinymce.js?v=7"></script>
<script src="/appautoanalyse/static/js/jquery.stream.js?v=8"></script>

<script src="/appautoanalyse/static/js/bootmin-2013092601.js"></script>
<script src="/appautoanalyse/static/js/base.min-2013121902.js"></script>

<script type="text/javascript">

var collapseBasicInfo = true;

var mustRefresh = true;


function refresh(lastStatus) {

  var data = {};

  var request = $.ajax({
      type: 'GET',
      async: true,
      url: window.location.pathname + '?do=update',
      data: data,
      dataType: 'json',
      cache: false,
      success: function(response) {

        if (response.info) {
          $('#basic-info').html(response.info);
        }

        if (response.results) {
          $('#tabs').show();
          $('div#results').html(response.results);
        }

        if (response.additional) {
          $('div#tools').html(response.additional);
          $('#tabs').show();
          $('#tab-additional-info').show();
        }


        if ($('#tab-item-behaviour').hasClass('hide') && (response.behaviour != undefined)) {
          $('#behavioural-info').html(response.behaviour);
          $('#tabs').show();
          $('#tab-item-behaviour').show();
        }

        if (response.status == 'completed') {
          $('#message').fadeOut(1500);
        }
        else if(response.status == 'failed') {
          window.location = response.analysis_failed_url;
        }
        else {
          window.setTimeout(function() {
            refresh(response.status);
          }, response.refresh);
        }

    },
    error: function() {
      window.setTimeout(function() { refresh(lastStatus); }, 3000);
    }
  }); // $.ajax()
}

$(document).ready(function(){


//    $('#tabs').hide();
//    window.setTimeout(refresh, 3000);


</script>

<div class="wrapper">
    

<div class="container" style="padding:40px 0">

  <div class="clearfix">
     <div class="margin-top-2">
      <a href="">
        <!--
        <img src="https://www.virustotal.com/static/img/logo-small.png" alt="AppAutoAnalyse">
      -->
      </a>
    </div>
  </div>

  <div class="frame" style="margin:20px 0">
    <div id="basic-info">

    <div class="row">
      <div class="span8 columns">
        <table style="margin-bottom:8px;margin-left:8px;">
          <tbody>
            <tr>
              <td>SHA256:</td>
              <td>27a01968afe1f2beaba0f8db12a77b2ebd3db6a1cb4919b2a7da76bb9e43643c</td>
            </tr>
           
            <tr>
              <td>FileName:</td>
              <td>ppm-perl-area.db</td>
            </tr>
            <tr>
              <td>AnalysisDate:</td>
              <td >
                2013-05-06 11:19:01 UTC 
              </td>
            </tr>
          </tbody>
        </table>
      </div>

    </div>      
  </div>
</div>

<ul id="tabs" class="nav nav-tabs" style="float:none">
    <li class="active">
      <a href="#analysis" data-toggle="tab" tab="analysis">
        <i class="icon-list-alt"></i> Analysis
      </a>
    </li>

    
    <li>
      <a href="#additional-info" data-toggle="tab" tab="additional-info"
         >
        <i class="icon-info-sign"></i> Additional information
      </a>
    </li>
</ul>



<div class="tab-content" style="overflow:visible">
<div id="file-details" class="extra-info">

  <h5><i class="icon-question-sign"></i> Access List</h5>
  <div class="enum-container">
    <div class="enum">
      <span class="field-key"></span>
    </div>
    <div class="enum">
      <span class="field-key"></span> 
    </div>
    <div class="enum">
      <span class="field-key"></span> 
    </div>
    <div class="enum">
      <span class="field-key"></span>
    </div>
    <div class="enum">
      <span class="field-key"></span>
    </div>
    <div class="enum">
       <span class="field-key"></span>
    </div>
    <div class="enum">
       <span class="field-key"></span>
    </div>
  </div>

  <h5><i class="icon-question-sign"></i>File access</h5>
  <div class="enum-container">
    <div class="enum">
      <span class="field-key"></span>
    </div>
  </div>

  <h5><i class="icon-question-sign"></i>Network access</h5>
  <div class="enum-container">
    <div class="enum">
      <span class="field-key"></span>
    </div>
  </div>

  <h5><i class="icon-question-sign"></i>Autorun type</h5>
  <div class="enum-container">
    <div class="enum">
      <span class="field-key"></span>
    </div>
  </div>
</div>
       
</div>

  <script>
  /*
  $('.tooltip').hide();
  $("i[data-toggle=tooltip]").tooltip();
  */
  </script>        

</div>
</div>


<div class="tab-pane" id="additional-info">

  <div id="additional-info-wait" class="center hide" >
    <img style="padding: 10px 10px;" src="/static/img/wait.gif"/>
  </div>

  <div id="additional-info-error" class="center" style="display:none">
    An error occurred
  </div>

<div id="additional-info-content">   


<div id="file-details" class="extra-info">

  <h5><i class="icon-question-sign"></i> File Identification</h5>
  <div class="enum-container">
  <div class="enum">
  <span class="field-key">File Name</span>
  </div>
  <div class="enum">
    <span class="field-key">MD5</span>
  </div>
  <div class="enum">
    <span class="field-key">SHA1</span> 
  </div>
  <div class="enum">
    <span class="field-key">SHA256</span> 
  </div>

  <div class="enum">
    <span class="field-key">File size</span>
  </div>
  <div class="enum">
    <span class="field-key">Certificate information</span>
  </div>
  <div class="enum">
     <span class="field-key">Package name</span>
  </div>
  <div class="enum">
     <span class="field-key">Version information</span>
  </div>
  </div>

  <h5><i class="icon-ticket"></i>Analyse History</h5>
  <div class="enum-container">
  <div class="enum">
    <span class="field-key">First submission</span>
  </div>
  <div class="enum">
    <span class="field-key">Last submission</span>
  </div>

  </div>


</div>

</div>
</div>



