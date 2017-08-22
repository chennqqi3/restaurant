<?php
  $no = 1;
  foreach ($dataCredit as $credit) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $credit->bank_code; ?></td>
      <td><?php echo $credit->bank_name; ?></td>
      <td class="text-center" style="min-width:200px;">
          <button class="btn btn-warning update-dataCredit" data-id="<?php echo $credit->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-credit" data-id="<?php echo $credit->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
          <!-- <button class="btn btn-info detail-dataCredit" data-id="<?php echo $credit->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>  -->
      </td>
    </tr>
    <?php
    $no++;
  }
?>