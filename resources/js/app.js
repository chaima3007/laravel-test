import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import jQuery from 'jquery';
import flatpickr from 'flatpickr';
import 'flatpickr/dist/flatpickr.min.css';
import { French } from 'flatpickr/dist/l10n/fr.js';

window.$ = window.jQuery = jQuery;
window.flatpickr = flatpickr;

// Configuration globale si nécessaire
flatpickr.localize(French);