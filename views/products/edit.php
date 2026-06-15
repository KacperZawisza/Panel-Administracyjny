<div class="bar"><h2>Edytuj Produkt</h2></div>
<form action="http://localhost/PracowniaProjektowaniaStronInternetowych/PanelTest/products/update" method="post">
    <!-- <input type="hidden" name="id" value="<?= htmlspecialchars($this->product['id'] ?? ''); ?>"><br> -->
    <input type="hidden" name="id" class="kwerenda" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" value="<?= htmlspecialchars($this->product['id'] ?? ''); ?>">
    <label for="name">Nazwa produktu:</label><br>
    <!-- <input type="text" name="name" value="<?= htmlspecialchars($this->product['name'] ?? ''); ?>"><br> -->
    <input type="text" name="name" class="kwerenda" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" value="<?= htmlspecialchars($this->product['name'] ?? ''); ?>"><br>

    <label for="brand">Marka:</label><br>
    <!-- <input type="text" name="brand" value="<?= htmlspecialchars($this->product['brand'] ?? ''); ?>"><br> -->
    <input type="text" name="brand" class="kwerenda" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" value="<?= htmlspecialchars($this->product['brand'] ?? ''); ?>"><br>

    <label for="price">Cena:</label><br>
    <!-- <input type="text" name="price" value="<?= htmlspecialchars($this->product['price'] ?? ''); ?>"><br> -->
    <input type="text" name="price" class="kwerenda" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" value="<?= htmlspecialchars($this->product['price'] ?? ''); ?>"><br>

    <label for="description">Opis:</label><br>
    <textarea class="kwerenda" rows="10" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" name="description"><?= htmlspecialchars($this->product['description'] ?? ''); ?></textarea><br>

    <label for="quantity">Ilość:</label><br>
    <!-- <input type="text" name="quantity" value="<?= htmlspecialchars($this->product['quantity'] ?? ''); ?>"><br> -->
    <input type="text" name="quantity" class="kwerenda" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" value="<?= htmlspecialchars($this->product['quantity'] ?? ''); ?>"><br>

    <label for="color">Kolory:</label><br>
    <!-- <input type="text" name="color" value="<?= htmlspecialchars($this->product['color'] ?? ''); ?>"><br> -->
    <input type="text" name="color" class="kwerenda" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" value="<?= htmlspecialchars($this->product['color'] ?? ''); ?>"><br>

    <label for="image_url">Ścieżka do zdjęcia:</label><br>
    <!-- <input type="text" name="image_url" value="<?= htmlspecialchars($this->product['image_url'] ?? ''); ?>"><br> -->
    <input type="text" name="image_url" class="kwerenda" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" value="<?= htmlspecialchars($this->product['image_url'] ?? ''); ?>"><br>

    <br>
    <input type="submit" class="btn_u" name="submit" value="Zapisz zmiany">
</form>