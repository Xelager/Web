window.addEventListener("load", function(event) {
  var items = localStorage.getItem('contact');
  var itemsSession = sessionStorage.getItem('contact');
  if (items == null)
  {
    localStorage.setItem('contact', 1);
  } else {
    items++;
    localStorage.setItem('contact', items);
  }
  if (itemsSession == null)
  {
    sessionStorage.setItem('contact', 1);
  } else {
    itemsSession++;
    sessionStorage.setItem('contact', itemsSession);
  }
});
