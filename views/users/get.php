<?php

$user_role = $_SESSION['user']['role'];
?>


<form action="users/save_roles" method="post" id="allf">
    <form action="users/bulk_delete" method="post">
    <h1 style="display:flex; justify-content: space-between; align-items: center;"><div><a href="#" class="header-anchor">#</a> Users</div>
    <?php if ($user_role === 'admin'): ?>
    <div><a class="btn_add" href="users/add">Dodaj</a><button class="btn_add" type="submit" name="submit" value="bulk_delete">Usuń zaznaczone</button><button type="submit" class="btn_add">Zapisz</button><button class="btn_add2">Zapytania</button></div><?php endif; ?></h1>
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
            <th style="min-width: 200px;">Operacje</th>
            <?php endif; ?>
            <th>Id</th>
            <th>Imię i Nazwisko</th>
            <th>e-mail</th>
            <th>Nazwa Użytkownika</th>
            <th>Hasło</th>
            <th>Rola</th>
            <th>Data Założenia Konta</th>
        </tr>

        <?php foreach ($this->user_data as $user): ?>
        <tr>
            <?php if ($user_role === 'admin'): ?>
            <td id="operacje">
                <input type="checkbox" name="selected_ids[]" value="<?= $user['id'] ?>">
 
            </td>
            <td id="operations2">
                <a href="users/edit/<?= $user['id'] ?>"><img src="assets/images/edit.png" width="16" height="16"> Edytuj</a>
                <form class="Frm" action="users/delete" method="post" style="display: inline;">
                    <input name="id" value="<?= htmlspecialchars($user['id']); ?>" type="hidden">
                    <button type="submit" name="submit" style="background: none; border: none; text-decoration: underline;">
                        <img src="assets/images/delete.png" width="16" height="16"> Usuń
                    </button>
                </form>
            </td>
            <?php endif; ?>
            <td><?= $user['id'] ?></td>
            <td><?= htmlspecialchars($user['name_surname']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
            <td><?= htmlspecialchars($user['username']) ?></td>
            <td><?= htmlspecialchars($user['password']) ?></td>
            <td>
                <?php if ($user_role === 'admin'): ?>
                <select class="slct" name="roles[<?= $user['id'] ?>]" id="roles">
                    <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                    <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                </select>
            <?php else: ?>
                <?= htmlspecialchars($user['role']) ?>
                <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($user['created_at']) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
 </form>
</form>

<div class="query-section hidden" id="querySection">
    <h1>Zapytania bazodanowe <button class="close-btn" id="closeQuerySection">&lang;</button></h1>

    <div class="code-box">
    <p>1. Użytkownicy posiadający rolę administratora</p>
        <div style="max-height: 400px;overflow: auto;width: fit-content;margin: 1em 0;">
            <table>
                
                <tr>
                    <th>id</th>
                    <th>name_surname</th>
                    <th>username</th>
                    <th>email</th>
                    <th>password</th>
                    <th>created_at</th>
                    <th>role</th>
                </tr>
                <?php foreach ($this->ukw1_data as $ukw1): ?>
                <tr>
                    <td><?= htmlspecialchars($ukw1['id']) ?></td>
                    <td><?= htmlspecialchars($ukw1['name_surname']) ?></td>
                    <td><?= htmlspecialchars($ukw1['username']) ?></td>
                    <td><?= htmlspecialchars($ukw1['email']) ?></td>
                    <td><?= htmlspecialchars($ukw1['password']) ?></td>
                    <td><?= htmlspecialchars($ukw1['created_at']) ?></td>
                    <td><?= htmlspecialchars($ukw1['role']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div class="code-box">
    <p>2. Użytkownicy posiadający rolę użytkownika</p>
        <div style="max-height: 400px;overflow: auto;width: fit-content;margin: 1em 0;">
            <table>
                
                <tr>
                    <th>id</th>
                    <th>name_surname</th>
                    <th>username</th>
                    <th>email</th>
                    <th>password</th>
                    <th>created_at</th>
                    <th>role</th>
                </tr>
                <?php foreach ($this->ukw2_data as $ukw2): ?>
                <tr>
                    <td><?= htmlspecialchars($ukw2['id']) ?></td>
                    <td><?= htmlspecialchars($ukw2['name_surname']) ?></td>
                    <td><?= htmlspecialchars($ukw2['username']) ?></td>
                    <td><?= htmlspecialchars($ukw2['email']) ?></td>
                    <td><?= htmlspecialchars($ukw2['password']) ?></td>
                    <td><?= htmlspecialchars($ukw2['created_at']) ?></td>
                    <td><?= htmlspecialchars($ukw2['role']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div class="code-box">
    <p>3. Użytkownicy zarejestrowani przed 2025 rokiem</p>
        <div style="max-height: 400px;overflow: auto;width: fit-content;margin: 1em 0;">
            <table>
                
                <tr>
                    <th>id</th>
                    <th>name_surname</th>
                    <th>username</th>
                    <th>email</th>
                    <th>password</th>
                    <th>created_at</th>
                    <th>role</th>
                </tr>
                <?php foreach ($this->ukw3_data as $ukw3): ?>
                <tr>
                    <td><?= htmlspecialchars($ukw3['id']) ?></td>
                    <td><?= htmlspecialchars($ukw3['name_surname']) ?></td>
                    <td><?= htmlspecialchars($ukw3['username']) ?></td>
                    <td><?= htmlspecialchars($ukw3['email']) ?></td>
                    <td><?= htmlspecialchars($ukw3['password']) ?></td>
                    <td><?= htmlspecialchars($ukw3['created_at']) ?></td>
                    <td><?= htmlspecialchars($ukw3['role']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>


</div>