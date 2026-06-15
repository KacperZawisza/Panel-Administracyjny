<?php

$user_role = $_SESSION['user']['role'];
?>
<?php if ($user_role === 'admin'): ?>
<div class="add_content">
    <div class="bar"><h2>Dodaj Produkt</h2></div>
    <?php

        if(isset($this->id)){

            echo '<p class="added">Nowy produkt został dodany</p>';
            
        }

    ?>
    <form class="Frm" action="add" method="post">
    <ul style="list-style: none;">
    <li>
    <label>Nazwa</label><br>
    <input type="text" name="name" class="kwerenda" placeholder="Podaj Nazwę" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    </li>
    <li>
    <label>Marka</label><br>
    <input type="text" name="brand" class="kwerenda" placeholder="Podaj Markę" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    </li>
    <li>
    <label>Cena</label><br>
    <input type="text" name="price" class="kwerenda" placeholder="Podaj Cenę" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    </li>
    <li>
    <label>Opis</label><br>
    <textarea style="border: none;" class="kwerenda" rows="10" cols="50" name="description" placeholder="Podaj Opis"></textarea>
    </li>
    <li>
    <label>Ilość</label><br>
    <input type="text" name="quantity" class="kwerenda" placeholder="Podaj Ilość" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    </li>
    <li>
    <label>Kolory</label><br>
    <input type="text" name="color" class="kwerenda" placeholder="Podaj Kolory (oddzielone znakiem ',' np. #ff0000, #00ff12)" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    </li>
    <li>
    <label>Scieżka Do Zdjęcia</label><br>
    <input type="text" name="image_url" class="kwerenda" placeholder="Podaj Scieżkę Do Pliku" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    </li>
    
    <li>
        <br>
    <input type="submit" name="submit" class="btn_u" value="Dodaj Produkt">
    <div style="clear: both;"></div>
    </li>
    </form>

</div>
<?php else: 

    header("Location: ../");

    ?>
<?php endif; ?>