<?php

$user_role = $_SESSION['user']['role'];
?>
<?php if ($user_role === 'admin'): ?>
<div class="ade">
    <div class="bar"><h2>Dodaj Użytkownika</h2></div>
    
    <div class="ade_table">
        <?php

        if(isset($this->id)){

            echo '<p class="added">Nowy użytkownik został dodany</p>';
            
        }

    ?>
    <form class="Frm" action="add" method="post">
    <ul style="list-style: none;">
    <li>
    <label>Imie i Nazwisko</label><br>
    <input type="text" name="name_surname" class="kwerenda" placeholder="Podaj Imię i Nazwisko" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    <br>
    </li>
    <li>
    <label>E-mail</label><br>
        <input type="email" name="email" class="kwerenda" placeholder="Podaj E-mail" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    </li>
    <li>
    <label>Nazwa Użytkownika</label><br>
        <input type="text" name="username" class="kwerenda" placeholder="Podaj nazwę użytkownika" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    </li>
    <li>
    <label>Hasło</label><br>
        <input type="password" name="password" class="kwerenda" placeholder="Podaj hasło" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    </li>
    <li>
    <label>Rola</label><br>
        <input type="text" name="role" class="kwerenda" placeholder="Podaj Imię i Nazwisko" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    </li>
    
    <li>
        <br>
    <input type="submit" name="submit" class="btn_u" value="Dodaj Użytkownika">
    <div style="clear: both;"></div>
    </li>
    </form>
    </div>
    
</div>
<?php else: 

    header("Location: ../");

    ?>
<?php endif; ?>