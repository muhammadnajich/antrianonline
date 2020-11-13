                    
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'C_Pesan/balas'?>">
                    <?php foreach ($pesan as $p) { ?>
                        <input type="hidden" name="email" value="<?php echo $p->email ?>">
                    <?php } ?>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Subject</label>
                        <div class="col-xs-8">
                            <input name="subject" class="form-control" type="text">
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pesan</label>
                        <div class="col-xs-8">
                            <textarea class="form-control" name="pesan" required="" rows="10"></textarea>
                        </div>
                    </div>

                    <div class="modal-footer">
                  <button class="btn btn-danger" data-dismiss="modal">Batal</a></button>
                  <button type="submit" class="btn btn-primary">Simpan</a></button>
                  </div>            
            </form>