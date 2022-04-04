window.addEventListener("load", function(event) {
  var items = localStorage.getItem('photos');
  var itemsSession = sessionStorage.getItem('photos');
  if (items == null)
  {
    localStorage.setItem('photos', 1);
  } else {
    items++;
    localStorage.setItem('photos', items);
  }
  if (itemsSession == null)
  {
    sessionStorage.setItem('photos', 1);
  } else {
    itemsSession++;
    sessionStorage.setItem('photos', itemsSession);
  }
});
