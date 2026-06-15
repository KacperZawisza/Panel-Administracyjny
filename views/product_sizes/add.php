<?php

$user_role = $_SESSION['user']['role'];
?>
<?php if ($user_role === 'admin'): ?>
<div class="add_content">
    <div class="bar"><h2>Dodaj Użytkownika</h2></div>
    <?php

        if(isset($this->id)){

            echo '<p class="added">Nowy rozmiar produktu został dodany</p>';
            
        }

    ?>
    <form class="Frm" action="add" method="post">
    <ul style="list-style: none;">
    <li>
    <label>Id Produktu</label><br>
    <input type="text" name="product_id" class="kwerenda" placeholder="Podaj Id Produktu" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    <br>
    </li>
    <li>
    <label>Id Rozmiaru</label><br>
    <input type="text" name="size_id" class="kwerenda" placeholder="Podaj Id rozmiaru" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    </li>
    <li>
    <label>System Rozmiarów</label><br>
    <input type="text" name="size_system" class="kwerenda" placeholder="Podaj System Rozmiarów (np. EUR, US)" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    </li>
    
    <li><br>
    <input type="submit" class="btn_u" name="submit" value="Dodaj Rozmiar Produktu">
    </li>
    </form>

</div>
<?php else: 

    header("Location: " . BASE_URL);

    ?>
<?php endif; ?>