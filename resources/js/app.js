import "./bootstrap";
import "flowbite";
import "animate.css";
import Swal from "sweetalert2";
import "./textarea";
import $ from "jquery";
import "jquery-validation";
import { initDropdowns } from "flowbite";

setTimeout(() => {
    initDropdowns();
}, 500);

window.$ = window.jQuery = $;
window.Swal = Swal;
