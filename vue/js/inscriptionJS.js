let p = document.getElementById('pays');
let n = document.getElementById('num1');
let n2 = document.getElementById('num2');
let n3 = document.getElementById('num3');
let n4 = document.getElementById('num4');
let n5 = document.getElementById('num5');

let fonc = function () {
    if (p.value == 'MG') {
        if (n.value == '') {
            n.style.backgroundImage = "url(vue/image/mada.png)";
            n.style.backgroundPosition = "left";
            n.style.backgroundRepeat = "no-repeat";
            n.style.backgroundSize = "25px";
            n2.style.backgroundImage = "url(vue/image/mada.png)";
            n2.style.backgroundPosition = "left";
            n2.style.backgroundRepeat = "no-repeat";
            n2.style.backgroundSize = "25px";
            n3.style.backgroundImage = "url(vue/image/mada.png)";
            n3.style.backgroundPosition = "left";
            n3.style.backgroundRepeat = "no-repeat";
            n3.style.backgroundSize = "25px";
            n4.style.backgroundImage = "url(vue/image/mada.png)";
            n4.style.backgroundPosition = "left";
            n4.style.backgroundRepeat = "no-repeat";
            n4.style.backgroundSize = "25px";
            n5.style.backgroundImage = "url(vue/image/mada.png)";
            n5.style.backgroundPosition = "left";
            n5.style.backgroundRepeat = "no-repeat";
            n5.style.backgroundSize = "25px";

        }
    }
};
let fonc2 = function () {
    if (p.value == 'MG') {
        if (n.value == '') {
            n.value = '261';
        }
    }
};
let fonc22 = function () {
    if (p.value == 'MG') {
        if (n2.value == '') {
            n2.value = '261';
        }
    }
};
let fonc23 = function () {
    if (p.value == 'MG') {
        if (n3.value == '') {
            n3.value = '261';
        }
    }
};
let fonc24 = function () {
    if (p.value == 'MG') {
        if (n4.value == '') {
            n4.value = '261';
        }
    }
};
let fonc25 = function () {
    if (p.value == 'MG') {
        if (n5.value == '') {
            n5.value = '261';
        }
    }
};

n.addEventListener("mouseover", fonc, false);
n.addEventListener("click", fonc2, false);
n2.addEventListener("click", fonc22, false);
n3.addEventListener("click", fonc23, false);
n4.addEventListener("click", fonc24, false);
n5.addEventListener("click", fonc25, false);

let tout = document.getElementById('tou');
let pa = document.getElementById('pa');
tout.addEventListener("click", function () {
    pa.style.display = 'none';
}, false);





function ChangeStatut(formulaire) {
    if (formulaire.regagree.checked == true) { formulaire.validation.disabled = false }
    if (formulaire.regagree.checked == false) { formulaire.validation.disabled = true }
}








