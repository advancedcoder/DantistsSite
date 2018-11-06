window.onload = function () {
    var tooth = document.getElementById("tooth"),
        tooth_shadow = document.getElementById("toothshadow"),
        clck = function () {
        var pos1 = 0;
        var pos2 = 0;
        var id = setInterval(frame, 1);

        function frame () {
            if (pos1 == 1164) {
                clearInterval(id);
                tooth.style.top = 0;
                tooth.style.left = 0;
                tooth_shadow.style.top = 0;
                tooth_shadow.style.left = 0;
            } else {
                if (pos1 < 583) {
                    pos1++;
                    pos2++;
                    tooth.style.left = pos1 + 'px';
                    tooth_shadow.style.top = pos1 + 'px';
                } else if (pos1 < 1164) {
                    pos1++;
                    tooth_shadow.style.left = pos1-583 + 'px';
                    tooth.style.top = pos1-583 + 'px';
                }
            }
        }
    };

    tooth.onclick = clck;
    tooth_shadow.onclick = clck;
};