import 'htmx.org';

import {
  // eslint-disable-next-line no-unused-vars
  Alert, Modal, Dropdown, Offcanvas, Collapse, Tab, Tooltip,
} from 'bootstrap';

import './scss/main.scss';

// Init tooltips
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
[...tooltipTriggerList].map((tooltipTriggerEl) => new Tooltip(tooltipTriggerEl));