<?php
  foreach ($dataProduct as $product) {
    ?>
    <tr>
      <td><?php echo $product->product_code; ?></td>
      <td><?php echo $product->product_name; ?></td>
      <td><?php echo $product->category_name; ?></td>
      <td><?php echo $product->price; ?></td>
      <td><?php echo $product->description; ?></td>
      <td><?php echo $product->picture; ?></td>
      <td><?php echo $product->status; ?></td>
      <td class="text-center" style="min-width:200px;">
        <button class="btn btn-warning update-dataProduct" data-id="<?php echo $product->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
        <button class="btn btn-danger konfirmasiHapus-product" data-id="<?php echo $product->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
      </td>
    </tr>
    <?php
  }
?>