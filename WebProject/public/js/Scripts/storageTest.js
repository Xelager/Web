window.addEventListener("load", function(event) {
  var items = localStorage.getItem('test');
  var itemsSession = sessionStorage.getItem('test');
  if (items == null)
  {
    localStorage.setItem('test', 1);
  } else {
    items++;
    localStorage.setItem('test', items);
  }
  if (itemsSession == null)
  {
    sessionStorage.setItem('test', 1);
  } else {
    itemsSession++;
    sessionStorage.setItem('test', itemsSession);
  }
});
