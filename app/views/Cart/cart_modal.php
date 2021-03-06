<?php if (!empty($_SESSION['cart'])):?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
            <tr>
                <th>Фото</th>
                <th>Наименование</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Доавить количество</th>
                <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($_SESSION['cart'] as $key => $item):?>

                <tr>
                    <td><a href="product/<?php echo $item['alias']?>"><img src="images/<?php echo $item['img']?>" alt=""></a></td>
                    <td><a class="name-title" href="product/<?php echo $item['alias']?>"><?php echo $item['title'];?></td>
                    <td><?php echo $item['qty']?></td>
                    <td><?php echo $_SESSION['cart.currency']['symbol_left'] . $item['price'] . $_SESSION['cart.currency']['symbol_right']?></td>
                    <td><input type="number" size="1" value="<?php echo $item['qty']?>" min="1" step="1"></td>
                    <td><span data-id="<?php echo $key?>" class="glyphicon glyphicon-remove text-danger del-item" aria-hidden="true"></span></td>
                </tr>
            <?php endforeach;?>
            <tr>
                <td>Итого:</td>
                <td colspan="4" class="text-right cart-qty"><?php echo $_SESSION['cart.qty']?></td>
            </tr>
            <tr>
                <td>На сумму:</td>
                <td colspan="4" class="text-right cart-sum"><?php echo $_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right']?></td>
            </tr>
            </tbody>
        </table>
    </div>
<?php else:?>
    <h3>Корзина пуста...</h3>
<?php endif;?>
