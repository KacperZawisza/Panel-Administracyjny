<?php

$user_role = $_SESSION['user']['role'];
?>
<?php if ($user_role === 'admin'): ?>
<div class="add_content">
    <div class="bar"><h2>Dodaj Użytkownika</h2></div>
    <?php

        if(isset($this->id)){

            echo '<p class="added">Nowy rozmiar został dodany</p>';
            
        }

    ?>
    <form class="Frm" action="add" method="post">
    <ul style="list-style: none;">
    <li>
    <label>Wartość Rozmiaru</label><br>
    <input type="text" name="size_value" class="kwerenda" placeholder="Podaj wartość rozmiaru" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    <br>
    </li>
    <li>
    <label>System Rozmiarów</label><br>
    <input type="text" name="size_system" class="kwerenda" placeholder="Podaj System Rozmiarów (np. EUR, US)" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    </li>
    
    <li>
        <br>
    <input class="btn_u" type="submit" name="submit" value="Dodaj Rozmiar">
    </li>
    </form>

</div>
<?php else: 

    header("Location: ../");

    ?>
<?php endif; ?>