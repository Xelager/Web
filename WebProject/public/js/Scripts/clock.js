function clock() {
  var months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль',
    'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
  ];
  var date = new Date(),
    number = (date.getDate() < 10) ? '0' + date.getDate() : date.getDate(),
    month = months[date.getMonth()],
    year = date.getFullYear().toString().substr(-2),
    hours = (date.getHours() < 10) ? '0' + date.getHours() : date.getHours(),
    minutes = (date.getMinutes() < 10) ? '0' + date.getMinutes() : date.getMinutes(),
    seconds = (date.getSeconds() < 10) ? '0' + date.getSeconds() : date.getSeconds();
  document.getElementById('clock').innerHTML = number + ' ' + month + ' ' + year + " " + hours + ':' + minutes + ':' + seconds;
}
setInterval(clock, 1000);
