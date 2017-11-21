<div class="row">
    <table class="table table-bordered" id="products">
        <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Colour</th>
            <th>Net Price</th>
            <th>Gross Price</th>
            <th>Quantity <br><small>(yes... ideally products should be grouped together)</small></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($basket_items as $item) : ?>
            <tr rel="<?= $item['colour'] ?>">

                <td><?= $item['product_id'] ?></td>
                <td><?= $item['title'] ?></td>
                <td><?= $item['colour'] ?></td>
                <td><?= $item['price_net'] ?>€</td>
                <td><?= $item['price_gross'] ?>€</td>
                <td>1</td>
                <td><a href="#" class="btn btn-danger btn-block">Remove</a></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>