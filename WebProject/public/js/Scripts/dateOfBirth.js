const date_picker_element = document.querySelector('.date-picker');
const selected_date_element = document.querySelector('.date-picker .selected-date');
const dates_element = document.querySelector('.date-picker .dates');
const mth_element = document.querySelector('.date-picker .dates .month .mth');
const next_mth_element = document.querySelector('.date-picker .dates .month .next-mth');
const prev_mth_element = document.querySelector('.date-picker .dates .month .prev-mth');
const days_element = document.querySelector('.date-picker .dates .days');
const years_element = document.getElementById("yearId");
const months_element = document.getElementById("monthId");

const months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль',
  'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'
];

let date = new Date();
let day = date.getDate();
let month = date.getMonth();
let year = date.getFullYear();

let selectedDate = date;
let selectedDay = day;
let selectedMonth = month;
let selectedYear = year;

mth_element.textContent = months[month] + ' ' + year;

if (selected_date_element.value == "")
{
  selected_date_element.value = formatDate(date);
}
selected_date_element.dataset.value = selectedDate;

populateDates();
initMonthForm();
initYearForm();

// EVENT LISTENERS
date_picker_element.addEventListener('click', toggleDatePicker);
next_mth_element.addEventListener('click', goToNextMonth);
prev_mth_element.addEventListener('click', goToPrevMonth);
months_element.addEventListener('change', changeMonth);
years_element.addEventListener('change', changeYear);

// FUNCTIONS
function toggleDatePicker(e) {
  if (!checkEventPathForClass(e.path, 'dates')) {
    dates_element.classList.toggle('active');
  }
}

function goToNextMonth(e) {
  month++;
  if (month > 11) {
    month = 0;
    year++;
    if (year > 2021)
    {
      year = 2021;
      month = 11;
    }
  }
  mth_element.textContent = months[month] + ' ' + year;
  populateDates();
}

function goToPrevMonth(e) {
  month--;
  if (month < 0) {
    month = 11;
    year--;
    if (year < 1990)
    {
      year = 1990;
      month = 0;
    }
  }
  mth_element.textContent = months[month] + ' ' + year;
  populateDates();
}

function populateDates(e) {
  days_element.innerHTML = '';
  let amount_days = 31;
  if (month == 3 || month == 5 || month == 8 || month == 10) {
    amount_days = 30;
  }

  if (month == 1) {
    amount_days = 28;
  }
  for (let i = 0; i < amount_days; i++) {
    const day_element = document.createElement('div');
    day_element.classList.add('day');
    day_element.textContent = i + 1;

    if (selectedDay == (i + 1) && selectedYear == year && selectedMonth == month) {
      day_element.classList.add('selected');
    }

    day_element.addEventListener('click', function() {
      selectedDate = new Date(year + '-' + (Number(month) + 1) + '-' + (i + 1));
      selectedDay = (i + 1);
      selectedMonth = month;
      selectedYear = year;

      selected_date_element.value = formatDate(selectedDate);
      selected_date_element.dataset.value = selectedDate;
      dates_element.classList.remove('active');
      populateDates();
    });

    days_element.appendChild(day_element);
  }
}

// HELPER FUNCTIONS
function checkEventPathForClass(path, selector) {
  for (let i = 0; i < path.length; i++) {
    if (path[i].classList && path[i].classList.contains(selector)) {
      return true;
    }
  }

  return false;
}

function formatDate(d) {
  let dayThis = d.getDate();
  if (dayThis < 10) {
    dayThis = '0' + dayThis;
  }

  let monthThis = d.getMonth() + 1;
  if (monthThis < 10) {
    monthThis = '0' + monthThis;
  }

  let yearThis = d.getFullYear();

  return dayThis + '.' + monthThis + '.' + yearThis;
}

function initYearForm() {
  for (let i = 1900; i < 2022; i++) {
    let year_element = document.createElement('option');
    year_element.value = i;
    year_element.textContent = i;
    years_element.appendChild(year_element);
  }
}

function changeMonth(e) {
  month = e.target.value;
  mth_element.textContent = months[month] + ' ' + year;
  populateDates();
}

function changeYear(e) {
  year = e.target.value;
  mth_element.textContent = months[month] + ' ' + year;
  populateDates();
}

function initMonthForm() {
  for (let i = 0; i < 12; i++) {
    let month_element = document.createElement('option');
    month_element.value = i;
    console.log(month_element.value);
    month_element.textContent = months[i];
    months_element.appendChild(month_element);
  }
}
