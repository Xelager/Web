function getImages(photosInterest) {
  if (photosInterest !== null) {
    const elemsOnLine = 3;
    let count = 0;
    document.write('<div class="d-flex flex-column gap-3">');

    for (let key in photosInterest) {
      if (count % elemsOnLine === 0) {
        document.write('<div class="d-flex justify-content-around">');
      }
      document.write('<div class="row gap-3 image-interest align-self-end">');
      document.write('<img src="' + photosInterest[key].path + '" alt="The image was not found" />');
      document.write('<span class="text-about-header"  id="' + photosInterest[key].id + '">' + photosInterest[key].name + '</span>');
      document.write('</div>');
      if ((count % elemsOnLine) === (elemsOnLine - 1)) {
        document.write('</div>');
      }
      count++;
    }
    document.write('</div>');
  }
};

function getContent(interest, key) {
  if (interest !== null) {
    document.write('<h3 class="card-text d-flex text-about-header mt-5">' + key + '</h3>');
    document.write(interest.content);
  }
};

function getInterests() {
  if (myInterests !== null) {
    document.write('<h1 class="card-title d-flex text-about-header justify-content-center mt-2" id="mySerial">' + myInterests.header + '</h1>');
    document.write('<div class="mb-3">');
    for (var key in myInterests.interests) {
      getContent(myInterests.interests[key], key);
      getImages(myInterests.interests[key].photosInterest);
    }
    document.write('</div>');
  }
};
