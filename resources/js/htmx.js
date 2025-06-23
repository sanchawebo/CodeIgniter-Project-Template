/* eslint-disable no-unused-vars */
import htmx from 'htmx.org/dist/htmx.esm.js';
import TomSelect from 'tom-select';
import { Tooltip } from 'bootstrap';
import { assignDatePicker, assignDateRangePicker } from './datepicker.js';

window.htmx = htmx;

// Ajax headers
document.body.addEventListener('htmx:configRequest', (evt) => {
  // eslint-disable-next-line no-param-reassign
  evt.detail.headers['X-Requested-With'] = 'XMLHttpRequest';
});

// Dispose bootstrap tooltips before swap
document.body.addEventListener('htmx:beforeSwap', (event) => {
  if (event.detail.target) {
    const tooltipped = event.detail.target.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipped.forEach((el) => {
      const tooltip = Tooltip.getInstance(el);
      if (tooltip) tooltip.dispose();
    });
  }
});

htmx.defineExtension('path-params', {
  onEvent(name, evt) {
    if (name === 'htmx:configRequest') {
      // eslint-disable-next-line no-param-reassign
      evt.detail.path = evt.detail.path.replace(/__([A-Za-z0-9_]+)__/g, (_, param) => {
        const val = evt.detail.parameters[param];
        // eslint-disable-next-line no-param-reassign
        delete evt.detail.parameters[param]; // don't pass in query string since already in path
        return val;
      });
    }
  },
});

htmx.onLoad((elt) => {
  // look up all elements with the tomselect class on it within the element
  const allSelects = htmx.findAll(elt, 'select.tom-select');
  allSelects.forEach((select) => {
    if (!select.tomselect) {
      // eslint-disable-next-line no-new
      new TomSelect(select, {
        create: false,
        maxOptions: null,
        maxItems: 1,
        render: {
          no_results(data, escape) {
            return `<div class="no-results">Keine Ergebnisse für "${escape(data.input)}"</div>`;
          },
          loading() {
            return '<div class="spinner-border text-primary m-3" role="status"><span class="visually-hidden">Laden...</span></div>';
          },
        },
        plugins: ['dropdown_input'],
      });
    }
  });
  const allRemoteSelects = htmx.findAll(elt, 'select.tom-select-remote');
  allRemoteSelects.forEach((select) => {
    if (!select.tomselect) {
      // eslint-disable-next-line no-new
      new TomSelect(select, {
        create: false,
        maxOptions: null,
        maxItems: 1,
        placeholder: select?.dataset?.placeholder || 'Suchen',
        valueField: select?.dataset?.valueField || 'id',
        searchField: [],
        shouldLoad(query) {
          return query.length > 1;
        },
        load(query, callback) {
          const url = select.dataset.url.replace(/__([A-Za-z0-9_]+)__/g, encodeURIComponent(query));
          fetch(url)
            .then((response) => response.json())
            .then((json) => {
              callback(json);
            })
            .catch(() => {
              callback();
            });
        },
        render: {
          option(data, escape) {
            let optionTemplate = '<div>';
            (select?.dataset?.renderOption?.split(',') || ['name']).forEach(
              (element, index, array) => {
                const comma = index === array.length - 1 ? '' : ',';
                optionTemplate += `<span class="${index === 0 ? 'fw-bold ' : ''} me-2">${escape(data[element])}${comma}</span>`;
              },
            );
            return `${optionTemplate}</div>`;
          },
          item(data, escape) {
            let itemTemplate = '<div>';
            (select?.dataset?.renderItem?.split(',') || ['name']).forEach(
              (element, index, array) => {
                const comma = index === array.length - 1 ? '' : ',';
                itemTemplate += `<span class="${index === 0 ? 'fw-bold ' : ''} me-2">${escape(data[element])}${comma}</span>`;
              },
            );
            return `${itemTemplate}</div>`;
          },
          no_results(data, escape) {
            return `<div class="no-results">Keine Ergebnisse für "${escape(data.input)}"</div>`;
          },
          loading(data, escape) {
            return '<div class="spinner-border text-primary m-3" role="status"><span class="visually-hidden">Laden...</span></div>';
          },
        },
      });
    }
  });

  // Init tooltips
  const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
  [...tooltipTriggerList].map((tooltipTriggerEl) => Tooltip.getOrCreateInstance(tooltipTriggerEl));

  // Assign datepicker to all datepicker elements.
  const allDateInputs = htmx.findAll(elt, '.date-picker');
  allDateInputs.forEach((dateInput) => {
    assignDatePicker(dateInput);
  });
  // Assign date range picker to all date range picker elements.
  const allDateRangeInputs = htmx.findAll(elt, '.date-range-picker');
  allDateRangeInputs.forEach((dateRangeInput) => {
    assignDateRangePicker(dateRangeInput);
  });
});
