<main>
    <div id="main_head">
        <p>Form for server:</p>
    </div>
    <div id="main-middle-form">
        <!--<form action="business_logic.php" method="post">-->
        <form action="server_variables.php" method="post">
            <input id="" name="first_name" type="text" placeholder="First Name"><br>
            <p class="server-error"><?php if (array_key_exists('errors', $_GET)) echo $_GET['errors'][0]; ?></p>
            <input id="" name="second_name" type="text" placeholder="Second Name"><br>
            <p class="server-error"><?php if (array_key_exists('errors', $_GET)) echo $_GET['errors'][1]; ?></p>
            <input id="" name="last_name" type="text" placeholder="Last Name"><br>
            <p class="server-error"><?php if (array_key_exists('errors', $_GET)) echo $_GET['errors'][2]; ?></p>
            <select name="age"  id="">
                <option selected value="0">Less than 16</option>
                <option value="1">16-21</option>
                <option value="2">21-27</option>
                <option value="3">27-35</option>
                <option value="4">35-45</option>
                <option value="5">45-55</option>
                <option value="6">More than 55</option>
            </select><br>
            <textarea name="about" placeholder="About yourself"></textarea>
            <input type="submit" value="Send" id="submit">
        </form>
    </div>
</main>