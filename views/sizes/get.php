<?php

$user_role = $_SESSION['user']['role'];
?>
<form action="sizes/bulk_delete" method="post" id="allf">
    <h1 style="display:flex; justify-content: space-between; align-items: center;"><div><a href="#" class="header-anchor">#</a> Sizes</div>
    <?php if ($user_role === 'admin'): ?>
     <div><a class="btn_add" href="sizes/add">Dodaj</a><button style="border: none;" class="btn_add" type="submit" name="submit" value="bulk_delete">Usuń zaznaczone</button><button class="btn_add2">Zapytania</button></div><?php endif; ?></h1>
    <br>

            <tr>
                <?php if ($user_role === 'admin'): ?>
                <th><input type="checkbox" id="select-all"> Zaznacz wszystkie</th>
                <?php endif; ?>
            </tr>

    <table class="wtable" style="margin-top: 10px;border-collapse: collapse;">

        <tr>
            <?php if ($user_role === 'admin'): ?>
            <th style="min-width: 200px;"></th>
            <?php endif; ?>
            <th>Id</th>
            <th>Wartość Rozmiaru</th>
            <th>System Rozmiarów</th>

            

        </tr>

        <?php foreach($this->size_data as $course): ?>

        <tr>

            <?php if ($user_role === 'admin'): ?>
            <td id="operations" style="display: flex;">
                    <input type="checkbox" name="selected_ids[]" value="<?= $course['id'] ?>"> 
                    <a href="sizes/edit/<?= $course['id'] ?>"><img src="assets/images/edit.png" width="16" height="16">Edytuj</a> 

                    <form class="Frm" action="sizes/delete" method="post">
                        <input name="id" value="<?php echo htmlspecialchars($course['id']); ?>" style="display: none;">
                        <button type="submit" name="submit" style="background: none;border: none;text-decoration: underline;"><img src="assets/images/delete.png" width="16" height="16">Usuń</button>
                    </form>
                    

                </td>
            <?php endif; ?>
            <td><?= $course['id']?></td>
            <td><?= $course['size_value']?></td>
            <td><?= $course['size_system']?></td>
            

        </tr>

        <?php endforeach; ?>

    </table>



<div class="query-section hidden" id="querySection">
    <h1>Zapytania bazodanowe <button class="close-btn" id="closeQuerySection">&lang;</button></h1>

    <div class="code-box">
    <p>1. Rozmiary w systemie Europejskim</p>
        <div style="max-height: 400px;overflow: auto;width: fit-content;margin: 1em 0;">
            <table>
                
                <tr>
                    <th>id</th>
                    <th>size_value</th>
                    <th>size_system</th>
                </tr>
                <?php foreach ($this->skw1_data as $skw1): ?>
                <tr>
                    <td><?= htmlspecialchars($skw1['id']) ?></td>
                    <td><?= htmlspecialchars($skw1['size_value']) ?></td>
                    <td><?= htmlspecialchars($skw1['size_system']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div class="code-box">
    <p>2. Rozmiary w systemie Amerykańskim</p>
        <div style="max-height: 400px;overflow: auto;width: fit-content;margin: 1em 0;">
            <table>
                
                <tr>
                    <th>id</th>
                    <th>size_value</th>
                    <th>size_system</th>
                </tr>
                <?php foreach ($this->skw2_data as $skw2): ?>
                <tr>
                    <td><?= htmlspecialchars($skw2['id']) ?></td>
                    <td><?= htmlspecialchars($skw2['size_value']) ?></td>
                    <td><?= htmlspecialchars($skw2['size_system']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div class="code-box">
    <p>3. Rozmiary Europejskie poniżej 40</p>
        <div style="max-height: 400px;overflow: auto;width: fit-content;margin: 1em 0;">
            <table>
                
                <tr>
                    <th>id</th>
                    <th>size_value</th>
                    <th>size_system</th>
                </tr>
                <?php foreach ($this->skw3_data as $skw3): ?>
                <tr>
                    <td><?= htmlspecialchars($skw3['id']) ?></td>
                    <td><?= htmlspecialchars($skw3['size_value']) ?></td>
                    <td><?= htmlspecialchars($skw3['size_system']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>


</div>

</div>
</div>

<script type="text/javascript" src="assets/js/check_all.js"></script>