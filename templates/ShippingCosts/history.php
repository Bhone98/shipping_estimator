<div class="container mt-4">
    <h1>Quotes History</h1>

    <?php if ($quotes->isEmpty()): ?>
        <div class="alert alert-info">No quotes saved yet.</div>
    <?php else: ?>

        <table class="table table-bordered table-striped mt-3">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Carrier</th>
                    <th>Speed</th>
                    <th>Billable Weight (kg)</th>
                    <th>Cost (£)</th>
                    <th>Created</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quotes as $q): ?>
                    <tr>
                        <td><?= $q->id ?></td>
                        <td><?= h(ucwords(str_replace('_',' ',$q->carrier))) ?></td>
                        <td><?= h(ucwords(str_replace('_',' ',$q->speed))) ?></td>
                        <td><?= number_format($q->billable_weight, 2) ?></td>
                        <td>£<?= number_format($q->cost, 2) ?></td>
                        <td><?= $q->created ?? "-" ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>

    <a href="/shipping-costs" class="btn btn-success">Back to Estimator</a>
</div>
