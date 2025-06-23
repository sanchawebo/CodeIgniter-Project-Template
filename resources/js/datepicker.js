import { Datepicker, DateRangePicker } from 'vanillajs-datepicker';
import swal from 'sweetalert';
import de from './locales/de.js';

const validateDateRange = (rangeEl, disabledDates) => {
  const { datepickers } = rangeEl.rangepicker;

  const startEl = datepickers[0];
  const endEl = datepickers[1];
  const startDate = startEl.getDate();
  const endDate = endEl.getDate();

  if (!startDate || !endDate) {
    return;
  }

  // eslint-disable-next-line no-restricted-syntax
  for (const disabledDate of disabledDates) {
    const [day, month, year] = disabledDate.split('.');
    const disabled = new Date(year, month - 1, day);
    if (disabled >= startDate && disabled <= endDate) {
      swal({
        title: 'Ungültiger Zeitraum',
        text: 'Der Zeitraum enthält ein oder mehrere ungültige Tage.',
        icon: 'error',
        button: 'OK',
      }).then(() => {
        if (startEl.element.defaultValue !== '') {
          startEl.setDate(startEl.element.defaultValue);
        } else {
          startEl.setDate({ clear: true });
        }
        if (endEl.element.defaultValue !== '') {
          endEl.setDate(endEl.element.defaultValue);
        } else {
          endEl.setDate({ clear: true });
        }
        startEl.show();
        endEl.hide();
      });
      break;
    }
  }
};

const assignDateRangePicker = (dateEl) => {
  Object.assign(Datepicker.locales, de);

  const disabledDates = dateEl.dataset.dateDisabledDates
    ? dateEl.dataset.dateDisabledDates.split(',')
    : [];

  // eslint-disable-next-line no-unused-vars
  const datepicker = new DateRangePicker(dateEl, {
    buttonClass: 'btn',
    format: {
      toValue(dateStr) {
        const date = new Date(Datepicker.parseDate(dateStr, 'd.m.y', 'de'));
        const yearStr = date.getFullYear().toString();
        if (yearStr.length === 4) {
          return date;
        }
        const currentYearStr = new Date().getFullYear().toString();
        const currentYearArr = currentYearStr.split('');
        let newYearStr = yearStr;
        for (let i = currentYearStr.length - yearStr.length - 1; i >= 0; i--) {
          newYearStr = currentYearArr[i] + newYearStr;
        }

        date.setFullYear(newYearStr);
        return date;
      },
      toDisplay(date) {
        return Datepicker.formatDate(date, 'dd.mm.yyyy', 'de');
      },
    },
    language: 'de',
    autohide: true,
  });
  if (dateEl.dataset.dateStartDate) {
    datepicker.setOptions({
      minDate: dateEl.dataset.dateStartDate,
    });
  }
  if (dateEl.dataset.dateEndDate) {
    datepicker.setOptions({
      maxDate: dateEl.dataset.dateEndDate,
    });
  }
  if (disabledDates.length > 0) {
    datepicker.setOptions({
      datesDisabled: disabledDates,
    });
  }

  dateEl.querySelectorAll('input').forEach((inputField) => {
    inputField.addEventListener('keyup', (ev) => {
      if (ev.metaKey || (ev.key.length > 1 && ev.key !== 'Backspace' && ev.key !== 'Delete')) {
        return;
      }
      // eslint-disable-next-line no-param-reassign
      ev.target.oldValue = ev.target.value;
    });
    inputField.addEventListener('blur', (ev) => {
      const input = ev.target;
      if (!document.hasFocus() || input.oldValue === undefined) {
        return;
      }
      if (input.oldValue !== input.value) {
        input.datepicker.setDate(input.oldValue);
      }
      delete input.oldValue;
    });
  });
  dateEl.addEventListener('changeDate', () => {
    if (disabledDates.length > 0) {
      validateDateRange(dateEl, disabledDates);
    }
  });
};

const assignDatePicker = (dateEl) => {
  Object.assign(Datepicker.locales, de);
  // eslint-disable-next-line no-unused-vars
  const datepicker = new Datepicker(dateEl, {
    buttonClass: 'btn',
    format: {
      toValue(dateStr) {
        const date = new Date(Datepicker.parseDate(dateStr, 'd.m.y', 'de'));
        const yearStr = date.getFullYear().toString();
        if (yearStr.length === 4) {
          return date;
        }
        const currentYearStr = new Date().getFullYear().toString();
        const currentYearArr = currentYearStr.split('');
        let newYearStr = yearStr;
        for (let i = currentYearStr.length - yearStr.length - 1; i >= 0; i--) {
          newYearStr = currentYearArr[i] + newYearStr;
        }

        date.setFullYear(newYearStr);
        return date;
      },
      toDisplay(date) {
        return Datepicker.formatDate(date, 'dd.mm.yyyy', 'de');
      },
    },
    language: 'de',
    autohide: true,
  });
  if (dateEl.dataset.dateStartDate) {
    datepicker.setOptions({
      minDate: dateEl.dataset.dateStartDate,
    });
  }
  if (dateEl.dataset.dateEndDate) {
    datepicker.setOptions({
      maxDate: dateEl.dataset.dateEndDate,
    });
  }
  dateEl.addEventListener('keyup', (ev) => {
    if (ev.metaKey || (ev.key.length > 1 && ev.key !== 'Backspace' && ev.key !== 'Delete')) {
      return;
    }
    // back up user's input when user types printable character or backspace/delete
    // eslint-disable-next-line no-param-reassign
    ev.target.oldValue = ev.target.value;
  });
  dateEl.addEventListener('blur', (ev) => {
    const input = ev.target;
    if (!document.hasFocus() || input.oldValue === undefined) {
      // no-op when user goes to another window or the input field has no backed-up value
      return;
    }
    if (input.oldValue !== input.value) {
      input.datepicker.setDate(input.oldValue);
    }
    delete input.oldValue;
  });
};

export { assignDatePicker, assignDateRangePicker };
