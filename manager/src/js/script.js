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

function changeManagerModalEdit(entryID, companyName, entryDate, entryProblem, entryStatus){
  $("#edit_entryid").text(entryID);
  $("#edit_entryForm").attr("action", `./src/post/mp_editentry.php?id=${entryID}`);
  $("#edit_companyName").attr("value",`${companyName}`);
  $("#edit_entryDate").attr("value",`${entryDate}`);
  $("#edit_entryProblem").attr("value",`${entryProblem}`);
  document.getElementById("edit_entryStatus").value = entryStatus;
  $("#m_edit_number").text(entryID);
}
