function addModal(modal){
  $(`#${modal}`).addClass('is-active');
  $(document).keydown(function(event) {
  if (event.keyCode == 27) {
    $(`#${modal}`).removeClass('is-active');
  }
  });
}
function removeModal(modal){
    $(`#${modal}`).removeClass('is-active');
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
  $("#edit_entryProblem").text(`${entryProblem}`);
  document.getElementById("edit_entryStatus").value = entryStatus;
}

function changeManagerModalEditNfe(entryID, companyid, companyName, status, model, procedure, id, nv, nf, problem){
  $("#nfe_edit_number").text(entryID);
  $("#edit_nfeform").attr("action", `./src/post/mp_editnfe.php?id=${entryID}`);
  $("#editnfe_companyName").attr("value",`${companyName}`);
  $("#editnfe_id").attr("value",`${id}`);
  $("#editnfe_nv").attr("value",`${nv}`);
  $("#editnfe_nf").attr("value",`${nf}`);
  $("#editnfe_problem").text(`${problem}`);
  document.getElementById("editnfe_status").value = status;
  document.getElementById("editnfe_model").value = model;
  document.getElementById("editnfe_procedure").value = procedure;
  document.getElementById("edit_nfe_companyid").value = companyid;
}

function entityOverview(companyid, companyName, phone, phoneSec, emailP, emailA, isActive, addedBy, city, dateAdded, remoteLink){

  // Regex patterns
  const phoneParttern10 = /(\d{2})(\d{4})(\d*)/;
  const phoneParttern11 = /(\d{2})(\d{1})(\d{4})(\d*)/;
  const phoneParttern13 = /(\d{3})(\d{2})(\d{4})(\d*)/;
  const phoneParttern14 = /(\d{3})(\d{2})(\d{5})(\d*)/;
  // Phone formatting
  if (phone.length == 10){ phoneFormatted = phone.replace(phoneParttern10, "($1) $2-$3"); }
  else if (phone.length == 11){ phoneFormatted = phone.replace(phoneParttern11, "($1) $2 $3-$4"); }
  else if (phone.length == 13){ phoneFormatted = phone.replace(phoneParttern13, "$1 ($2) $3-$4"); }
  else if (phone.length == 14){ phoneFormatted = phone.replace(phoneParttern14, "$1 ($2) $3-$4"); }
  else { phoneFormatted = 'Não informado.' }
  if (phoneSec.length == 10){ phoneSecFormatted = phoneSec.replace(phoneParttern10, "($1) $2-$3"); }
  else if (phoneSec.length == 11){ phoneSecFormatted = phoneSec.replace(phoneParttern11, "($1) $2 $3-$4"); }
  else if (phoneSec.length == 13){ phoneSecFormatted = phoneSec.replace(phoneParttern13, "$1 ($2) $3-$4"); }
  else if (phoneSec.length == 14){ phoneSecFormatted = phoneSec.replace(phoneParttern14, "$1 ($2) $3-$4"); }
  else { phoneSecFormatted = 'Não informado.' }
  // Misc formatting
  if (remoteLink.length <= 0){ remoteLink = "Não informado."; }
  if (emailP.length == 0){ emailP = "Não informado."; }
  if (emailA.length == 0){ emailA = "Não informado."; }
  if (isActive == 1){ isActive = "Sim"; } else { isActive = "Não"; }

  $("#ent_companyid").text(`${companyid}`);
  $("#ent_companyName").text(`${companyName}`);
  $("#ent_modaltitle").text(`${companyName}`);
  $("#ent_phone").text(`${phoneFormatted}`);
  $("#ent_phoneSec").text(`${phoneSecFormatted}`);
  $("#ent_emailP").text(`${emailP}`);
  $("#ent_emailA").text(`${emailA}`);
  $("#ent_addedBy").text(`${addedBy}`);
  $("#ent_city").text(`${city}`);
  $("#ent_dateAdded").text(`${dateAdded}`);
  $("#ent_remoteLink").text(`${remoteLink}`);
  $("#ent_isActive").text(`${isActive}`);
}

document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    $notification = $delete.parentNode;
    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});
