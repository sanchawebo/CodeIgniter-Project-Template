/* eslint-disable no-unused-vars */
function colorizeCallout(el, bsColor) {
  el.classList.remove('callout-success', 'callout-danger', 'callout-secondary', 'callout-warning');
  el.classList.add(`callout-${bsColor}`);
}

function checkStrength() {
  const input = document.getElementById('password');
  const meter = document.getElementById('pass-meter');
  const callout = document.getElementById('callout-meter');
  const suggestBox = document.getElementById('pass-suggestions');
  // eslint-disable-next-line no-undef
  const info = zxcvbn(input.value);
  let state = null;

  // Remove previous states
  meter.classList.remove('bad', 'warn', 'good', 'str-0', 'str-1', 'str-2', 'str-3', 'str-4');
  colorizeCallout(callout, 'secondary');

  switch (info.score) {
    case 0:
    case 1:
      state = 'bad';
      colorizeCallout(callout, 'danger');
      break;
    case 2:
    case 3:
      state = 'warn';
      colorizeCallout(callout, 'warning');
      break;
    case 4:
      state = 'good';
      colorizeCallout(callout, 'success');
      break;
    default:
      colorizeCallout(callout, 'secondary');
  }

  const score = `str-${info.score.toString()}`;

  meter.classList.add(state);
  meter.classList.add(score);
  suggestBox.innerText = info.feedback.suggestions.join('. ');
}

function checkPasswordMatch() {
  const callout = document.getElementById('callout-matches');
  const origPass = document.getElementById('password').value;
  const thisPass = document.getElementById('pass_confirm').value;

  if (thisPass === '') {
    colorizeCallout(callout, 'secondary');

    document.getElementById('pass-match').style.display = 'none';
    document.getElementById('pass-not-match').style.display = 'none';
  } else if (thisPass === origPass) {
    colorizeCallout(callout, 'success');

    document.getElementById('pass-match').style.display = 'inline-block';
    document.getElementById('pass-not-match').style.display = 'none';
  } else {
    colorizeCallout(callout, 'danger');

    document.getElementById('pass-match').style.display = 'none';
    document.getElementById('pass-not-match').style.display = 'inline-block';
  }
}

let debounceTimeout;

function debouncedCheckPasswordMatch() {
  clearTimeout(debounceTimeout);
  debounceTimeout = setTimeout(checkPasswordMatch, 250);
}
