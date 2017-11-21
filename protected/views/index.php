
<div class="row colour-selector">
    <div class="col-sm-1 grey" rel="1"></div>
    <div class="col-sm-1 blue" rel="2"></div>
    <div class="col-sm-1 red" rel="3"></div>
</div>

<div class="m-5"></div>

<div class="row">
    <table class="table table-bordered" id="products">
        <thead>
        <tr>
            <th>#</th>
            <th>Product Name</th>
            <th>Colour</th>
            <th>Net Price</th>
            <th>Gross Price</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $product) : ?>
            <tr rel="<?= $product['colour'] ?>">
                <td><?= $product['id'] ?></td>
                <td><?= $product['title'] ?></td>
                <td><?= $product['colour'] ?></td>
                <td><?= $product['price_net'] ?>€</td>
                <td><?= $product['price_gross'] ?>€</td>
                <td><a href="<?= BASE_PATH ?>?page=basket&add=<?= $product['id'] ?>" class="btn btn-primary btn-block">Add to basket</a></td>
            </tr>
        <?php endforeach ?>
        </tbody>
    </table>
</div>


<script type="text/javascript">
    $(document).ready(function() {
        $('.colour-selector div').click(function() {
            var colour = $(this).attr('rel');
            $('#products tbody tr').hide();
            $('#products tbody tr[rel='+colour+']').show();
        });
    });
</script>