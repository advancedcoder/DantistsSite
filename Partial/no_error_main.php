<main>
    <div id="main_head">
        <p>Form sent:</p>
    </div>
    <div id="main-middle-form"> 
        <p class="no-error">
            Form has been sent!<br>
            <?php if (array_key_exists('result', $_GET)) echo $_GET['result']; ?><br>
            <a href="/index.php">Home</a>
        </p>
    </div>
</main>