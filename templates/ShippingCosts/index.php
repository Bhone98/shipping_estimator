<div class="container mt-4">
    <div class="card p-4 shadow">
<h1>Shipping Cost Estimator</h1>
<div class="text-end mb-3">
    <a href="<?= $this->Url->build(['controller' => 'ShippingCosts', 'action' => 'history']) ?>"
       class="btn btn-success">
        View Quote History
    </a>
</div>

<?php if (isset($errors) && !empty($errors)): ?>
    <div class="alert alert-danger">
        <strong>Please correct the following errors:</strong>
        <ul class="mt-2 mb-0">
            <?php foreach ($errors as $field => $messages): ?>
                <?php foreach ($messages as $message): ?>
                    <li><strong><?= ucfirst($field) ?>:</strong> <?= h($message) ?></li>
                <?php endforeach; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<?= $this->Form->create() ?>
    <?= $this->Form->control('weight', ['label' => 'Weight (kg)']) ?>
    <?= $this->Form->control('length', ['label' => 'Length (cm)']) ?>
    <?= $this->Form->control('width', ['label' => 'Width (cm)']) ?>
    <?= $this->Form->control('height', ['label' => 'Height (cm)']) ?>
    <?= $this->Form->control('carrier', [
    'type' => 'select',
    'label' => 'Carrier',
    'options' => [
        'royal_mail' => 'Royal Mail',
        'dhl' => 'DHL',
        'ups' => 'UPS'
    ]
]) ?>
<?= $this->Form->control('speed', [
    'type' => 'select',
    'label' => 'Delivery Speed',
    'options' => [
        'standard' => 'Standard (1x)',
        'express' => 'Express (1.3x)',
        'next_day' => 'Next-Day (1.8x)',
    ]
]) ?>
    <?= $this->Form->button('Calculate Shipping Cost', [
    'class' => 'btn btn-success'
]) ?>

<?php if (isset($cost)): ?>
    <hr>
    <h2>Shipping Summary</h2>
    <p><strong>Actual Weight:</strong> <?= $weight ?> kg</p>
    <p><strong>Volumetric Weight:</strong> <?= number_format($volumetricWeight, 2) ?> kg</p>
    <p><strong>Billable Weight:</strong> <?= number_format($billableWeight, 2) ?> kg</p>
    <div class="alert alert-success mt-4">
    <h3>Estimated Cost: £<?= number_format($cost, 2) ?></h3>
    </div>
<?php endif; ?>
</div>
</div>