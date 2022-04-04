window.addEventListener("load", function(event) {
  var items = localStorage.getItem('education');
  var itemsSession = sessionStorage.getItem('education');
  if (items == null)
  {
    localStorage.setItem('education', 1);
  } else {
    items++;
    localStorage.setItem('education', items);
  }
  if (itemsSession == null)
  {
    sessionStorage.setItem('education', 1);
  } else {
    itemsSession++;
    sessionStorage.setItem('education', itemsSession);
  }
});
