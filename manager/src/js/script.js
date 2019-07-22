function addModal(click, modal){
  $(`#${click}`).click(function(){
    $(`#${modal}`).addClass('is-active');
  });
  $(document).keydown(function(event) {
  if (event.keyCode == 27) {
    $(`#${modal}`).removeClass('is-active');
  }
  });
}
function removeModal(click, modal){
  $(`#${click}`).click(function(){
    $(`#${modal}`).removeClass('is-active');
  });
}

function changeModalCloseNumber(modalUrlTo, entryIdToClose){
  $("#confirmclosenumber").attr("onclick",`window.location.href='${modalUrlTo}${entryIdToClose}'`);
  $("#closenumber").text(entryIdToClose);
}

function changeManagerModalEdit(entryID, companyid, companyName, entryDate, entryProblem, entryStatus){
  $("#m_edit_number").text(entryID);
  $("#edit_nfecompanyid").text(companyid);
  $("#edit_entryForm").attr("action", `./src/post/mp_editentry.php?id=${entryID}`);
  $("#edit_companyName").attr("value",`${companyName}`);
  $("#edit_entryDate").attr("value",`${entryDate}`);
  $("#edit_entryProblem").attr("value",`${entryProblem}`);
  document.getElementById("edit_entryStatus").value = entryStatus;
}

function changeManagerModalEditNfe(entryID, companyid, companyName, status, model, procedure, id, nv, nf, problem){
  $("#nfe_edit_number").text(entryID);
  $("#edit_nfecompanyid").text(companyid);
  $("#edit_nfeform").attr("action", `./src/post/mp_editnfe.php?id=${entryID}`);
  $("#editnfe_companyName").attr("value",`${companyName}`);
  document.getElementById("editnfe_status").value = status;
  document.getElementById("editnfe_model").value = model;
  document.getElementById("editnfe_procedure").value = procedure;
  $("#editnfe_id").attr("value",`${id}`);
  $("#editnfe_nv").attr("value",`${nv}`);
  $("#editnfe_nf").attr("value",`${nf}`);
  $("#editnfe_problem").attr("value",`${problem}`);
}
