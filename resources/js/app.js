import './bootstrap';
import 'flowbite';
import Alpine from "alpinejs";
import 'animate.css';
import Swal from 'sweetalert2'
import "./textarea"
import $ from 'jquery';
import 'jquery-validation';

window.$ = window.jQuery = $;
window.Swal = Swal;

window.Alpine = Alpine;

Alpine.start();