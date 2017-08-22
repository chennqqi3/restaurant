<div class="col-md-offset-1 col-md-10 col-md-offset-1 well">
  <div class="form-msg"></div>
  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <h3 style="display:block; text-align:center;">Update Data Vip</h3>

  <form id="form-update-vip" method="POST">
    <input type="hidden" name="id" value="<?php echo $dataVip->id; ?>">
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-pencil-square-o"></i>
      </span>
      <input type="text" class="form-control" placeholder="Vip Code" name="code" aria-describedby="sizing-addon2" value="<?php echo $dataVip->code; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-address-card"></i>
      </span>
      <input type="text" class="form-control" placeholder="Vip Name" name="name" aria-describedby="sizing-addon2" value="<?php echo $dataVip->name; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-phone"></i>
      </span>
      <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" aria-describedby="sizing-addon2" value="<?php echo $dataVip->phone_number; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-envelope"></i>
      </span>
      <input type="text" class="form-control" placeholder="Email" name="email" aria-describedby="sizing-addon2" value="<?php echo $dataVip->email; ?>">
    </div>
    <div class="input-group form-group">
      <span class="input-group-addon" id="sizing-addon2">
        <i class="fa fa-calendar"></i>
      </span>
<style>
.datepicker{z-index:1151;}
</style>
      <input type="text" id="datepicker" class="form-control" placeholder="Expired" name="expired" aria-describedby="sizing-addon2" value="<?php echo $dataVip->expired; ?>">
    </div>
    
      <div class="form-group">
      <div class="col-md-12">
          <button type="submit" class="form-control btn btn-primary"> <i class="glyphicon glyphicon-ok"></i> Update Data</button>
      </div>
    </div>
  </form>
</div>