var cards = document.querySelectorAll('.card--group')

Array.prototype.forEach.call(cards, function(card, i){
    card.addEventListener('click', classToggle);
});

function classToggle() {
    this.classList.toggle('is-active');

  console.log(this);
}
