window.addEventListener("load", function(event) {
  var items = localStorage.getItem('interests');
  var itemsSession = sessionStorage.getItem('interests');
  if (items == null)
  {
    localStorage.setItem('interests', 1);
  } else {
    items++;
    localStorage.setItem('interests', items);
  }
  if (itemsSession == null)
  {
    sessionStorage.setItem('interests', 1);
  } else {
    itemsSession++;
    sessionStorage.setItem('interests', itemsSession);
  }
});
