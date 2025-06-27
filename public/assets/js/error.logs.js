function swapContainers(element, data) {
  const accordionContainer = element.parentElement;
  const spinnerContainer = accordionContainer.querySelector('[data-log-spinner-container]');
  const resultContainer = accordionContainer.querySelector('[data-log-result-container]');

  spinnerContainer.classList.add('d-none');
  resultContainer.insertAdjacentHTML('beforeend', data);

  // eslint-disable-next-line no-undef
  if (Prism) { Prism.highlightAllUnder(resultContainer); }
   
  element.dataset.logResultLoaded = '1';
}

async function loadLogData(event) {
  const collapsible = event.target;
  if (!collapsible) {
    return null;
  }
  const url = collapsible.dataset.logGetUrl;
  await fetch(url)
    .then((response) => response.text())
    .then((data) => {
      if (data) {
        swapContainers(collapsible, data);
      }
    });
  return null;
}

document.querySelectorAll('[id^="collapse"]').forEach((el) => {
  el.addEventListener('show.bs.collapse', (event) => {
    if (el.dataset.logResultLoaded === '0') {
      loadLogData(event);
    }
  });
});
