import './bootstrap';
import 'flowbite';

import.meta.glob([
    '../logo/**',
    '../images/**',
]);

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
