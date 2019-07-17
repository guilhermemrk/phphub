const capitalize = (string) => {
  if (typeof s !== 'string') return '';
  return string.charAt(0).toUpperCase() + string.slice(1)
}

function addModal(click, modal){
  $(`#${click}`).click(function(){
    $(`#${modal}`).addClass('is-active');
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
  $("#edit_entryid").attr("value",`${entryID}`);
  $("#edit_entryForm").attr("action", `./src/post/mp_editentry.php?id=${entryID}`);
  $("#edit_companyName").attr("value",`${companyName}`);
  $("#edit_entryDate").attr("value",`${entryDate}`);
  $("#edit_entryProblem").attr("value",`${entryProblem}`);

  document.getElementById("edit_entryStatus").value = entryStatus;

  $("#m_edit_number").text(entryID);
}
