import "./bootstrap";
import "flowbite";
import "animate.css";
import Swal from "sweetalert2";
import $ from "jquery"; // 🛑
import "jquery-validation";
import "jscroll"; // ✅
import "./textarea";
import { initDropdowns } from "flowbite";

setTimeout(() => {
    initDropdowns();
}, 500);

window.$ = window.jQuery = $;
window.Swal = Swal;
