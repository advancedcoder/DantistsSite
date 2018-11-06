function compute(selected, num1, num2, error1, error2) {
    var result;
    var i_num1 = Number(num1.value);
    var i_num2 = Number(num2.value);

    switch (selected) {
        case 'Sum':
            result = i_num1 + i_num2;
            break;
        case 'Sub':
            result = i_num1 - i_num2;
            break;
        case 'Mul':
            result = i_num1 * i_num2;
            break;
        case 'Div':
            if (i_num2 === 0) {
                error2.innerHTML = 'Second number can\'t be equal to zero!';
                error2.style.display = 'block'; 
            }
            else {
                result = i_num1 / i_num2;
            }
            break;
        case 'Pow':
            result = Math.pow(i_num1, i_num2);
            break;
        case 'Sqrt':
            if (i_num1 < 0) {
                error1.innerHTML = 'First number should be bigger than a zero!';
                error1.style.display = 'block';
            }
            else {
                result = Math.sqrt(i_num1);
            }
            break;
        default:
            break;
    }

    return result;
}

window.onload = function () {
    var num1 = document.getElementById('num1');
    var num2 = document.getElementById('num2');
    var submit = document.getElementById('submit');
    var error1 = document.getElementById('Error1');
    var error2 = document.getElementById('Error2');
    var error3 = document.getElementById('Error3');
    var result = document.getElementById('result');
    var dropdown = document.getElementById("operation");
    var selected = dropdown.options[dropdown.selectedIndex].value;

    submit.addEventListener('click', function () {
        var isError = false;
        var computed;
        num1 = document.getElementById('num1');
        num2 = document.getElementById('num2');
        selected = dropdown.options[dropdown.selectedIndex].value;
        error3.style.display = 'none';

        if (isNaN(num1.value)) {
            isError = true;
            num1.style.border='1px solid red';
            error1.innerHTML = 'First field is not a number!';
            error1.style.display = 'block';
        }

        if (isNaN(num2.value)) {
            isError = true;
            error2.innerHTML = 'Second field is not a number!';
            num2.style.border='1px solid red';
            error2.style.display = 'block';
        }

        if (!isError) {
            if (result.value == "") {
                error3.innerHTML = 'Result field is required';
                result.style.border='1px solid red';
                error3.style.display = 'block';
            } else {
                computed = compute(selected, num1, num2, error1, error2);
                if (computed !== Number(result.value)) {
                    error3.innerHTML = 'Inputed result is wrong!';
                    error3.style.display = 'block';
                }
                else {
                    window.location = 'index.php';
                }
            }
        }
    });

    num1.addEventListener('input', function () {
        error1.style.display = 'none';
        num1.style.border = '1px solid #ced4da';
    });

    num2.addEventListener('input', function () {
        error2.style.display = 'none';
        num2.style.border = '1px solid #ced4da';
    });

    result.addEventListener('input', function () {
        error3.style.display = 'none';
        result.style.border = '1px solid #ced4da';
    });
};