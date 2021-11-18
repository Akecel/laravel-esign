require('./bootstrap');

import SignaturePad from 'signature_pad';

const eSignpad = document.querySelectorAll('.e-signpad');
for (let i = 0; i < eSignpad.length; i++) {
    var signaturePad = new SignaturePad(eSignpad[i].querySelector("canvas"));

    var submit = eSignpad[i].querySelector("button");
    var clear = eSignpad[i].querySelector(".clear");

    submit.addEventListener("click", function(){
        eSignpad[i].querySelector("input").value = signaturePad.toDataURL();
    });

    clear.addEventListener("click", function(){
        signaturePad.clear();
    });
}