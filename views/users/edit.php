<div class="ade">
    <div class="bar"><h2>Edytuj Produkt</h2></div><br>
    <div class="ade_table">
    <form action="http://localhost/PracowniaProjektowaniaStronInternetowych/PanelTest/users/update" method="post">
        <input name="id" value="<?= htmlspecialchars($this->user['id'] ?? ''); ?>" type="hidden">
        <input type="hidden" name="id" class="kwerenda" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" value="<?= htmlspecialchars($this->user['id'] ?? ''); ?>">

        <label for="name_surname">Imię i Nazwisko:</label><br>
        <!-- <input type="text" name="name_surname" value="<?= htmlspecialchars($this->user['name_surname'] ?? ''); ?>"><br> -->
        <input type="text" name="name_surname" class="kwerenda" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" value="<?= htmlspecialchars($this->user['name_surname'] ?? ''); ?>"><br>

        <label for="email">E-mail:</label><br>
        <!-- <input type="email" name="email" value="<?= htmlspecialchars($this->user['email'] ?? ''); ?>"><br> -->
        <input type="email" name="email" class="kwerenda" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" value="<?= htmlspecialchars($this->user['email'] ?? ''); ?>"><br>

        <label for="username">Nazwa Użytkownika:</label><br>
        <!-- <input type="text" name="username" value="<?= htmlspecialchars($this->user['username'] ?? ''); ?>"><br> -->
        <input type="text" name="username" class="kwerenda" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" value="<?= htmlspecialchars($this->user['username'] ?? ''); ?>"><br>

        <label for="password">Hasło:</label><br>
        <!-- <input type="password" name="password" value="<?= htmlspecialchars($this->user['password'] ?? ''); ?>"><br> -->
        <input type="password" name="password" class="kwerenda" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" value="<?= htmlspecialchars($this->user['password'] ?? ''); ?>"><br>

        <label for="password">Rola:</label><br>
        <!-- <input type="text" name="role" value="<?= htmlspecialchars($this->user['role'] ?? ''); ?>"><br> -->
        <input type="text" name="role" class="kwerenda" style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;" value="<?= htmlspecialchars($this->user['role'] ?? ''); ?>"><br>

        <br>
        <input type="submit" class="btn_u" name="submit" value="Zapisz zmiany">
        <div style="clear: both;"></div>
    </form>
    </div>
</div>