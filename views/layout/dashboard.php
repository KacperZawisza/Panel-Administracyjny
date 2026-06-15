<?php

$user_role = $_SESSION['user']['role'];
?>
<h1 id="chart-js"><a href="<?= BASE_URL ?>dashboard" class="header-anchor">#</a> Dashboard</h1>
<p>Statystyki witryny:</p>
<ul>
    <li><strong>Ilość produktów na stronie</strong> — <span id="productsCount">...</span></li> 
    <li>Zarejestrowani użytkownicy — <span id="usersCount">...</span></li> 
    <li>Liczebność marek — <span id="brandsCount">...</span></li> 
</ul>
<div class="chart">
  <canvas id="myChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  // Funkcja do pobierania danych statystyk
  async function fetchStats() {
    try {
      const response = await fetch('home/getStats'); // URL do kontrolera
      const stats = await response.json();

      // Aktualizowanie tekstu w HTML
      document.getElementById('productsCount').textContent = stats.products_count;
      document.getElementById('usersCount').textContent = stats.users_count;
      document.getElementById('brandsCount').textContent = stats.brands_count;

      // Tworzenie wykresu
      const ctx = document.getElementById('myChart');
      new Chart(ctx, {
        type: 'bar',
        data: {
          labels: ['Ilość produktów', 'Zarejestrowani użytkownicy', 'Liczebność marek'],
          datasets: [{
            label: 'Statystyki witryny',
            data: [stats.products_count, stats.users_count, stats.brands_count],
            borderWidth: 1
          }]
        },
        options: {
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    } catch (error) {
      console.error('Błąd podczas pobierania statystyk:', error);
    }
  }

  // Wywołanie funkcji po załadowaniu strony
  fetchStats();
</script>

<br>

<h2 id="zapytania">Zapytania bazodanowe</h2>
<ul>
    
    <div class="code-box">
        <li>Wszystkie produkty powyżej 2000.00zł:</li>
      <div class="kwerenda"><pre><code>SELECT * FROM products WHERE price > 2000.00</code></pre></div>
    
    <p><strong>Raport:</strong></p>
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
                <?php foreach ($this->kw1_data as $kw1): ?>
                <tr>
                    <td><?= htmlspecialchars($kw1['id']) ?></td>
                    <td><?= htmlspecialchars($kw1['name']) ?></td>
                    <td><?= htmlspecialchars($kw1['brand']) ?></td>
                    <td><?= htmlspecialchars($kw1['price']) ?></td>
                    <td><?= htmlspecialchars($kw1['quantity']) ?></td>
                    <td><?= htmlspecialchars($kw1['created_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div class="code-box">
        <li>Tylko produkty o marce AIR Jordan</li>
      <div class="kwerenda"><pre><code>SELECT * FROM products WHERE brand = 'AIR JORDAN'</code></pre></div>
    
    <p><strong>Raport:</strong></p>
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
                <?php foreach ($this->kw2_data as $kw2): ?>
                <tr>
                    <td><?= htmlspecialchars($kw2['id']) ?></td>
                    <td><?= htmlspecialchars($kw2['name']) ?></td>
                    <td><?= htmlspecialchars($kw2['brand']) ?></td>
                    <td><?= htmlspecialchars($kw2['price']) ?></td>
                    <td><?= htmlspecialchars($kw2['quantity']) ?></td>
                    <td><?= htmlspecialchars($kw2['created_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>

    <div class="code-box">
        <li>Użytkownicy bez roli administratora:</li>
      <div class="kwerenda"><pre><code>SELECT * FROM users WHERE role = 'user'</code></pre></div>
    
    <p><strong>Raport:</strong></p>
        <div style="max-height: 400px;overflow: auto;width: fit-content;margin: 1em 0;">
            <table>
                
                <tr>
                    <th>id</th>
                    <th>name_surname</th>
                    <th>username</th>
                    <th>email</th>
                    <th>password</th>
                    <th>created_at</th>
                </tr>
                <?php foreach ($this->kw3_data as $kw3): ?>
                <tr>
                    <td><?= htmlspecialchars($kw3['id']) ?></td>
                    <td><?= htmlspecialchars($kw3['name_surname']) ?></td>
                    <td><?= htmlspecialchars($kw3['username']) ?></td>
                    <td><?= htmlspecialchars($kw3['email']) ?></td>
                    <td><?= htmlspecialchars($kw3['password']) ?></td>
                    <td><?= htmlspecialchars($kw3['created_at']) ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</ul>



<h2 id="raport">Własny raport</h2>
<p>
    Funkcja własnego raportu pozwala użytkownikom na generowanie raportów dostosowanych do ich potrzeb. Dzięki niej możesz łatwo przefiltrować dane według określonych kryteriów i uzyskać szczegółowe informacje w czytelnej formie.
</p>
<?php if ($user_role === 'admin'): ?>
<div>
    <form method="POST" action="<?= BASE_URL?>home/CustomReport">
    <input type="text" name="ask" class="kwerenda" placeholder="Wpisz zapytanie SQL" 
           style="border: none; width: 700px; margin-top: 1em; font-family: Consolas;">
    <button type="submit" name="submit" class="sbmt">Wyślij</button>
</form>

<?php if (isset($this->report_error)): ?>
    <p style="color: red;">Błąd w zapytaniu: <?= htmlspecialchars($this->report_error) ?></p>
<?php endif; ?>

<?php if (!empty($this->report_data)): ?>

    <h3 style="margin-top: 1em;">Wyniki zapytania:</h3>
    <div class="code-box">
    <div style="max-height: 400px;overflow: auto;width: fit-content;margin: 1em 0;">
        <table>
                <tr>
                    <?php foreach (array_keys($this->report_data[0]) as $column): ?>
                        <th><?= htmlspecialchars($column) ?></th>
                    <?php endforeach; ?>
                </tr>
                <?php foreach ($this->report_data as $row): ?>
                    <tr>
                        <?php foreach ($row as $value): ?>
                            <td><?= htmlspecialchars($value ?? '') ?></td>
                        <?php endforeach; ?>
                    </tr>
                <?php endforeach; ?>
        </table>
    </div>
    </div>

<?php endif; ?>


</div>
<?php endif; ?>
<?php if ($user_role === 'user'): ?>

    <p class="warning"><img src="<?= BASE_URL; ?>assets/images/warning.png">Funkcja własnego raportu jest dostępna jedynie dla użytkowników z rolą administratora.</p>

<?php endif; ?> 
