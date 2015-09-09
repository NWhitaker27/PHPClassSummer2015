
<?php if ( isset($checkoutProducts) && count($checkoutProducts) > 0 ) : ?>
<table>

    <?php foreach ($checkoutProducts as $row): ?>
        <tr>            
            <td><?php echo $row['product']; ?></td>
            <td>$<?php echo number_format($row['price'],2); ?></td>
            <td><?php $total += $row['price']; ?></td>
        </tr>    
    <?php endforeach; ?>   

         <tr>            
            <td>Total</td>
            <td>$<?php echo number_format($total, 2); ?></td>
        </tr>  
</table>
 <?php else: ?>       
        <h2>No Products Found</h2>

<?php endif; ?>

