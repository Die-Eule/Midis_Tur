import './bootstrap';
import 'flowbite';

import.meta.glob([
    '../logo/**',
]);

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
