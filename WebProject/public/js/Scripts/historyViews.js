 function setCookie(cname, cvalue, exdays) {
   const d = new Date();
   d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
   let expires = "expires="+d.toUTCString();
   document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
 }

 function getCookie(cname) {
   let name = cname + "=";
   let ca = document.cookie.split(';');
   for(let i = 0; i < ca.length; i++) {
     let c = ca[i];
     while (c.charAt(0) == ' ') {
       c = c.substring(1);
     }
     if (c.indexOf(name) == 0) {
       return c.substring(name.length, c.length);
     }
   }
   return "";
 }

 window.addEventListener("load", function(event) {
    const indexSession = document.getElementById("indexId");
    const contactsSession = document.getElementById("contactsId");
    const aboutMeSession = document.getElementById("aboutMeId");
    const educationSession = document.getElementById("educationId");
    const testSession = document.getElementById("testId");
    const interestsSession = document.getElementById("interestsId");
    const photosSession = document.getElementById("photosId");
    const indexView = document.getElementById("indexViewId");
    const contactsView = document.getElementById("contactsViewId");
    const aboutMeView = document.getElementById("aboutMeViewId");
    const educationView = document.getElementById("educationViewId");
    const testView = document.getElementById("testViewId");
    const interestsView = document.getElementById("interestsViewId");
    const photosView = document.getElementById("photosViewId");

    indexView.textContent = localStorage.getItem('index') ?? 0;
    contactsView.textContent = localStorage.getItem('contact') ?? 0;
    aboutMeView.textContent = localStorage.getItem('aboutMe') ?? 0;
    educationView.textContent = localStorage.getItem('education') ?? 0;
    interestsView.textContent = localStorage.getItem('interests') ?? 0;
    testView.textContent = localStorage.getItem('test') ?? 0;
    photosView.textContent = localStorage.getItem('photos') ?? 0;
    indexSession.textContent = sessionStorage.getItem('index') ?? 0;
    contactsSession.textContent = sessionStorage.getItem('contact') ?? 0;
    aboutMeSession.textContent = sessionStorage.getItem('aboutMe') ?? 0;
    educationSession.textContent = sessionStorage.getItem('education') ?? 0;
    interestsSession.textContent = sessionStorage.getItem('interests') ?? 0;
    testSession.textContent = sessionStorage.getItem('test') ?? 0;
    photosSession.textContent = sessionStorage.getItem('photos') ?? 0;
  });
