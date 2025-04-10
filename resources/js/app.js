import "./bootstrap";
import "flowbite";
import "animate.css";
import Swal from "sweetalert2";
import "jquery-validation";
import "./textarea";
import { initDropdowns } from "flowbite";


setTimeout(() => {
    initDropdowns();
}, 500);


window.Swal = Swal;

