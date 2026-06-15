<?php

$user_role = $_SESSION['user']['role'];
?>
<form action="product_sizes/bulk_delete" method="post" id="allf">
    <h1 style="display:flex; justify-content: space-between; align-items: center;"><div><a href="#" class="header-anchor">#</a> Product Sizes</div> 
        <?php if ($user_role === 'admin'): ?>
        <div><a class="btn_add" href="product_sizes/add">Dodaj</a><button style="border: none;" class="btn_add" type="submit" name="submit" value="bulk_delete">Usuń zaznaczone</button></div><?php endif; ?></h1>
    <br>
            <tr>
                <?php if ($user_role === 'admin'): ?>
                <th><input type="checkbox" id="select-all"> Zaznacz wszystkie</th>
                <?php endif; ?>
            </tr>
    
    <table class="wtable" style="margin-top: 10px;border-collapse: collapse;">

        <tr>
            <?php if ($user_role === 'admin'): ?>
            <th>Zaznacz</th>
            <th style="min-width: 200px;"></th>
            <?php endif; ?>
            <th>Id</th>
            <th>Id Produktu</th>
            <th>Id Rozmiaru</th>
            <th>System Rozmiarów</th>

            

        </tr>

        <?php foreach($this->product_size_data as $course): ?>

        <tr>
            <?php if ($user_role === 'admin'): ?>
            <td id="operacje">
                <input type="checkbox" name="selected_ids[]" value="<?= $course['id'] ?>"> 
            </td>
            <?php endif; ?>
            <?php if ($user_role === 'admin'): ?>
            <td id="operations2" style="display: flex;">
                    
                    <a href="product_sizes/edit/<?= $course['id'] ?>"><img src="assets/images/edit.png" width="16" height="16">Edytuj</a> 

                    <form class="Frm" action="product_sizes/delete" method="post">
                        <input name="id" value="<?php echo htmlspecialchars($course['id']); ?>" style="display: none;">
                        <button type="submit" name="submit" style="background: none;border: none;text-decoration: underline;"><img src="assets/images/delete.png" width="16" height="16">Usuń</button>
                    </form>
                    

            </td>
            <?php endif; ?>
            <td><?= $course['id']?></td>
            <td><?= $course['product_id']?></td>
            <td><?= $course['size_id']?></td>
            <td><?= $course['size_system']?></td>
            

        </tr>

        <?php endforeach; ?>

    </table>
</form>
</div>
</div>
<script type="text/javascript" src="assets/js/check_all.js"></script>