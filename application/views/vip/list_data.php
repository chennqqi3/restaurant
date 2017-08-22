<?php
  $no = 1;
  foreach ($dataVip as $vip) {
    ?>
    <tr>
      <td><?php echo $no; ?></td>
      <td><?php echo $vip->code; ?></td>
      <td><?php echo $vip->name; ?></td>
      <td><?php echo $vip->phone_number; ?></td>
      <td><?php echo $vip->email; ?></td>
      <td><?php echo $vip->expired; ?></td>
      <td class="text-center" style="min-width:200px;">
          <button class="btn btn-warning update-dataVip" data-id="<?php echo $vip->id; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
          <button class="btn btn-danger konfirmasiHapus-vip" data-id="<?php echo $vip->id; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
          <!-- <button class="btn btn-info detail-dataVip" data-id="<?php echo $vip->id; ?>"><i class="glyphicon glyphicon-info-sign"></i> Detail</button>  -->
      </td>
    </tr>
    <?php
    $no++;
  }
?>