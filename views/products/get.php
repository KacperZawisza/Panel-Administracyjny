<?php

$user_role = $_SESSION['user']['role'];

?>
<form action="products/bulk_delete" method="post" id="allf">
    <h1 style="display:flex; justify-content: space-between; align-items: center;"><div><a href="#" class="header-anchor">#</a> Products</div>
    <?php if ($user_role === 'admin'): ?>
     <div><a class="btn_add" href="products/add">Dodaj</a><button style="border: none;" class="btn_add" type="submit" name="submit" value="bulk_delete">Usuń zaznaczone</button><button class="btn_add2">Zapytania</button></div><?php endif; ?></h1>
    <br>

    <tr>
        <?php if ($user_role === 'admin'): ?>
        <th><input type="checkbox" id="select-all"> Zaznacz wszystkie</th>
        <?php endif; ?>
    </tr>
    <table class="wtable" style="overflow: auto;margin-top: 0;border-collapse: collapse;">

        <tr>
            <?php if ($user_role === 'admin'): ?>
            <th>Zaznacz</th>
            <th style="min-width: 100px;">Operacje</th>
            <?php endif; ?>
            <th>Id</th>
            <th>Nazwa</th>
            <th>Marka</th>
            <th>Cena</th>
            <th>Opis</th>
            <th>Ilość</th>
            <th>Kolory</th>
            <th>Scieżka Do Zdjęcia</th>
            <th>Data Dodania</th>
            <th>Data Edytowania</th>
            

        </tr>

        <?php foreach($this->product_data as $course): $skroconyTekst = substr($course['description'], 0, 60) . '...';$skroconyKolor = substr($course['color'], 0, 20) . '...';?>

        <tr>
            <?php if ($user_role === 'admin'): ?>
            <td id="operacje">
                <input type="checkbox" name="selected_ids[]" value="<?= $course['id'] ?>"> 
            </td>
            <?php endif; ?>
            <?php if ($user_role === 'admin'): ?>
            <td id="operations2" style="display: flex;height: fit-content;">
                    
                     <a href="products/edit/<?= $course['id'] ?>"><img src="assets/images/edit.png" width="16" height="16">Edytuj</a> 

                    <form class="Frm" action="products/delete" method="post">
                        <input name="id" value="<?php echo htmlspecialchars($course['id']); ?>" style="display: none;">
                        <button type="submit" name="submit" style="background: none;border: none;text-decoration: underline;"><img src="assets/images/delete.png" width="16" height="16">Usuń</button>
                    </form>
                    

            </td>
            <?php endif; ?>
            <td><?= $course['id']?></td>
            <td><?= $course['name']?></td>
            <td><?= $course['brand']?></td>
            <td><?= $course['price']?></td>
            <td style="max-height: 20px;overflow-x: hidden;" class="underscore"><?php echo $skroconyTekst; ?></td>
            <td><?= $course['quantity']?></td>
            <td><?= $skroconyKolor?></td>
            <td><?= $course['image_url']?></td>
            <td><?= $course['created_at']?></td>
            <td><?= $course['updated_at']?></td>
            

        </tr>

        <?php endforeach; ?>

    </table>
    </form>


<div class="query-section hidden" id="querySection">
    <h1>Zapytania bazodanowe <button class="close-btn" id="closeQuerySection">&lang;</button></h1>

    <div class="code-box">
    <p>1. Wszystkie produkty poniżej 2000.00zł</p>
        <div style="max-height: 400px;overflow: auto;width: fit-content;margin: 1em 0;">
            <table>
                
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>brand</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>created_at</th>
                </tr>
                <?php foreach ($this->pkw1_data as $pkw1): ?>
                <tr>
                    <td><?= htmlspecialchars($pkw1['id']) ?></td>
                    <td><?= htmlspecialchars($pkw1['name']) ?></td>
                    <td><?= htmlspecialchars($pkw1['brand']) ?></td>
                    <td><?= htmlspecialchars($pkw1['price']) ?></td>
                    <td><?= htmlspecialchars($pkw1['quantity']) ?></td>
                    <td><?= htmlspecialchars($pkw1['created_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div class="code-box">
    <p>2. Produkty których ilość wynosi mniej niż 20</p>
        <div style="max-height: 400px;overflow: auto;width: fit-content;margin: 1em 0;">
            <table>
                
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>brand</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>created_at</th>
                </tr>
                <?php foreach ($this->pkw2_data as $pkw2): ?>
                <tr>
                    <td><?= htmlspecialchars($pkw2['id']) ?></td>
                    <td><?= htmlspecialchars($pkw2['name']) ?></td>
                    <td><?= htmlspecialchars($pkw2['brand']) ?></td>
                    <td><?= htmlspecialchars($pkw2['price']) ?></td>
                    <td><?= htmlspecialchars($pkw2['quantity']) ?></td>
                    <td><?= htmlspecialchars($pkw2['created_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div class="code-box">
    <p>3. Produkty o marce Nike</p>
        <div style="max-height: 400px;overflow: auto;width: fit-content;margin: 1em 0;">
            <table>
                
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>brand</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>created_at</th>
                </tr>
                <?php foreach ($this->pkw3_data as $pkw3): ?>
                <tr>
                    <td><?= htmlspecialchars($pkw3['id']) ?></td>
                    <td><?= htmlspecialchars($pkw3['name']) ?></td>
                    <td><?= htmlspecialchars($pkw3['brand']) ?></td>
                    <td><?= htmlspecialchars($pkw3['price']) ?></td>
                    <td><?= htmlspecialchars($pkw3['quantity']) ?></td>
                    <td><?= htmlspecialchars($pkw3['created_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>


</div>

</div>
</div>
<script type="text/javascript" src="assets/js/check_all.js"></script>