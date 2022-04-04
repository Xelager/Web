window.addEventListener("load", function(event) {
  var items = localStorage.getItem('aboutMe');
  var itemsSession = sessionStorage.getItem('aboutMe');
  if (items == null)
  {
    localStorage.setItem('aboutMe', 1);
  } else {
    items++;
    localStorage.setItem('aboutMe', items);
  }
  if (itemsSession == null)
  {
    sessionStorage.setItem('aboutMe', 1);
  } else {
    itemsSession++;
    sessionStorage.setItem('aboutMe', itemsSession);
  }
});
