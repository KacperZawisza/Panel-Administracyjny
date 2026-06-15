<div class="add_content">
    <?php

        if(isset($this->id)){

            echo '<p class="added">Nowy koszyk został dodany</p>';
            
        }

    ?>
    <form class="Frm" action="add" method="post">
    <ul>
    <li>
    <label>Id Użytkownika</label><br><br>
    <input name="user_id" placeholder="Podaj Id Użytkownika Do Którego Należeć Będzie Koszyk">
    <br>
    </li>
    <li>
    <label>Id Produktu</label><br><br>
    <input name="product_id" placeholder="Podaj Id Produktu">
    </li>
    <li>
    <label>Ilość</label><br><br>
    <input name="quantity" placeholder="Podaj Ilość Dodawanego Produktu">
    </li>
    
    <li>
    <input type="submit" name="submit" value="Dodaj Koszyk">
    </li>
    </form>

</div>