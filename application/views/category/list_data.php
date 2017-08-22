<?php
  $no = 1;
  foreach ($dataCategory as $category) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $category->category_code; ?></td>
      <td><?php echo $category->category_name; ?></td>
      <td><?php echo $category->status; ?></td>
      <td class="text-center" style="min-width:200px;">
          <button class="btn btn-warning update-dataCategory" data-id="<?php echo $category->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-category" data-id="<?php echo $category->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
          <!-- <button class="btn btn-info detail-dataCategory" data-id="<?php echo $category->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>  -->
      </td>
    </tr>
    <?php
    $no++;
  }
?>