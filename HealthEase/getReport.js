$(function(){
  $('.report').on('click',function(){
   var id = $(this).val();
   var dataString = 'pid='+ id;
   //window.alert(dataString);
   $.ajax({
       url: 'getReport.php',
       dataType: "json",
       data: dataString,
       cache: false,
       success: function(pData){
       if (pData) {
            $("#bp").text(pData.bp);
            $("#sg").text(pData.sg);
            $("#al").text(pData.al);
            $("#su").text(pData.su);
            if (pData.rbc != '') {
                if(pData.rbc == 1) {
                    $("#rbc").text("Normal");
                }
                else {
                    $("#rbc").text("Abnormal");
                }
            }
            if (pData.pc != '') {
                if(pData.pc == 1) {
                    $("#pc").text("Normal");
                }
                else {
                    $("#pc").text("Abnormal");
                }
            }
            if (pData.pcc != '') {
                if (pData.pcc == 1) {
                    $("#pcc").text('Present');
                }
                else {
                    $("#pcc").text('Not Present');
                }
            }
            if (pData.ba != '') {
                if (pData.ba == 1) {
                    $("#ba").text("Present");
                }
                else {
                    $("#ba").text("Not Present");
                }
            }
            $("#bgr").text(pData.bgr);
            $("#bu").text(pData.bu);
            $("#sc").text(pData.sc);
            $("#sod").text(pData.sod);
            $("#pot").text(pData.pot);
            $("#hemo").text(pData.hemo);
            $("#pcv").text(pData.pcv);
            $("#wbcc").text(pData.wbcc);
            $("#rbcc").text(pData.rbcc);
            if (pData.htn != '') {
                if (pData.htn == 1) {
                    $("#htn").text("Yes");
                }
                else{
                    $("#htn").text("No");
                }
            }
            if (pData.dm != '') {
                if (pData.dm == 1) {
                    $("#dm").text("Yes");
                }
                else {
                    $("#dm").text("No");
                }
            }
            if (pData.cad != '') {
                if (pData.cad == 1) {
                    $("#cad").text("Yes");
                }
                else {
                    $("#cad").text("No");
                }
            }
            if (pData.appet != '') {
                if (pData.appet == 1) {
                    $("#appet").text("Good");
                }
                else {
                    $("#appet").text("Bad");
                }
            }
            if (pData.pe != '') {
                if (pData.pe == 1) {
                    $("#pe").text("Yes");
                }
                else {
                    $("#pe").text("No");
                }
            }
            if (pData.ane != '') {
                if (pData.ane == 1) {
                    $("#ane").text("Yes");
                }
                else {
                    $("#ane").text("No");
                }
            }
            if (pData.ckd != '') {
                if (pData.ckd == 'ckd') {
                    $("#ckd").text('CKD Detected');
                }
                else{
                    if (pData.ckd == 'notckd') {
                        $("#ckd").text('CKD Not Detected');
                    }
                    else {
                        $("#ckd").text('Not Available');
                    }
                }
            }
        }
        }
    });
    })
});