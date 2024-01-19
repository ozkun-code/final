<?php if (isset($data['invoices']) && !empty($data['invoices'])) : ?>
    <?php foreach ($data['invoices'] as $invoice) : ?>
        <h3>Invoice #<?= $invoice['id'] ?></h3>
        <table>
            <thead>
                <tr>
                    <th>Drug ID</th>
                    <th>Invoice ID</th>
                    <th>Patients ID</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($data['recipes'][$invoice['id']]) && !empty($data['recipes'][$invoice['id']])) : ?>
                    <?php foreach ($data['recipes'][$invoice['id']] as $recipe) : ?>
                        <tr>
                            <td><?= $recipe['drug_id'] ?></td>
                            <td><?= $recipe['invoice_id'] ?></td>
                            <td><?= $recipe['patients_id'] ?></td>
                            <td><?= $recipe['quantity'] ?></td>
                            <td><?= $recipe['price'] ?></td>
                            <td><?= $recipe['date'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">Resep belum dibuat untuk invoice ini.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
       
    <?php endforeach; ?>
<?php else : ?>
    <?php var_dump($data['recipes']) ?>,
    <p>Tidak ada invoice.</p>
<?php endif; ?>
