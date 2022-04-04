function getPhotos() {
    const elemsOnLine = 5;
    let count = 0;
    for (var i = 0; i < arguments.length; i++) {
      for (let key in arguments[i].content) {
        if (count % elemsOnLine == 0) {
          document.write('<div class="d-flex align-items-center">');
        }
        let content = arguments[i].content[key];
        document.write('<div class="d-flex flex-column gap-2 align-items-center cont">');
        document.write('<div class="content">');
        document.write('<img id="' + content.id + '" class="content-image popup-open" src="' + arguments[i].absolutePath + content.path + '" alt="The image ' + content.path + ' was not found" />');
        document.write('</div>');
        document.write('</div>');

        if ((count % elemsOnLine) == (elemsOnLine - 1)) {
          document.write('</div>');
        }
        let element = document.getElementById(content.id);
        let bigPhoto = document.getElementById("bigPhoto");
        element.addEventListener('click', (event) => {
          bigPhoto.src = element.src;
          bigPhoto.title = content.id;
          bigPhoto.alt = element.alt;
        });

        count++;
      }
  }
}
