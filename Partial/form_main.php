<script src="/script/script.js"></script>
<main>
    <div id="main_head">
        <p>Check the answer:</p>
    </div>
    <div id="main-middle-form">
        <form>
            <input id="num1" name="number1" type="text" placeholder="Number 1"><br>
            <div id="Error1"></div><br>
            <input id="num2" name="number2" type="text" placeholder="Number 2"><br>
            <div id="Error2"></div><br>
            <p>Operation:</p>
            <select name="operation"  id="operation">
                <option selected value="Sum">Sum</option>
                <option value="Sub">Sub</option>
                <option value="Mul">Mul</option>
                <option value="Div">Div</option>
                <option value="Pow">Pow</option>
                <option value="Sqrt">Sqrt</option>
            </select><br>
            <input name="result" id="result" type="text" placeholder="Result"><br>
            <div id="Error3"></div><br>
            <input type="button" value="Compute" id="submit">
        </form>
    </div>
</main>