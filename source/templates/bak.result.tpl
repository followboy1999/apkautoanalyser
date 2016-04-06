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
 <!--<div class="clearfix">
     <div class="margin-top-2">
      <a href="">
       
        <img src="https://www.virustotal.com/static/img/logo-small.png" alt="AppAutoAnalyse">

      </a>
    </div>
  </div>
-->
  <div class="frame" style="margin:20px 0">
    <div id="basic-info">

    <div class="row">
      <div class="span8 columns">
        <table style="margin-bottom:8px;margin-left:8px;">
          <tbody>
            <tr>
              <td>SHA256:</td>
              <td>{$SHA256}</td>
            </tr>
           
            <tr>
              <td>FileName:</td>
              <td>{$FileName}</td>
            </tr>
            <tr>
              <td>AnalysisDate:</td>
              <td >{$LastTime}</td>
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
<div class="tab-pane active" id="analysis">
<div id="results">
<div id="active-tab" class="extra-info">

  <h5><i class="icon-question-sign"></i>Risk Level&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp{$Level}</h5>

  <div class="enum-container">
    <div class="enum">
      <span class="field-key">RedFlags</span><br>
        {section name=outer loop=$Risk}
        {$Risk[outer]}<br>
        {/section}
    </div>
    <div class="enum">
      <span class="field-key">FuzzyRisk</span><br>
        <font color="red">{$RiskValue}</font><br>
    </div>
  </div>


  <h5><i class="icon-question-sign"></i> Permissions List</h5>
  <div class="enum-container">
     <div class="enum">
      {section name=outer loop=$Perm}
      {$Perm[outer]}<br>
      {/section}
    </div>
<!--
    <div class="enum">
      <span class="field-key">wifi connection</span> 
    </div>
    <div class="enum">
       <span class="field-key">network type</span>
    </div>
-->
  </div>


  <h5><i class="icon-ticket"></i> Autorun Type</h5>
  <div class="enum-container">
    <div class="enum">
      <span class="field-key"></span>
    </div>
  </div>
  <h5><i class="icon-question-sign"></i>File Access</h5>
  <table>
    <tbody>
      <tr>
        <td style="width:50px">[create]</td>
        <td>/mnt/xxxxxxxxxx</td>
      </tr>
      <tr>
        <td>[read]</td>
        <td>/data/xxxxxxxxx</td>
      </tr>
      <tr>
        <td>[write]</td>
        <td>/data/xxxxxxxxx</td>
      </tr>
      <tr>
        <td>[modified]</td>
        <td>/data/xxxxxxxxx</td>
      </tr>
    </tbody>
  </table>

  <h5><i class="icon-question-sign"></i>Network Access</h5>
  <table>
    <tbody>
      <tr>
        <td style="width:50px">[post]</td>
        <td>xxx/xxx.txt</td>
      </tr>
      <tr>
        <td>[get]</td>
        <td>xxx/xxx.gif</td>
      </tr>
    </tbody>
  </table>

  </div>
     
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
  <span class="field-key">file name</span>{$FileName}
  </div>
  <!--
  <div class="enum">
    <span class="field-key">md5</span>{$MD5}
  </div>
  <div class="enum">
    <span class="field-key">sha1</span> {$SHA1}
  </div>
-->
  <div class="enum">
    <span class="field-key">sha256</span>{$SHA256}
  </div>

  <div class="enum">
    <span class="field-key">file size</span>{$FileSize} KB
  </div>
  <div class="enum">
    <span class="field-key">certificate information</span>{$CertInfo}
  </div>
  <div class="enum">
     <span class="field-key">package name</span>{$PackName}
  </div>
  <div class="enum">
     <span class="field-key">version name</span>{$VerionInfo}
  </div>
  <div class="enum">
     <span class="field-key">sdk version</span>{$SdkVersion}
  </div>
  </div>

  <h5><i class="icon-ticket"></i>Analyse History</h5>
  <div class="enum-container">
  <div class="enum">
    <span class="field-key">first submission</span>{$FisrtTime}
  </div>
  <div class="enum">
    <span class="field-key">last submission</span>{$LastTime}
  </div>

  </div>


</div>

</div>
</div>
</div>


