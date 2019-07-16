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
