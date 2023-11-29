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

// собираем все якоря; устанавливаем время анимации и количество кадров
const anchors = [].slice.call(document.querySelectorAll('a[href*="#"]')),
      animationTime = 100,
      framesCount = 50;

anchors.forEach(function(item) {
  // каждому якорю присваиваем обработчик события
  item.addEventListener('click', function(e) {
    // убираем стандартное поведение
    e.preventDefault();
    
    // для каждого якоря берем соответствующий ему элемент и определяем его координату Y
    let coordY = document.querySelector(item.getAttribute('href')).getBoundingClientRect().top + window.pageYOffset;
    
    // запускаем интервал, в котором
    let scroller = setInterval(function() {
      // считаем на сколько скроллить за 1 такт
      let scrollBy = coordY / framesCount;
      
      // если к-во пикселей для скролла за 1 такт больше расстояния до элемента
      // и дно страницы не достигнуто
      if(scrollBy > window.pageYOffset - coordY && window.innerHeight + window.pageYOffset < document.body.offsetHeight) {
        // то скроллим на к-во пикселей, которое соответствует одному такту
        window.scrollBy(0, scrollBy);
      } else {
        // иначе добираемся до элемента и выходим из интервала
        window.scrollTo(0, coordY);
        clearInterval(scroller);
      }
    // время интервала равняется частному от времени анимации и к-ва кадров
    }, animationTime / framesCount);
  });
});