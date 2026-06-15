<form id="allf">
<div id="getCourses">
    <table style="width: 100%;">
            <tr>
                <th style="background: #ddd;">Tabela: Cart</th>
                
            </tr>
    </table>
    <table style="margin-top: 0;">

        <tr>

            <th>Id Użytkownika</th>
            <th>Id Produktu</th>
            <th>Ilość</th>
            <th>Rozmiar</th>

            

        </tr>

        <?php foreach($this->cart_data as $course): ?>

        <tr>

            <td><?= $course['user_id']?></td>
            <td><?= $course['product_id']?></td>
            <td><?= $course['quantity']?></td>
            <td><?= $course['size']?></td>
            

        </tr>

        <?php endforeach; ?>

    </table>

</div>
</form>