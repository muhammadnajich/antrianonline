                    
                    <form class="form-horizontal" method="post" action="<?php echo base_url().'C_Permohonan/terima'?>">
                    <?php foreach ($permohonan as $p) { ?>
                        <input type="hidden" name="id_permohonan" value="<?php echo $p->id_permohonan ?>">
                        <input type="hidden" name="email" value="<?php echo $p->email ?>">
                    <?php } ?>
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Nomor Antrian Pengambilan</label>
                        <div class="col-xs-8">
                            <input name="nomor_antrian" class="form-control" type="text" readonly="" value="<?php echo $kode ?>">
                        </div>
                    </div>
 
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Pilih Tanggal</label>
                        <div class="col-xs-8">
                            <input name="tanggal" class="form-control" type="date" placeholder="Tanggal Pengambilan" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                  <button class="btn btn-danger" data-dismiss="modal">Batal</a></button>
                  <button type="submit" class="btn btn-primary">Simpan</a></button>
                  </div>            
            </form>