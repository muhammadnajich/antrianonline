<?php
$this->load->view("Back/Parts/V_Header");
$this->load->view("Back/Parts/V_Navigation");
?>

    <div class="content-body">
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                              <div>
                                <div style="float: left;">
                                <h4 class="card-title">Hasil Proses Datamining</h4>
                                </div>
                             </div>
                                <div class="table-responsive"><br />
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>No</th> 
                                                <th>Att Gain Ratio Max</th>
                                                <th>Atribut</th>
                                                <th>Nilai Atribut</th>
                                                <th>Total Kasus</th>
                                                <th>Jumlah Laris</th>
                                                <th>Jumlah Tidak Laris</th>
                                                <th>Entropy</th>
                                                <th>Gain</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                              
                                            <?php foreach ($prosesmining as $u) { ?>
                                            <tr id="<?php echo $u->id ?>">
                                                <td><?php echo $u->iterasi ?></td>
                                                <td><?php echo $u->atribut_gain_ratio_max ?></td>
                                                <td><?php echo $u->atribut ?></td>
                                                <td><?php echo $u->nilai_atribut ?></td>
                                                <td><?php echo $u->jml_kasus_total ?></td>
                                                <td><?php echo $u->jml_padat ?></td>
                                                <td><?php echo $u->jml_tdk_padat ?></td>
                                                <td><?php echo $u->entropy ?></td>
                                                <td><?php echo $u->inf_gain ?></td>
                                            </tr>
                                              <?php } ?>
                                              
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>No</th> 
                                                <th>Att Gain Ratio Max</th>
                                                <th>Atribut</th>
                                                <th>Nilai Atribut</th>
                                                <th>Total Kasus</th>
                                                <th>Jumlah Laris</th>
                                                <th>Jumlah Tidak Laris</th>
                                                <th>Entropy</th>
                                                <th>Gain</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
          </div>
<?php 
  $this->load->view("Back/Parts/V_Footer");
 ?> 