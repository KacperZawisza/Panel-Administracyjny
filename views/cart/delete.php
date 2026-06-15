<div class="add_content">
    <?php

        if(isset($this->id)){

            echo '<p class="deleted">Koszyk został usunięty</p>';
            
        }

    ?>
    <form class="Frm" action="delete" method="post">
    <ul>
    <li>
    <label>Id Koszyka</label><br><br>
    <input name="id" placeholder="Podaj Id Usówanego Koszyka">
    <br>
    </li>
    
    <li>
    <input type="submit" name="submit" value="Usuń Koszyk">
    </li>
    </form>

</div>