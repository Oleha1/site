var slider = document.getElementById('slider')
var sliderImages = document.querySelectorAll('.slider_img');
var sliderLine = document.getElementById('slider_line');
var sliderCounter = 0;
var sliderWidth= slider.offsetWidth;

function nextSlide() {
    sliderCounter++;
    if (sliderCounter == 2) {
        sliderImages[1].setAttribute('style', 'margin-right: 190px;')
    }
    if (sliderCounter >= sliderImages.length) {
        sliderCounter = 0;
    }
    rollSlider()
}


setInterval(() => {
    nextSlide()
}, 3000);

function rollSlider() {
    sliderLine.style.transform = `translateX(${-sliderCounter * sliderWidth}px)`;
}
setTimeout(nextSlide, 1000); 

const anchors = [].slice.call(document.querySelectorAll('a[href*="#"]')),
      animationTime = 100,
      framesCount = 50;

anchors.forEach(function(item) {
  item.addEventListener('click', function(e) {
    e.preventDefault();
    let coordY = document.querySelector(item.getAttribute('href')).getBoundingClientRect().top + window.pageYOffset;
    let scroller = setInterval(function() {
      let scrollBy = coordY / framesCount;
      if(scrollBy > window.pageYOffset - coordY && window.innerHeight + window.pageYOffset < document.body.offsetHeight) {
        window.scrollBy(0, scrollBy);
      } else {
        window.scrollTo(0, coordY);
        clearInterval(scroller);
      }
    }, animationTime / framesCount);
  });
});