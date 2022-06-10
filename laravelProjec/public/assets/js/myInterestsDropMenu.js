window.onload = function () {
  //ищем элемент по селектору
  var a = document.querySelector('#dropMenuInterests');
  //вешаем на него события
  a.onmouseout = function(e) {
    document.getElementById('myDropdown').style.display='none';
  }

  a.onmouseover = function(e) {
    document.getElementById('myDropdown').style.display='block';
  };
}
