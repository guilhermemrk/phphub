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

function changeModalCloseNumber(urlTo, entryIdToClose){
  $("#confirmclosenumber").attr("action",`${urlTo}${entryIdToClose}`);
  $("#closenumber").text(entryIdToClose);
}

function closeSped(urlTo, entryIdToClose, companyName){
  $("#confirmclosesped").attr("action",`${urlTo}${entryIdToClose}`);
  $("#spedCompanyName").text(companyName);
}

function editSped(urlTo, entryIdToClose, companyName, status){
  $("#confirmeditsped").attr("action",`${urlTo}${entryIdToClose}`);
  $("#spedEditCompanyName").text(companyName);
  document.getElementById("editsped_status").value = status;
}

function changeManagerModalEdit(entryID, companyid, companyName, entryDate, entryProblem, entryStatus, solution, category){
  $("#m_edit_number").text(entryID);
  $("#edit_nfecompanyid").text(companyid);
  $("#edit_entryForm").attr("action", `./src/post/mp_editentry.php?id=${entryID}`);
  $("#edit_companyName").attr("value",`${companyName}`);
  // $("#edit_entryDate").attr("value",`${entryDate}`);
  $("#edit_entryProblem").text(`${entryProblem}`);
  $("#edit_entrySolution").text(`${solution}`);
  document.getElementById("edit_entryCategory").value = category;
  document.getElementById("edit_entryStatus").value = entryStatus;
}

function changeManagerModalEditNfe(entryID, companyid, companyName, status, model, procedure, id, nv, nf, problem, solution){
  $("#nfe_edit_number").text(entryID);
  $("#edit_nfeform").attr("action", `./src/post/mp_editnfe.php?id=${entryID}`);
  $("#editnfe_companyName").attr("value",`${companyName}`);
  $("#editnfe_id").attr("value",`${id}`);
  $("#editnfe_nv").attr("value",`${nv}`);
  $("#editnfe_nf").attr("value",`${nf}`);
  $("#editnfe_problem").text(`${problem}`);
  $("#edit_nfe_companyid").text(`${companyid}`);
  $("#editnfe_Solution").text(`${solution}`);
  document.getElementById("editnfe_status").value = status;
  document.getElementById("editnfe_model").value = model;
  document.getElementById("editnfe_procedure").value = procedure;
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
  // Overwrites
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

function entryOverview(entryID, companyid, companyName, status, addedBy, entryDate, problem, solution){
  if (status == 0){ status = "Finalizada"; } else if (status == 1) { status = "Pendente"; } else if (status == 2){ status = "Urgente"; }
  $("#entry_titleid").text(`${entryID}`);
  $("#mentry_id").text(`${entryID}`);
  $("#mentry_companyid").text(`${companyid}`);
  $("#mentry_companyName").text(`${companyName}`);
  $("#mentry_status").text(`${status}`);
  $("#mentry_addedby").text(`${addedBy}`);
  $("#mentry_entryDate").text(`${entryDate}`);
  $("#mentry_problem").text(`${problem}`);
  $("#mentry_solution").text(`${solution}`);
}

function nfeOverview(nfe_model, entryid, companyid, companyName, id, nv, nf, status, addedby, entrydate, todo, problem, solution){
  if (nfe_model == 55){ nfe_modelFormatted = 'NFe'; } else if (nfe_model == 65){ nfe_modelFormatted = 'NFCe'; } else { nfe_modelFormatted = 'Entrada'; }
  if (status == 20){ status = "Finalizada"; } else if (status == 21) { status = "Pendente"; } else if (status == 22){ status = "Urgente"; }
  if (todo == 0){ todo = "Cancelar"; } else if (todo == 1) { todo = "Autorizar"; } else if (todo == 2){ todo = "Inutilizar"; } else if (todo == 3){ todo = "Outro"; }
  $("#mnfe_model1").text(`${nfe_modelFormatted}`);
  $("#mnfe_model2").text(`${nfe_model} - ${nfe_modelFormatted}`);
  $("#mnfe_titleid").text(`${entryid}`);
  $("#mnfe_entryid").text(`${entryid}`);
  $("#mnfe_companyid").text(`${companyid}`);
  $("#mnfe_companyName").text(`${companyName}`);
  $("#mnfe_id").text(`${id}`);
  $("#mnfe_nv").text(`${nv}`);
  $("#mnfe_nf").text(`${nf}`);
  $("#mnfe_status").text(`${status}`);
  $("#mnfe_addedby").text(`${addedby}`);
  $("#mnfe_entryDate").text(`${entrydate}`);
  $("#mnfe_todo").text(`${todo}`);
  $("#mnfe_problem").text(`${problem}`);
  $("#mnfe_solution").text(`${solution}`);
}

function editEntity(companyid, companyName, status, city, phone, phoneSec, email, emaila){
  $("#editentity_companyid").text(`${companyid}`);
  $("#editentity_title").text(`${companyName}`);
  $("#editentity_name").attr(`value`, `${companyName}`);
  document.getElementById("editentity_status").value = status;
  document.getElementById("editentity_city").value = city;
  $("#editentity_tel1").attr(`value`, `${phone}`);
  $("#editentity_tel2").attr(`value`, `${phoneSec}`);
  $("#editentity_email").attr(`value`, `${email}`);
  $("#editentity_emaila").attr(`value`, `${emaila}`);
  $("#editentity_form").attr(`action`, `./src/post/mp_editentity.php?id=${companyid}`);
}

document.addEventListener('DOMContentLoaded', () => {
  (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
    $notification = $delete.parentNode;
    $delete.addEventListener('click', () => {
      $notification.parentNode.removeChild($notification);
    });
  });
});
