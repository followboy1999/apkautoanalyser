<?php /* Smarty version Smarty-3.1.17, created on 2014-04-09 05:02:36
         compiled from "C:\xampp\htdocs\appautoanalyse\source\templates\result.tpl" */ ?>
<?php /*%%SmartyHeaderCode:293235344b41fc49825-79128991%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c7ff53325a9186682a057cf254014f83c9ce1ca4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\appautoanalyse\\source\\templates\\result.tpl',
      1 => 1397012527,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '293235344b41fc49825-79128991',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5344b42018eed2_61288533',
  'variables' => 
  array (
    'SHA256' => 0,
    'FileName' => 0,
    'LastTime' => 0,
    'Level' => 0,
    'Risk' => 0,
    'RiskValue' => 0,
    'Perm' => 0,
    'MD5' => 0,
    'SHA1' => 0,
    'FileSize' => 0,
    'CertInfo' => 0,
    'PackName' => 0,
    'VerionInfo' => 0,
    'SdkVersion' => 0,
    'FisrtTime' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5344b42018eed2_61288533')) {function content_5344b42018eed2_61288533($_smarty_tpl) {?><title>
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
}


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
              <td><?php echo $_smarty_tpl->tpl_vars['SHA256']->value;?>
</td>
            </tr>
           
            <tr>
              <td>FileName:</td>
              <td><?php echo $_smarty_tpl->tpl_vars['FileName']->value;?>
</td>
            </tr>
            <tr>
              <td>AnalysisDate:</td>
              <td ><?php echo $_smarty_tpl->tpl_vars['LastTime']->value;?>
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
        <i class="icon-list-alt"></i>Static Analysis
      </a>
    </li>

    <li>
      <a href="#dyanalysis" data-toggle="tab" tab="dyanalysis">
        <i class="icon-info-sign"></i>Dynamic Analysis
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

  <h5><i class="icon-question-sign"></i>Risk Level&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<?php echo $_smarty_tpl->tpl_vars['Level']->value;?>
</h5>

  <div class="enum-container">
    <div class="enum">
      <span class="field-key">RedFlags</span><br>
        <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['outer'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['name'] = 'outer';
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['Risk']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total']);
?>
        <?php echo $_smarty_tpl->tpl_vars['Risk']->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']];?>
<br>
        <?php endfor; endif; ?>
    </div>
    <div class="enum">
      <span class="field-key">FuzzyRisk</span><br>
        <font color="red"><?php echo $_smarty_tpl->tpl_vars['RiskValue']->value;?>
</font><br>
    </div>
  </div>


  <h5><i class="icon-question-sign"></i> Permissions List</h5>
  <div class="enum-container">
     <div class="enum">
      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['outer'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['name'] = 'outer';
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['Perm']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['outer']['total']);
?>
      <?php echo $_smarty_tpl->tpl_vars['Perm']->value[$_smarty_tpl->getVariable('smarty')->value['section']['outer']['index']];?>
<br>
      <?php endfor; endif; ?>
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
 

  </div>
     
</div>
</div>


<div class="tab-pane" id="dyanalysis">

<div id="dyanalysis-info-content">   
<div id="analysis-details" class="extra-info">

  <h5><i class="icon-question-sign"></i> Phone Calls</h5>

  <h5><i class="icon-question-sign"></i> Send SMS</h5>

  <h5><i class="icon-question-sign"></i> Recvsaction</h5>

  <h5><i class="icon-question-sign"></i> Data Leaks</h5>

  <h5><i class="icon-question-sign"></i> Fd Access</h5>


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
  <span class="field-key">file name</span><?php echo $_smarty_tpl->tpl_vars['FileName']->value;?>

  </div>
  <!--
  <div class="enum">
    <span class="field-key">md5</span><?php echo $_smarty_tpl->tpl_vars['MD5']->value;?>

  </div>
  <div class="enum">
    <span class="field-key">sha1</span> <?php echo $_smarty_tpl->tpl_vars['SHA1']->value;?>

  </div>
-->
  <div class="enum">
    <span class="field-key">sha256</span><?php echo $_smarty_tpl->tpl_vars['SHA256']->value;?>

  </div>

  <div class="enum">
    <span class="field-key">file size</span><?php echo $_smarty_tpl->tpl_vars['FileSize']->value;?>
 KB
  </div>
  <div class="enum">
    <span class="field-key">certificate information</span><?php echo $_smarty_tpl->tpl_vars['CertInfo']->value;?>

  </div>
  <div class="enum">
     <span class="field-key">package name</span><?php echo $_smarty_tpl->tpl_vars['PackName']->value;?>

  </div>
  <div class="enum">
     <span class="field-key">version name</span><?php echo $_smarty_tpl->tpl_vars['VerionInfo']->value;?>

  </div>
  <div class="enum">
     <span class="field-key">sdk version</span><?php echo $_smarty_tpl->tpl_vars['SdkVersion']->value;?>

  </div>
  </div>

  <h5><i class="icon-ticket"></i>Analyse History</h5>
  <div class="enum-container">
  <div class="enum">
    <span class="field-key">first submission</span><?php echo $_smarty_tpl->tpl_vars['FisrtTime']->value;?>

  </div>
  <div class="enum">
    <span class="field-key">last submission</span><?php echo $_smarty_tpl->tpl_vars['LastTime']->value;?>

  </div>

  </div>


</div>

</div>
</div>
</div>


<?php }} ?>
