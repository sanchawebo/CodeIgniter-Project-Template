const events = ['DOMContentLoaded', 'htmx:afterSwap'];

events.forEach((event) => {
  document.addEventListener(event, () => {
    if (document.getElementById('password-form')) {
      const passwordInput = document.getElementById('password');
      const passwordConfirmInput = document.getElementById('password-confirm');
      const regEx = {
        letter: /[a-zäöüß]/g,
        capital: /[A-ZÄÖÜ]/g,
        number: /[0-9]/g,
        length: /.{8,255}/g,
      };

      const validateValue = (ruleNode, _regEx) => {
        if (passwordInput.value.match(_regEx)) {
          ruleNode?.classList.remove('invalid');
          ruleNode?.classList.add('valid');
        } else {
          ruleNode?.classList.remove('valid');
          ruleNode?.classList.add('invalid');
        }
      };
      const check = () => {
        const node = document.getElementById('match');
        if (passwordConfirmInput.value !== passwordInput.value) {
          node?.classList.remove('valid');
          node?.classList.add('invalid');
        } else {
          node?.classList.remove('invalid');
          node?.classList.add('valid');
        }
      };

      passwordInput?.addEventListener('input', () => {
        Object.entries(regEx).forEach(([nodeName, _regEx]) => {
          const ruleNode = document.getElementById(nodeName);
          validateValue(ruleNode, _regEx);
        });
      });
      passwordConfirmInput?.addEventListener('input', () => {
        check();
      });
      passwordInput?.addEventListener('input', () => {
        check();
      });
    }
  });
});
