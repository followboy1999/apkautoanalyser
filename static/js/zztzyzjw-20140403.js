var selectedFile = null;
var selectedFileName = null;
var currentUpload = null;

var timeDiff = {setStartTime: function() {
        d = new Date();
        time = d.getTime()
    },getDiff: function() {
        d = new Date();
        return (d.getTime() - time)
    }};
function uploadProgress(a) {
    if (a.lengthComputable) {
        var b = Math.round(a.loaded * 100 / a.total);
        $("#upload-progress").css("width", b + "%")
    }
}
function uploadComplete(a) {

    $("#upload-progress").css("width", "100%");
    if (this.responseText == "error"){
        $("#dlg-upload-progress").hide();
        uploadFailed(a);
    }else{
        $("#dlg-upload-progress").hide();
        $("#dlg-analyse-process").show();
        window.setTimeout(function() {

            window.top.location.href = "/appautoanalyse/index.php?do=analyse";
        },1000);
    }
    /*
    var c = this.getResponseHeader("Content-Type");
    if (c == "application/json") {
        var b = $.parseJSON(this.responseText);
        window.setTimeout(function(e) {
            window.location.href = e.analysis_url
        }, 1000, b)
    } else {
        window.setTimeout(function(e) {
            $("#dlg-upload-progress").html(e);
            $("#dlg-upload-progress").show()
        }, 1000, this.responseText)
    }
    */
//    $("#dlg-upload-progress").hide();
    
 //   $.ajax({type: "GET",async: true,url: "/appautoanalyse/index.php?do=analyse",dataType: "json",data: "",context: "",cache: false,success: function(g) {}});

}
function uploadFailed(a) {
    alert("There was an error attempting to upload the file.")
}
function cancelUpload() {
    if (currentUpload) {
        currentUpload.abort()
    }
}
function uploadFile(a, b, c) {
    var e = {};
    if (c && a) {
        e = {sha256: c,filename: a}
    }
    var f = $("#frm-file").attr("action");
    $.ajax({type: "GET",async: true,url: f,dataType: "json",data: e,context: {filename: a},cache: false,success: function(g) {
            if (g.type_error){
                alert("upload file type error!");
                window.top.location.href = "/appautoanalyse/index.php?do=index";
                return;
            }

            if (g.file_exists) {
                $("#btn-file-reanalyse").attr("href", g.reanalyse_url);
                $("#btn-file-view-last-analysis").attr("href", g.last_analysis_url);
                $("#dlg-upload-progress").modal("hide");
                $("div#dlg-file-analysis-confirmation span#last-analysis-date").html(g.last_analysis_date);
                $("div#dlg-file-analysis-confirmation span#first-analysis-date").html(g.first_analysis_date);
                $("#dlg-file-analysis-confirmation").modal("show");  
                if (g.empty_file) {
                    $("#empty-file-warning").show()
                }             
            } else {
                if (b && window.FormData) {
                    var h = new FormData();
                    h.append("file", b);
                    h.append("ajax", "true");
                    h.append("remote_addr", g.remote_addr);
                    if (c) {
                        h.append("sha256", c)
                    }
                    if (selectedFile.lastModifiedDate != undefined) {
                        h.append("last_modified", selectedFile.lastModifiedDate.toISOString())
                    }
                    currentUpload = new XMLHttpRequest();
                    currentUpload.upload.addEventListener("progress", uploadProgress, false);
                    currentUpload.addEventListener("load", uploadComplete, false);
                    currentUpload.addEventListener("error", uploadFailed, false);
                    currentUpload.open("POST", g.upload_url);
                    currentUpload.send(h)
                } else {
                    $("#frm-file").attr("action", g.upload_url);
                    $("#frm-file").submit();
                    $("#gif-upload-progress-bar span").html('<img style="display:block" src="/static/img/bar.gif">')
                }
            }
        }})
}
function canUserWorker() {
    if (window.FileReader && window.Worker) {
        var a = parseInt(jQuery.browser.version, 10);
        if (jQuery.browser.opera) {
            return false
        }
        if (jQuery.browser.mozilla && a >= 13) {
            return true
        }
        if (jQuery.browser.webkit && a >= 535) {
            return true
        }
    }
    return false
}
function scanFile(a) {
    if (!selectedFileName) {
        return
    }
    if (selectedFile && selectedFile.size > 10 * 1024 *1024) {
        $("#dlg-file-too-large").modal("show");
        return
    }
    $("#dlg-upload-progress").modal("show");
    if (canUserWorker()) {
        $("#upload-progress-bar").hide();
        $("#hash-progress").css("width", "0%");
        $("#hash-progress-bar").show();
        worker = new Worker("/appautoanalyse/static/js/sha256.js?20131114-06");
        worker.onmessage = function(b) {
            if (b.data.progress) {
                $("#hash-progress").css("width", b.data.progress + "%")
            } else {
                $("#hash-progress-bar").hide();
                $("#upload-progress").css("width", "0%");
                $("#upload-progress-bar").show();
                uploadFile(selectedFileName, selectedFile, b.data.sha256)
            }
        };
        worker.postMessage({file: selectedFile})
    } else {
        $("#gif-upload-progress-bar").show();
        uploadFile(selectedFileName, null, null)
    }
}
function selectFile(a) {
    if (a.target.files) {
        selectedFile = a.target.files[0]
    }
    var b = $(this).val().split(/(\\|\/)/g);
    selectedFileName = b[b.length - 1];
    $("#file-name").text(selectedFileName);
    $("#btn-scan-file").focus()
}
function error(){
    alert("sorry,error!");
    window.top.location.href = "/appautoanalyse/index.php?do=index";
}
jQuery(document).ready(function() {

    $(".action").click(function(a) {
        var b = $(this).attr("id");
        $("input#" + b).select()
    });
    $("#btn-scan-file").click(scanFile);
    $("input#file-choosen").change(selectFile);
    $(".btn.dialog").click(function() {
        $(this).siblings(".loading").show();
        $(this).siblings(".btn").addClass("disabled");
        $(this).addClass("disabled")
    });

});
