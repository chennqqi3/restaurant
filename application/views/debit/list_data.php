<?php
  $no = 1;
  foreach ($dataDebit as $debit) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $debit->bank_code; ?></td>
      <td><?php echo $debit->bank_name; ?></td>
      <td class="text-center" style="min-width:200px;">
          <button class="btn btn-warning update-dataDebit" data-id="<?php echo $debit->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-debit" data-id="<?php echo $debit->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
          <!-- <button class="btn btn-info detail-dataDebit" data-id="<?php echo $debit->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>  -->
      </td>
    </tr>
    <?php
    $no++;
  }
?>